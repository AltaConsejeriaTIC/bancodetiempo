<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportsAdmin;
use App\Models\FieldsReportsAdmin;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\AllData;

class ReportsController extends Controller
{

    protected $principal = [];

    protected $fields = [];

    protected $order = [];

    public function index(){

        $reports = ReportsAdmin::where('user_id', Auth::id())->get();

        return view("admin/reports/home", compact("reports"));

    }

    public function create(Request $request){

        ReportsAdmin::create([
            'name' => $request->nameReport,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();

    }

    public function saveReport(Request $request, $report_id){

        ReportsAdmin::find($report_id)->update([
            'fields' => json_encode($request->input('fields', [])),
            'filters' => json_encode($request->input('filters', ["" => ""])),
            'order' => json_encode(['orderBy' => $request->input('orderBy', 'asc'), 'order' => $request->input('order', 'asc')]),
        ]);
    }

    public function showReport($report_id){

        $report = ReportsAdmin::find($report_id);

        if($report->user_id != Auth::id()){
            return redirect()->back();
        }

        $fields = FieldsReportsAdmin::all();

        return view('admin/reports/report', compact('report', 'fields'));

    }

    public function getReport(Request $request){

        $data = $this->makeReport($request->input('fields', []), $request->input('filters', []), $request->input('orderBy', 'id') ,$request->input('order', 'asc'));

        if($data){
            return $this->makeTable($data);
        }else{
            return "<h2 class='title2 text-center'>Sin resultados</h2>";
        }


    }

    public function makeReport($fields, $filters, $orderBy, $order){

        $array = [];

        $data = AllData::orderBy($orderBy, $order);

        $this->getFilter($data, $filters);

        $fields = $this->getFields($fields);

        $data = $data->get($fields);

        foreach($data as $register){
            foreach($register->toArray() as $key => $row){
                $nameParameter = $this->getNameParameter($key, $register);
                array_set($array[head($register->toArray()).$register->id], $nameParameter, $row);
            }
        }

        return $array;

    }

    private function getFields($fields){

        $fields[] = 'id';
        if(strpos(implode(",", $fields), 'interest')){
            $fields[] = 'interest_id';
        }
        if(strpos(implode(",", $fields), 'service')){
            $fields[] = 'service_id';
        }
        if(strpos(implode(",", $fields), 'tag')){
            $fields[] = 'service_tag_id';
        }

        return $fields;

    }

    private function getFilter($data, $filters){

        foreach($filters as $parameter => $filter){

            $field = FieldsReportsAdmin::where("parameter", $parameter)->get()->last();
            if($field->type == 'text'){
                $data->where($parameter, 'LIKE', "%$filter%");
            }elseif($field->type == 'date' || $field->type == 'number'){
                $data->whereBetween($parameter, $filter);
            }elseif($field->type == 'select'){
                $data->where($parameter, $filter);
            }

        }

    }

    private function getNameParameter($key, $data){

        $key = explode("_", $key);
        if(count($key) == 2){
            $key = [
                $key[0],
                $data[$key[0]."_id"],
                $key[1]
            ];
        }elseif(count($key) == 3){
            $key = [
                $key[0],
                $data[$key[0]."_id"],
                $key[1],
                $data[$key[0]."_".$key[1]."_id"],
                $key[2]
            ];
        }
        return implode(".", $key);

    }


    public function makeTable($data){

        $html = "<p>Total registros : ".count($data)."</p>";

        $html .= "<table border='1'>";

        $html .= "<tr>";

        foreach(array_keys(head($data)) as $title){
            if($title == 'id')
                continue;
            $html .= "<th>$title <button type='button' field='$title' class='material-icons order'>swap_vert</button></th></th>";
        }

        $html .= "</tr>";

        foreach($data as $row){

            $html .= "<tr>";

            foreach($row as $title => $cell){

                if(gettype($cell) == 'array'){

                    $html .= "<td>";
                    $html .= "<table border='1'>";
                        $html .= "<tr>";
                        foreach(array_keys(head($cell)) as $title){
                            if($title == 'id')
                                continue;
                            $html .= "<th>$title ";
                        }
                        $html .= "</tr>";

                        foreach($cell as $subRow){
                            $html .= "<tr>";
                            $html .= $this->makeSubRow($subRow);
                            $html .= "</tr>";
                        }
                    $html .= "</table>";
                    $html .= "</td>";

                }else{
                    if($title == 'id')
                        continue;
                    $html .= "<td>$cell</td>";
                }

            }

            $html .= "</tr>";

        }

        $html .= "</table>";

        print $html;

    }

    public function makeSubRow($row){

        $html = "";
            foreach($row as $key => $subCell){
                if($key == 'id')
                    continue;
                if(gettype($subCell) != 'array'){
                    $html .= "<td style='width:100px;max-width: 100px;'>$subCell</td>";
                }else{
                    $html .= "<td style='width:100px;max-width: 100px;'>";
                    $html .= "<table>";
                    $html .= $this->makeSubRow($subCell);
                    $html .= "</table>";
                    $html .= "</td>";
                }
            }

        return $html;

    }

    public function deleteReport(Request $request){

        ReportsAdmin::find($request->report_id)->delete();

        return redirect()->back();

    }


}
