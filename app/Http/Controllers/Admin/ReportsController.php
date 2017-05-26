<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportsAdmin;
use App\Models\FieldsReportsAdmin;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    public function showReport($report_id){

        $report = ReportsAdmin::find($report_id);

        if($report->user_id != Auth::id()){
            return redirect()->back();
        }

        $fields = FieldsReportsAdmin::all();

        return view('admin/reports/report', compact('report', 'fields'));

    }

    public function getReport(Request $request){

        $data = $this->makeReport(
            $request->input('fields', []),
            $request->input('filters', []),
            ['orderBy' => $request->input('orderBy', []), 'order' => $request->input('order', [])]
        );

        if($data){
            return $this->makeTable($data);
        }else{
            return "<h2 class='title2 text-center'>Sin resultados</h2>";
        }


    }

    public function makeReport($fields, $filters, $order){

        $this->fields = $fields;
        $this->order = $order;
        $this->filters = $filters;

        if(!empty($fields)){

            $this->order['orderBy'] = FieldsReportsAdmin::where('name', $this->order['orderBy'])->get()->last()->parameter;

            $this->principal = FieldsReportsAdmin::where('name', $fields[0])->get()->last();

            $array = $this->orderData($this->getData());

            $array = $this->filter($array, $filters);

            if(!empty($array->toArray())){
                return $array->toArray();
            }else{
                return false;
            }

        }else{
            return false;
        }

    }

    private function getData(){

        $array = collect([]);

        foreach($this->fields as $field){

            $dataField = FieldsReportsAdmin::where('name', $field)->get()->last();

            if($this->principal->model == $dataField->model){

                $array->put($dataField->name, $this->getParameter($dataField));

            }else{

                $array[$dataField->name] = $this->getSubData($dataField);

            }

        }

        return $array;
    }

    private function getParameter($dataField){

        $model = new $this->principal->model();

        $parameter = $dataField->parameter;

        $data = $model->select($parameter)->orderBy($this->order['orderBy'], $this->order['order']);

        return ReportsController::printData($data, $dataField);

    }

    private function getSubData($dataField){

        $model = new $this->principal->model();

        $nameModel = $this->getNameModel();

        $parameter = $dataField->parameter;

        $data = $model->orderBy($this->order['orderBy'], $this->order['order']);

        $secondModel = new $dataField->model();

        return $data->get()->map(function ($item, $key) use ($secondModel, $dataField, $nameModel)  {

            $relation = json_decode($dataField->relation)->$nameModel;

            $his = $relation->his;

            $response = $secondModel->select($dataField->parameter)->where($relation->my, $item->$his);

            $response = ReportsController::printData($response, $dataField);

            return $response;
        });

    }

    private function getNameModel(){

        $class = new \ReflectionClass($this->principal->model);

        return $class->getShortName();
    }

    private function filter($data, $filters){

        return $data->filter(function ($item, $key) use ($filters)  {
            $resp = 0;
            foreach($filters as $nameFilter => $filter){
                $filterData = FieldsReportsAdmin::where('name', $nameFilter)->get()->last();
                $funtionFilter = "filter_".$filterData->type;

                if($this->$funtionFilter($item[$nameFilter], $filter) === false ){
                    $resp += 1;
                }
            }
            if($resp == 0){
                return $item;
            }

        });

    }

    private function orderData($data){

        $newData = collect([]);

        foreach($data as $index => $row){

            foreach($row as $i => $value){

                if(!isset($newData[$i])){
                    $newData->put($i, collect([]));
                }

                $newData[$i]->put($index, $value);

            }

        }

        return $newData;

    }

    static function printData($data, $dataField){
        return $data->get()->map(function ($item, $key) use ($dataField)  {
                $function = 'print_'.$dataField->print;
                $parameter = $dataField->parameter;
                //return ReportsController::$function($item->$parameter);
                return $item->$parameter;
        });
    }


    private function getFilter($data, $filters){

        foreach($filters as $nameFilter => $filter){

            $filterData = FieldsReportsAdmin::where('name', $nameFilter)->get()->last();

            $funtionFilter = "filter_".$filterData->type;

            $this->$funtionFilter($data, $filterData->parameter, $filter);

        }

    }

    private function filter_text($data, $filter){
        return stripos($data, $filter);
    }

    private function filter_select($data,$filter){

        return (preg_match("/^$filter/",$data) > 0);
    }

    private function filter_date($data, $filter){
        $data = strtotime($data);
        $filter = array_map("strtotime", $filter);
        return $data >= $filter['from'] && $data <= $filter['to'];
    }

    private function filter_number($data, $filter){
        return $data >= $filter['from'] && $data <= $filter['to'];
    }

    private function makeTable($array){

        $html = "<table border='1'>";

        $html .= $this->makeTableTitles(array_keys(head($array)));

        $html .= $this->makeTableRows($array);

        $html .= "</table>";

        return $html;

    }

    private function makeTableTitles($titles){

        $html = "<tr>";

        foreach($titles as $title){
            $html .= "<th>$title<button type='button' field='$title' class='material-icons order'>swap_vert</button></th>";
        }

        $html .= "</tr>";

        return $html;

    }

    private function makeTableRows($data){

        $html = '';

        foreach($data as $row){

            $html .= "<tr>";

            $html .= $this->makeTableColumn($row);

            $html .= "</tr>";

        }

        return $html;

    }

    private function makeTableColumn($row){

        $html = "<tr>";

        foreach($row as $column){

            if(gettype($column) == "array"){
                $html .= "<td>".$this->makeTableSubColumn($column)."</td>";
            }else{
                $html .= "<td>$column</td>";
            }


        }

        $html .= "</tr>";

        return $html;
    }

    private function makeTableSubColumn($column){

        $html = '';

        foreach($column as $subColumn){
            $html .= "<p>$subColumn</p>";
        }

        return $html;

    }

    static function print_string($value){
        $value = $value != '' ? "<p>$value</p>" : "";
        return $value;
    }

    static function print_number($value){

        return intval($value);
    }

    static function print_date($value){

        return $value;
    }

    static function print_boolean($value){
        $value = $value ? 'Si' : 'No';
        return "<p>$value</p>";
    }
    static function print_image($value){
        return "<p><img src='/$value'/ width='100px'></p>";
    }

    public function newGetReport($parameters){
        $array = [];
        foreach($parameters as $model => $parameter){
            $array[$parameter] = 0;
        }
        return $array;
    }
}
