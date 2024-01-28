<?php
$url_base = "http://localhost/WEB/"   ?>

        </main>
        <footer>
        <div class="card bg-dark">
        <div class="card bg-dark">
            <div class=" container card-body align-items-center text-light d-flex justify-content-between ">
                <img src="<?php echo $url_base;?>/imgs/IPNlogo.png"  width="5%">
                <a href="https://www.facebook.com/escomipnmx"  class="text-primary text-center" ><span class="bi bi-facebook"></span></a>
                <p class="text-success text-center " ><span class="bi bi-whatsapp"></span></p>
                <a href="https://maps.app.goo.gl/1cjgkvE5iiJY2tsa6" class=" text-light text-center "><span class="bi bi-geo-alt"></span></p>
                <a href="https://www.instagram.com/explore/locations/118110418347552/escom-ipn-mx/" id="ig" class="text-center "><span class="bi bi-instagram"></span></a>
                <img src="<?php echo $url_base;?>/imgs/logoESCOM.png" width="10%">                
            </div>
          </div>
          </div>
        </footer>




        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Mostrar otro campo cuando se elige OTRO-->
            <script>
function mostrarDiscapacidad() {
    var discapacidadSelect = document.getElementById("discapacidad2");
    var otrodis = document.getElementById("otrodis2");
    var seleccion = discapacidadSelect.options[discapacidadSelect.selectedIndex].value;
  
    if (seleccion === "OTRO") {
        otrodis.style.display = "block";
    } else {
        otrodis.style.display = "none";
    }
  }

  function mostrarNombreEscuela() {
    var escuelaProcedenciaSelect = document.getElementById("EP");
    var nombreEscuelaContainer = document.getElementById("nombreEscuelaContainer");
    var seleccion = escuelaProcedenciaSelect.options[escuelaProcedenciaSelect.selectedIndex].value;
  
  // Activar el campo de Nombre de la escuela si la opción seleccionada es "Otro"
    if (seleccion === "OTRO") {
        nombreEscuelaContainer.style.display = "block";
    } else {
        nombreEscuelaContainer.style.display = "none";
    }
  }
            </script>

        <!-- Validaciones-->
        <script>
    function validar() {
    var formularioValido = true;  // Bandera para rastrear la validez general del formulario
  
    // Llama a las funciones individuales de validación y actualiza la bandera formularioValido
    formularioValido = validarBoleta() && formularioValido;
    formularioValido = validarNombre() && formularioValido;
    formularioValido = validarAMaterno() && formularioValido;
    formularioValido = validarAPaterno() && formularioValido;
    formularioValido = validarFechaNacimiento() && formularioValido;
    formularioValido = validarGenero() && formularioValido;
    formularioValido = validarCURP() && formularioValido;
    
    formularioValido = validarCalle() && formularioValido;
    formularioValido = validarNumext() && formularioValido;
    formularioValido = validarColonia() && formularioValido;
    formularioValido = validarCodigo() && formularioValido;
    formularioValido = validarTC() && formularioValido;
    formularioValido = validarCorreo() && formularioValido;
    formularioValido = validarSeleccionalc() && formularioValido;
    formularioValido = validarSeleccionescuela() && formularioValido;
    formularioValido = validarSeleccionest() && formularioValido;
    formularioValido = validarPromedio() && formularioValido;
    
  
    // Verifica la validez general del formulario antes de navegar
    if (formularioValido) {
      enviarFormulario();
    } else {
      // Si el formulario no es válido, puedes mostrar un mensaje de error u tomar otras acciones
      alert("El formulario no es válido. Por favor, verifica los errores.");
    }
    return false; // Evita la recarga de la página
  }

  function enviarFormulario() {
  // Obtener los valores del formulario
  var boleta = document.getElementById("NBoleta").value;
  var nombre = document.getElementById("Nombre").value;
  var ap = document.getElementById("APaterno").value;
  var am = document.getElementById("AMaterno").value;
  var fechaNacimiento = document.getElementById("FNacimiento").value;
  // Obtener el valor del género
  var generoMasculino = document.getElementById('masculino');
  var generoFemenino = document.getElementById('femenino');
  var generoOtro = document.getElementById('otro');
  var genero;

  if (generoMasculino.checked) {
    genero = "Masculino";
  } else if (generoFemenino.checked) {
    genero = "Femenino";
} else if (generoOtro.checked) {
genero = "Otro";
}
 var curp = document.getElementById("CURP").value;
  
    // Obtener el valor de la discapacidad
  var discapacidadSelect = document.getElementById("discapacidad");
  var discapacidad = discapacidadSelect.options[discapacidadSelect.selectedIndex].text;

  // Obtener el valor del campo específico de discapacidad si es "OTRO"
  var discapacidades = "";
  if (discapacidadSelect.value === "6") {
    discapacidades = document.getElementById("otrodiscapacidad").value;
  }
  var Calle = document.getElementById("calle").value;
  var Numero = document.getElementById("numero").value;
 var Colonia = document.getElementById("colonia").value;
 var Cpostal = document.getElementById("cpostal").value;
  var Telocel = document.getElementById("telocel").value;
  var Correo = document.getElementById("correo").value;
   var alcaldiaSelect = document.getElementById("alcaldia");
  var alcaldia = alcaldiaSelect.options[alcaldiaSelect.selectedIndex].text;

  
   var escuelaSelect = document.getElementById("EP");
  var escuela = escuelaSelect.options[escuelaSelect.selectedIndex].text;

  // Obtener el valor del campo específico de la escuela si es "OTRO"
  var nombreEscuela = "";
  if (escuelaSelect.value === "21") {
    nombreEscuela = document.getElementById("nombreEscuela").value;
  }

  var estadosSelect = document.getElementById("estados");
  var estado = estadosSelect.options[estadosSelect.selectedIndex].text;

var Promedio = document.getElementById("Promedio").value;

}

    function validarBoleta() {
      var boletaInput = document.getElementById('NBoleta');
      var boletaValue = boletaInput.value;
  
      // Expresión regular para validar el formato de la boleta
      var regex = /^(?:\d{10}|(?:PE|PP)\d{8})$/;
  
      var errorMessage = document.getElementById('errorBOL');
      errorMessage.textContent = '';
      errorMessage.style.color = '';
        if (regex.test(boletaValue)) {
          //errorMessage.textContent = 'Válida';
          //errorMessage.style.color = 'green';
          return true; 
        } else {
          errorMessage.textContent = 'Ingese el formato correspondiente';
          errorMessage.style.color = 'red';
          return false;
    }}
    function validarNombre() {
      var nombreInput = document.getElementById('Nombre');
      var nombreValue = nombreInput.value;
  
      // Expresión regular para validar solo letras
      var regex = /^[A-Za-z\s]+$/;
  
      var errorMessage = document.getElementById('errorNAME');
      errorMessage.textContent = '';
      errorMessage.style.color = '';
      if (regex.test(nombreValue)) {
        //errorMessage.textContent = 'Válido';
        //errorMessage.style.color = 'green';
        return true; 
      } else {
        errorMessage.textContent = 'Ingrese solo letras';
        errorMessage.style.color = 'red';
        return false;
      }
    }
    function validarAPaterno() {
      var nombreInput = document.getElementById('APaterno');
      var nombreValue = nombreInput.value;
  
      // Expresión regular para validar solo letras
      var regex = /^[A-Za-z\s]+$/;
  
      var errorMessage = document.getElementById('errorAP');
      errorMessage.textContent = '';
      errorMessage.style.color = '';
      if (regex.test(nombreValue)) {
        //errorMessage.textContent = 'Valido';
        //errorMessage.style.color = 'green';
        return true; 
      } else {
        errorMessage.textContent = 'Ingrese solo letras';
        errorMessage.style.color = 'red';
        return false;
      }
    }
    function validarAMaterno() {
      var nombreInput = document.getElementById('AMaterno');
      var nombreValue = nombreInput.value;
  
      // Expresión regular para validar solo letras
      var regex = /^[A-Za-z\s]+$/;
  
      var errorMessage = document.getElementById('errorAM');
      errorMessage.textContent = '';
      errorMessage.style.color = '';
      if (regex.test(nombreValue)) {
        //errorMessage.textContent = 'Valido';
        //errorMessage.style.color = 'green';
        return true; 
      } else {
        errorMessage.textContent = 'Ingrese solo letras';
        errorMessage.style.color = 'red';
        return false;
      }
    }
    function validarFechaNacimiento() {
      var fechaNacimientoInput = document.getElementById('FNacimiento');
      var fechaNacimientoValue = fechaNacimientoInput.value;
      var fechaActual = new Date();
  
      var fechaNacimiento = new Date(fechaNacimientoValue);
  
      var edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();
      var edadErrorMessage = document.getElementById('errorEDAD');
      edadErrorMessage.textContent = '';
      edadErrorMessage.style.color = '';
      if (edad < 17) {
        edadErrorMessage.textContent = 'Debe ser mayor a 17 años';
        edadErrorMessage.style.color = 'red';
        return false;
         
      } else {
        //edadErrorMessage.textContent = 'Válido';
        //edadErrorMessage.style.color = 'green';
        return true; 
      }
  }
  function validarGenero() {
    var generoMasculino = document.getElementById('masculino');
    var generoFemenino = document.getElementById('femenino');
    var generoOtro = document.getElementById('otro');
    
  
    var generoErrorMessage = document.getElementById('errorGEN');
    generoErrorMessage.textContent = '';
    generoErrorMessage.style.color = '';
    if (generoMasculino.checked || generoFemenino.checked || generoOtro.checked) {
       // generoErrorMessage.textContent = 'Selección de género válida';
        //generoErrorMessage.style.color = 'green';
        return true; 
    } else {
        generoErrorMessage.textContent = 'Seleccione su género';
        generoErrorMessage.style.color = 'red';
        return false;
        
    }
  }
  function validarCURP() {
    var curpInput = document.getElementById('CURP');
    var curpValue = curpInput.value;
  
    // Expresión regular para validar CURP
    var regex = /^[A-Za-z]{4}\d{6}[A-Za-z]{6}[\dA-Za-z]{2}$/;
  
    var curpErrorMessage = document.getElementById('errorCURP');
    curpErrorMessage.textContent = '';
    curpErrorMessage.style.color = '';
    if (regex.test(curpValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        curpErrorMessage.textContent = 'Ingrese un CURP válido';
        curpErrorMessage.style.color = 'red';
        return false;
    }
  }
  
  function validarCalle(){
    var calleInput = document.getElementById('calle');
    var calleValue = calleInput.value;
    var regex = /^[a-zA-Z\s]{1,100}$/;
    var ErrorMessage = document.getElementById('errorCalle');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(calleValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'Ingrese solo letras';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  function validarNumext(){
    var numInput = document.getElementById('numero');
    var numValue = numInput.value;
    var regex = /^[0-9]{1,3}$/;
    var ErrorMessage = document.getElementById('errorNum');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(numValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'Solo se admiten números para el número exterior, con longitud entre 1 a 3 digitos.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  function validarColonia(){
    var colInput = document.getElementById('colonia');
    var colValue = colInput.value;
    var regex = /^[a-zA-Z\s]{1,100}$/;
    var ErrorMessage = document.getElementById('errorCol');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(colValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'Ingrese solo letras';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  function validarCodigo(){
    var cpInput = document.getElementById('cpostal');
    var cpValue = cpInput.value;
    var regex = /^[0-9]{5}$/;
    var ErrorMessage = document.getElementById('errorCodi');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(cpValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'El código postal debe tener 5 dígitos y solo números.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  function validarTC(){
    var tcInput = document.getElementById('telocel');
    var tcValue = tcInput.value;
    var regex = /^[0-9]{10}$/;
    var ErrorMessage = document.getElementById('errorTC');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(tcValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'El teléfono o celular debe tener 10 dígitos y solo números.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  
  function validarCorreo(){
    var correoInput = document.getElementById('correo');
    var correoValue = correoInput.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var ErrorMessage = document.getElementById('errorCorreo');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (regex.test(correoValue)) {
        //curpErrorMessage.textContent = 'Válido';
        //curpErrorMessage.style.color = 'green';
        return true; 
    } else {
        ErrorMessage.textContent = 'Ingresa un correo electrónico válido.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }   
     
  function validarSeleccionalc() {
    var opcionesSeleccionadas = document.getElementById("alcaldia").selectedOptions;
    var ErrorMessage = document.getElementById('errorAlca');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (opcionesSeleccionadas.length > 0) {
      return true;
    } else {
      ErrorMessage.textContent = 'Seleciona una opción.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  
  
  
  
  function validarSeleccionescuela() {
    var opcionesSeleccionadas = document.getElementById("EP").selectedOptions;
    var ErrorMessage = document.getElementById('errorEsc');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (opcionesSeleccionadas.length > 0) {
      return true;
    } else {
      ErrorMessage.textContent = 'Seleciona una opción.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  
  function validarSeleccionest() {
    var opcionesSeleccionadas = document.getElementById("estados").selectedOptions;
    var ErrorMessage = document.getElementById('errorEst');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (opcionesSeleccionadas.length > 0) {
      return true;
    } else {
      ErrorMessage.textContent = 'Seleciona una opción.';
        ErrorMessage.style.color = 'red';
        return false;
    }
  }
  function validarPromedio() {
    var valorPromedio = parseFloat(document.getElementById("Promedio").value);
    var ErrorMessage = document.getElementById('errorPro');
    ErrorMessage.textContent = '';
    ErrorMessage.style.color = '';
    if (!isNaN(valorPromedio) && /^\d+(\.\d{1,2})?$/.test(valorPromedio.toString())) {
     
      if (valorPromedio > 7.00 && valorPromedio <= 10.00) {
        return true;
       
      } else {
        ErrorMessage.textContent = 'El promedio debe ser mayor a 7.00 y menor a 10';
        ErrorMessage.style.color = 'red';
        return false;
      }
    } else {
      
      ErrorMessage.textContent = 'Por favor, ingresa un promedio válido con hasta dos decimales.';
      ErrorMessage.style.color = 'red';
      return false;
    }
  }
  
        </script>
    </body>
</html>