<?php

use App\Http\Controllers\Profile\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
    
Route::get('/', function() {
    return view("colegios/inicio");
})->middleware('loginColegios');
Route::get("/inicio", function(){
   return "inicio"; 
})->middleware('redirectUser');

Route::get("/registro-admin", "Colegios\RegisterController@registroFormAdmin");
Route::post("/registro-admin", "Colegios\RegisterController@registroAdmin");
Route::get("/registro-estudiante", "Colegios\RegisterController@registroFormStudent");
Route::post("/registro-estudiante", "Colegios\RegisterController@registroStudent");

Route::get("/panel", "Colegios\AdminController@index");
Route::post("/login", "Colegios\LoginController@login");
Route::post("/logout", "Colegios\LoginController@logout");
Route::post("/addCampaignToSchool", "Colegios\AdminController@addCampaignToSchool");
Route::post("/removeCampaignToSchool", "Colegios\AdminController@removeCampaignToSchool");

Route::get("/panel-estudiante", "Colegios\StudentController@index");
Route::get("/compromisos", "Colegios\StudentController@compromises");

Route::get("/campaign/{campaignId}", "Colegios\CampaignsController@showCampaign");
Route::get("/perfil", function(){
    if(Auth::user()->role_id == 1){
        $admin  = new App\Http\Controllers\Colegios\AdminController();
        return 
            $admin->profile();
    }else{
        $student = new App\Http\Controllers\Colegios\StudentController();
        return $student->profile();        
    }
});

Route::post("/editStudent", "Colegios\StudentController@edit");
Route::post("/student/inscription", "Colegios\StudentController@inscriptionCampaign");
Route::post("/student/unregistration", "Colegios\StudentController@unregistrationCampaign");

Route::get("/listadoEstudiantes", "Colegios\StudentController@listStudents");

Route::post('/campaign-report/create/{campaignid}', 'CampaignController@report');

Route::get('/getImg', 'ImageController@getImage');
