@extends('layouts.appColegios')
@section('script')

<script src="/js/jquery.validate.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery("#foto").change(previewImage);
        jQuery("#registroAdmin").validate({
            errorClass : "text-danger text-sm",
            validClass : "text-success text-sm",
            errorElement : "span",
            rules: {
                repeatpassword : {
                    required : true,
                    equalTo : "#password"
                },
                terminos : {
                    required : true
                },
                fecha : {
                    date: true
                },
                genero : {
                    required : true
                }
            },
            messages : {
                name : "El nombre del estudiante es requerido",
                password : "Una contraseña es requerida",
                documento : "El numero de documento es requerido",
                colegio : "Seleccione su colegio",
                email : "Ingrese un correo electrónico valido",
                curso : "Seleccione su curso",
                genero : "Seleccione su genero",
                fecha : {
                    required : "Ingrese su fecha de nacimiento",
                    date : "Ingrese una fecha valida"
                },
                repeatpassword : {
                    required : "Vuelva a escribir la contraseña",
                    equalTo: "Las contraseñas no coinciden"
                },
                terminos : "Debe aceptar terminos y condiciones" 
                
            }
        });                       
    })
    function previewImage(e){
        var elemt = jQuery(e.target);
        var id =  e.target.id;
        var files = e.target.files;
        var label = jQuery("label[for='"+id+"']");
        if(files[0].size < 2000000){
            label.siblings(".error").remove();
            var image = new Image();
            var reader = new FileReader();
            reader.onload = (e) => {
               label.css({
                   "background-image" : "url('"+e.target.result+"')",
                   "background-size" : "100%"
               })
               if(elemt.data('mirror') !== undefined){
                   jQuery(elemt.data('mirror')).attr("src", e.target.result);
               }
           };
           reader.readAsDataURL(files[0]);
       }else{
        label.after("<p class='msg error'>El peso máximo de la imagen debe ser de 3 Megas.</p>")
    }
}
</script>

@endsection
@section('content')
@include('colegios.nav')

<div class="registroAdmin">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-9 bg-white-opacity rounded p-4">
                <h6 class="text-white font-weight-bold mb-0">Abre una cuenta</h6>
                <p class='text-white'>Estudiante</p>
                <form action="/registro-estudiante" method="post" enctype="multipart/form-data" class="text-white" id="registroAdmin">
                    {{csrf_field()}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <label for="colegio" class="mt-3 mb-0">Nombre de estudiante: *</label>
                            <input type="text" class="form-control text-sm  rounded" name="name" id="name" value="{{old('name')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="mt-3 mb-0">Contraseña: *</label>
                            <input type="password" name="password" class="form-control text-sm rounded" id="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="documento" class="mt-3 mb-0">Numero de documento: *</label>
                            <input type="text" class="form-control text-sm rounded" name="documento" id="documento" value="{{old('documento')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="repeatpassword" class="mt-3 mb-0">Repetir contraseña: *</label>
                            <input type="password" name="repeatpassword" class="form-control text-sm rounded" id="repeatpassword" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email" class="mt-3 mb-0">Correo electrónico: *</label>
                            <input type="email" class="form-control text-sm rounded" name="email" id="email" value="{{old('email')}}" required>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="colegio" class="mt-3 mb-0">Colegio: *</label><br>
                                    <select class="form-control form-control-sm" name="colegio" id="colegio" required>
                                        <option value=""></option>
                                        @foreach($listSchool as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="curso" class="mt-3 mb-0">Curso: *</label><br>
                                    <select class="form-control form-control-sm" name="curso" id="curso" required>
                                        <option value=""></option>
                                        <option value="9">Noveno</option>
                                        <option value="10">Décimo</option>
                                        <option value="11">Once</option>
                                    </select> 
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <label for="fecha" class="mt-3 mb-0">Fecha de nacimiento: *</label>
                                <input type="date" class="form-control text-sm rounded" name="fecha" id="fecha" value="{{old('fecha')}}" required>
                            </div>
                            <div>
                                <label for="genero" class="mt-3 mb-0">Genero</label><br>
                                M <input type="radio" name="genero" value="male" checked>
                                F <input type="radio" name="genero" value="female">  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mt-3 mb-0">Foto:</label>
                            <input type="file" name="foto" class="file-update" id="foto">
                            <label for="foto">Subir imagen <i class="fa fa-upload"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="terminos" class="col-11 pl-0 mt-3 mb-0">Acepto <a href="" class="text-white">Términos y condiciones</a></label>
                            <input type="checkbox" name="terminos" id="terminos" class="box" required>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-info rounded mt-3">Crear cuenta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('footer')
@endsection