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
            $newArray = [];
            foreach($fields as $field){
                $dataField = FieldsReportsAdmin::find($field);
                $parameter = $dataField->parameter;
                $newArray[] = $parameter;
            }
            $array = $row->get($newArray);
        }
        dd($array);
        return $this->makeTable($array, $fields);
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
