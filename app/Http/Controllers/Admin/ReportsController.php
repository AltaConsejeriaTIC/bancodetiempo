<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportsAdmin;
use App\Models\FieldsReportsAdmin;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
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

    public function makeReport(Request $request){
        $array = [];
        $fields = $request->fields;
        $principal = FieldsReportsAdmin::find(reset($fields));
        $class = new $principal->model();
        $data = $class->orderBy('id', 'asc')->get();
        foreach($data as $row){
            $newArray = collect([]);
            foreach($fields as $field){
                $dataField = FieldsReportsAdmin::find($field);
                $newArray->push($dataField);
            }
            $array[] = $this->getParameters($row, $newArray, $principal);
        }
        dd($array);
        return $this->makeTable($array, $fields);
    }

    private function getParameters($data, $parameters, $principal){
        $newData = [];

        foreach($parameters as $parameter){
            $thisParameter = $parameter->parameter;
            if($principal->model == $parameter->model){
                $newData[$thisParameter] = $data->$thisParameter;
            }else{
                $newData[$thisParameter] = $data->$thisParameter;
            }

        }

        return $newData;

    }

    private function makeTable($array, $fields){

        $html = "<table>
                <tr>";

        foreach($fields as $field){
            $dataField = FieldsReportsAdmin::find($field);
            $html .= "<td>".$dataField->name."</td>";
        }
        $html .= "</tr>";

        foreach($array as $row){
            $html .= "<tr>";

            foreach($row as $cell){
                $html .= "<td>$cell</td>";
            }

            $html .= "</tr>";
        }

        $html .= "</table>";

        return $html;

    }
}
