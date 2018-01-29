<article class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 serviceForm" id='formRegister' >
        <div class="row not-margin">
            <label for="firstName" class="paragraph10">Nombre</label>
        </div>
        <div class="row not-margin">

            <input type="text" value="{{Auth::user()->first_name}}" name="firstName" maxlength='25' class="col-xs-12 validation" placeholder="Nombre"  data-validations='["required", "min:3", "max:20", "onlyChar"]'>
            <i for='firstName'></i>
            <div class="msg" errors='firstName'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
                <p error='max'>Este campo debe ser máximo de 20 caracteres.</p>
                <p error="onlyChar">El nombre no debe contener números, caracteres especiales o signos de puntuación.</p>
            </div>
        </div>

        <div class="row not-margin">
            <label for="lastName" class="paragraph10">Apellido</label>
        </div>
        <div class="row not-margin">

            <input type="text" value="{{Auth::user()->last_name}}" name="lastName" maxlength='30' class="col-xs-12 validation" placeholder="Apellido"  data-validations='["required", "min:3", "max:25", "onlyChar"]'>
            <i for='lastName'></i>
            <div class="msg" errors='lastName'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='min'>Este campo debe ser mínimo de 3 caracteres.</p>
                <p error='max'>Este campo debe ser máximo de 25 caracteres.</p>
                <p error="onlyChar">El apellido no debe contener números, caracteres especiales o signos de puntuación.</p>
            </div>
        </div>

        <div class="row not-margin">
            <label for="email" class="paragraph10" >Correo electrónico</label>
        </div>
        <div class="row not-margin">
            <input type="text" value="{{Auth::user()->email2}}" name="email2" class="col-xs-12 validation" placeholder="email"  data-validations='["required", "email"]'>
            <i for='email2'></i>
            <div class="msg" errors='email2'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='email'>El formato del correo electrónico no es válido.</p>
            </div>
        </div>

        <div class="row not-margin">
            <label for="gender" class="paragraph10">Género</label>
        </div>
        <div class="row not-margin">
            <div class="col-md-12 not-padding">
                <input type='radio' value='male' name='gender' id='male' class='square validation' data-validations='["requiredRadio"]' @if(Auth::user()->gender == 'male') checked @endif>
                <label for="male" class="paragraph10">Hombre</label>
            </div>
            <div class="col-md-12 not-padding">
                <input type='radio' value='female' name='gender' id='female' class='square validation' data-validations='["requiredRadio"]' @if(Auth::user()->gender == 'female') checked @endif>
                <label for="female" class="paragraph10">Mujer</label>
            </div>
            <div class="col-md-12 not-padding">
                <input type='radio' value='indeterminate' name='gender' id='indeterminate' class='square validation' data-validations='["requiredRadio"]' @if(Auth::user()->gender == 'indeterminate') checked @endif>
                <label for="indeterminate" class="paragraph10">Indeterminado</label>
            </div>

        </div>
        <div class="space"></div>

        <div class="row not-margin">
            <label for="birthdate" class="paragraph10">Fecha de nacimiento</label>
        </div>
        <div class="row not-margin">
            <input type='text' name='birthDate' class='datepick validation col-md-12' data-validations='["required", @if(Auth::user()->group == 0) "minYear:18", @endif "dateFormat"]' placeholder="aaaa-mm-dd" value='{{Auth::user()->birthDate}}'>
            <div class="msg" errors='birthDate'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='min'>Debes ser mayor de edad para registrarte en Cambalachea.</p>
                <p error='dateFormat'>Este campo debe tener el formato aaaa-mm-dd.</p>
            </div>
        </div>

        <div class="row not-margin">
            <label for="aboutMe" class="paragraph10">Acerca de mi</label>

        </div>
        <div class="row not-margin">
            <textarea class="countCharacters col-xs-12 col-sm-12 col-md-12 validation" rows="8" name="aboutMe" id='aboutMe' placeholder="Ej. ¡Hola! Soy diseñador gráfico, tengo 25 años. Me encanta la fotografía, el teatro, el cine y la música…"  data-validations='["required", "min:50", "max:250"]'>{{Auth::user()->aboutMe}}</textarea>
            <div class="msg" errors='aboutMe'>
                <p error='required'>Este campo es obligatorio.</p>
                <p error='min'>Este campo debe ser mínimo de 50 caracteres.</p>
                <p error='max'>Este campo debe ser máximo de 250 caracteres.</p>
            </div>
        </div>

        <div class="row not-margin">
            <input type="submit" value='Actualizar' class='button1 col-xs-12 background-active-color'/>

        </div>
</article>
