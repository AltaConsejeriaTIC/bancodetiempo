<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportsAdmin;
use App\Models\FieldsReportsAdmin;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
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

        $report = ReportsAdmin::create([
            'name' => $request->nameReport,
            'description' => $request->descriptionReport,
            'user_id' => Auth::id()
        ]);

        return redirect('/admin/report/'.$report->id);

    }

    public function saveReport(Request $request, $report_id){
        $obj = (object) [];
        ReportsAdmin::find($report_id)->update([
            'fields' => json_encode($request->input('fields', [])),
            'filters' => json_encode($request->input('filters', $obj)),
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

        if(!empty($request->input('fields', []))){
            $data = $this->makeReport($request->input('fields', []), $request->input('filters', []), $request->input('orderBy', 'id') ,$request->input('order', 'asc'));

            if($data){
                return $this->makeTable($data);
            }else{
                return "<h2 class='title2 text-center'>Sin resultados</h2>";
            }
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

        foreach($fields as $field){

            $nameField = explode("_", $field);

            if(count($nameField) > 1){
                array_pop($nameField);
                $newId = implode("_", $nameField)."_id";
                if(!array_search($newId, $fields)){
                    $fields[] = $newId;
                }
            }

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

    private function getTotal($data){

        $html = "<div class='row'>";

        $html .= "<div class='col-xs-12'>";

        $html .= "<p class='bg-success col-xs-2 paragraph6 text-center'>Total registros : ".count($data)."</p>";

        $html .= "</div>";

        $html .= "</div>";

        return $html;
    }
//$html .= "<th>$title[0]<button type='button' field='$title[0]' class='material-icons order'>swap_vert</button></th>";
    private function getTitles($data, $titleParent = ''){
        $titles = array_keys(array_dot($data));
        $atitles = [];
        $sTitles = [];
        $ssTitles = [];

        foreach($titles as $title){
            $title = explode("..", $title);
            if(last($title) != 'id'){

                if(count($title) > 1){

                    $atitles[$title[0]]['name'] = $title[0];
                    $colspan = isset($atitles[$title[0]]['colspan']) ? $atitles[$title[0]]['colspan']+1 : 1;
                    $atitles[$title[0]]['colspan'] = $colspan;

                    $sTitles[$title[0]."_".$title[1]]['name'] = $title[1];
                    $colspan = isset($sTitles[$title[0]."_".$title[1]]['colspan']) ? $sTitles[$title[0]."_".$title[1]]['colspan']+1 : 1;
                    $sTitles[$title[0]."_".$title[1]]['colspan'] = $colspan;

                    $ssTitles[$title[0]."_".$title[1]]['name'] = '';
                    $colspan = isset($ssTitles[$title[0]."_".$title[1]]['colspan']) ? $ssTitles[$title[0]."_".$title[1]]['colspan']+1 : 1;
                    $ssTitles[$title[0]."_".$title[1]]['colspan'] = $colspan;

                    if(count($title) > 2){
                        unset($ssTitles[$title[0]."_".$title[1]]);
                        $ssTitles[$title[0]."_".$title[1]."_".$title[2]]['name'] = $title[2];
                        $colspan = isset($ssTitles[$title[0]."_".$title[1]."_".$title[2]]['colspan']) ? $ssTitles[$title[0]."_".$title[1]."_".$title[2]]['colspan']+1 : 1;
                        $ssTitles[$title[0]."_".$title[1]."_".$title[2]]['colspan'] = $colspan;

                    }

                }else{
                    $atitles[$title[0]]['name'] = $title[0];
                    $colspan = isset($atitles[$title[0]]['colspan']) ? $atitles[$title[0]]['colspan']+1 : 1;
                    $atitles[$title[0]]['colspan'] = $colspan;

                    $sTitles[$title[0]]['name'] = '';
                    $colspan = isset($sTitles[$title[0]]['colspan']) ? $sTitles[$title[0]]['colspan']+1 : 1;
                    $sTitles[$title[0]]['colspan'] = $colspan;

                    $ssTitles[$title[0]]['name'] = '';
                    $colspan = isset($ssTitles[$title[0]]['colspan']) ? $ssTitles[$title[0]]['colspan']+1 : 1;
                    $ssTitles[$title[0]]['colspan'] = $colspan;
                }



            }

        }


        $html = "<tr>";

        foreach($atitles as $title){
            $html .= "<th colspan='".$title["colspan"]."'>".$title["name"]."</th>";
        }

        $html .= "</tr>";



        $html .= "<tr>";

        foreach($sTitles as $title){
            $html .= "<th colspan='".$title["colspan"]."'>".$title["name"]."</th>";
        }

        $html .= "</tr>";

        $html .= "<tr>";

        foreach($ssTitles as $title){
            $html .= "<th colspan='".$title["colspan"]."'>".$title["name"]."</th>";
        }

        $html .= "</tr>";

        return $html;
    }

    private function getSubTitles($titles){

        $html = "<tr>";

        foreach($titles as $subTitle => $value){
            if(strpos($subTitle, 'id') !== false){
                continue;
            }
            if(gettype($value) == 'array'){

                foreach(head($value) as $name => $val){
                    if(strpos($name, 'id') !== false){
                        continue;
                    }
                    $html .= "<th>$name<button type='button' field='$name' class='material-icons order'>swap_vert</button></th>";
                }

            }else{
                $html .= "<th></th>";
            }

        }

        $html .= "</tr>";

        return $html;

    }

    public function makeTable($data){

        $html = $this->getTotal($data);

        $html .= "<table border='1'>";

        $html .= $this->getTitles(head($data));

        foreach($data as $row){

            $html .= "<tr>";

            foreach($row as $title => $cell){

                if(gettype($cell) == 'array'){
                    $html .= "<td></td>";
                    /*$html .= "<td>";
                    $html .= "<table>";

                        foreach($cell as $subRow){
                            $html .= "<tr>";
                            $html .= $this->makeSubRow($subRow);
                            $html .= "</tr>";
                        }
                    $html .= "</table>";
                    $html .= "</td>";*/

                }else{
                    if($title == 'id')
                        continue;
                    $html .= "<td>$cell</td>";
                }

            }

            $html .= "</tr>";

        }

        $html .= "</table>";

        return $html;

    }

    public function makeSubRow($row){

        $html = "";
            foreach($row as $key => $subCell){
                if($key == 'id')
                    continue;
                if(gettype($subCell) != 'array'){
                    $html .= "<td>$subCell</td>";
                }else{
                    $html .= "<td>";
                    //$html .= "<table>";
                    $html .= $this->makeSubRow($subCell);
                    //$html .= "</table>";
                    $html .= "</td>";
                }
            }

        return $html;

    }

    public function deleteReport(Request $request){

        ReportsAdmin::find($request->report_id)->delete();

        return redirect()->back();

    }

    public function downloadReport(Request $request){
        if(!empty($request->input('fields', []))){
            $data = $this->makeReport($request->input('fields', []), $request->input('filters', []), $request->input('orderBy', 'id') ,$request->input('order', 'asc'));

            $this->makeFile($this->makeTable($data));
        }
    }

    private function makeFile($table){
        Excel::create('GruposCambalachea' . date("Y-m-d"), function ($excel) use ($table) {
            $excel->sheet('Grupos', function ($sheet) use ($table) {
                $sheet->loadView('admin/reports/excel', compact('table'));
                //$sheet->fromArray($data);

            });
        })->download('xls');
    }
}
