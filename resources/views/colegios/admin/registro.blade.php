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
                }
            },
            messages : {
                colegio : "Debe seleccionar un colegio",
                password : "Ingrese una contraseña",
                email : "Ingrese un correo valido",
                repeatpassword : {
                    required : "Vuelva a escribir la contraseña",
                    equalTo: "Las contraseñas no coinciden"
                },
                name : "El campo \"Nombre\" es requerido",
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
                <p class='text-white'>Administrador</p>
                <form action="/registro-admin" method="post" enctype="multipart/form-data" class="text-white" id="registroAdmin">
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
                            <label for="colegio" class="mb-0">Nombre del colegio: *</label>
                            <input type="text" class="form-control text-sm rounded mb-3" name="colegio" id="colegio" value="{{old('colegio')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="mb-0">Contraseña: *</label>
                            <input type="password" name="password" class="form-control text-sm rounded mb-3" id="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="correo" class="mb-0">Correo: *</label>
                            <input type="email" class="form-control text-sm rounded mb-3" name="email" id="correo" value="{{old('email')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="repeatpassword" class="mb-0">Repetir contraseña: *</label>
                            <input type="password" name="repeatpassword" class="form-control text-sm rounded mb-3" id="repeatpassword" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                                 
                            <label for="name" class="mb-0">Responsable: *</label>
                            <input type="text" class="form-control text-sm rounded mb-3" name="name" id="name" value="{{old('name')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-0">Subir foto: *</label>
                            <input type="file" name="foto" class="file-update" id="foto">
                            <label for="foto">Subir imagen <i class="fa fa-upload"></i></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="terminos" class="col-11 pl-0">Acepto <a href="" class="text-white">Términos y condiciones</a></label>
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