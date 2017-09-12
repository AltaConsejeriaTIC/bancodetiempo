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
                return $this->makeTable($data, $request->input('fields', []));
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

    private function getTitles($fields){

        $html = "<tr>";

        foreach($fields as $field){
            $field = FieldsReportsAdmin::where("parameter", $field)->get()->last();
            $html .= "<th>".$field->name."</th>";
        }

        $html .= "</tr>";

        return $html;

    }

    public function makeTable($data, $fields){

        $html = $this->getTotal($data);

        $html .= "<table border='1'>";

        $html .= $this->getTitles($fields);

        foreach($data as $row){

            $html .= $this->makerow(array_except($row, ['id']));

        }

        $html .= "</table>";

        return $html;

    }

    private function makeRow($data){

        $html = "<tr>";

        foreach($data as $row){

            if(gettype($row) == "array"){

                $html .= $this->makeSubRow($row);

            }else{
                $html .= "<td>$row</td>";
            }

        }

        $html .= "</tr>";


        return $html;

    }

    public function makeSubRow($row){

        $html = '';
        $subCell = [];
        foreach($row as $cell){
            foreach(array_except($cell, ['id']) as $index => $c){
                $subCell[$index][] = $c;
            }
        }

        foreach($subCell as $cell){
            if(gettype(head($cell)) == 'array'){
                $html .= $this->makeSubRow(head($cell));
            }else{
                $html .= "<td>";

                foreach($cell as $col){
                    $html .= "<span>$col</span><br>";
                }

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

            $this->makeFile($this->makeTable($data, $request->input('fields', [])));
        }
    }

    private function makeFile($table){
        Excel::create('GruposCambalachea' . date("Y-m-d"), function ($excel) use ($table) {
            $excel->sheet('Grupos', function ($sheet) use ($table) {
                $sheet->loadView('admin/reports/excel', compact('table'));
            });
        })->download('xls');
    }
}
