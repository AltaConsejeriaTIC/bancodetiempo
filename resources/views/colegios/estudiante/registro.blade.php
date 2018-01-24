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
                colegio : "Nombre colegio es requerido",
                password : "Ingrese una contraseña",
                email : "Ingrese un correo valido",
                curso : "Seleccione su curso",
                genero : "Seleccione su genero",
                fecha : {
                    required : "Ingrese la fecha de nacimiento",
                    date : "Ingrese una fecha valida"
                },
                repeatpassword : {
                    required : "Vuelva a escribir la contraseña",
                    equalTo: "Las contraseñas no coinciden"
                },
                name : "El campo \"responsable\" es requerido",
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
            
            <div class="col-8 bg-white-opacity rounded p-4">
                <h6 class="text-white mb-0">Abre una cuenta</h6>
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
                        <div class="col-6">
                            <label for="colegio">Nombre estudante: *</label>
                            <input type="text" class="form-control text-sm" name="name" id="name" value="{{old('name')}}" required>
                        </div>
                        <div class="col-6">
                            <label for="password">Contraseña: *</label>
                            <input type="password" name="password" class="form-control text-sm" id="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="email">Correo electronico: *</label>
                            <input type="email" class="form-control text-sm" name="email" id="email" value="{{old('email')}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="colegio">Colegio: *</label><br>
                            <select name="colegio" id="colegio" required>
                                <option value=""></option>
                                @foreach($listSchool as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="repeatpassword">Repetir Contraseña: *</label>
                            <input type="password" name="repeatpassword" class="form-control text-sm" id="repeatpassword" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">   
                            <label for="fecha">Fecha nacimiento: *</label>
                            <input type="text" class="form-control text-sm" name="fecha" id="fecha" value="{{old('fecha')}}" required>  
                        </div>
                        <div class="col-6">   
                            <label for="curso">Curso: *</label><br>
                            <select name="curso" id="curso" required>
                                <option value=""></option>
                                <option value="10">Decimo</option>
                                <option value="11">Once</option>
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-6">
                           <label for="genero">Genero</label><br>
                           M <input type="radio" name="genero" value="male" checked>
                           F <input type="radio" name="genero" value="female">
                           Otro <input type="radio" name="genero" value="indeterminate"> 
                       </div>
                        <div class="col-6">
                            <label for="">Subir foto: *</label>
                            <input type="file" name="foto" class="file-update" id="foto">
                            <label for="foto">Subir imagen <i class="fa fa-upload"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                             <label for="terminos" class="col-11 pl-0">Acepto <a href="" class="text-white">Términos y condiciones</a></label>
                            <input type="checkbox" name="terminos" id="terminos" class="box" required>
                            <label for='terminos' class="fa box">&nbsp;</label>
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-secundary">Crear cuenta</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
    
</div>

@include('footer')

@endsection