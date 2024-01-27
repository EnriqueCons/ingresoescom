// Obtener los valores almacenados en sessionStorage en index.html
var boleta = sessionStorage.getItem("NBoleta");
var nombre = sessionStorage.getItem("Nombre");
var ap = sessionStorage.getItem("APaterno");
var am = sessionStorage.getItem("AMaterno");
var fechaNacimiento = sessionStorage.getItem("FNacimiento");
var genero = sessionStorage.getItem("Genero");
var curp = sessionStorage.getItem("CURP");
var discapacidad = sessionStorage.getItem("discapacidad");
var discapacidades = sessionStorage.getItem("otrodiscapacidad");
var Calle = sessionStorage.getItem("calle");
var Numero = sessionStorage.getItem("numero");
var Colonia = sessionStorage.getItem("colonia");
var alcaldia = sessionStorage.getItem("alcaldia");
var Cpostal = sessionStorage.getItem("cpostal");
var Telocel = sessionStorage.getItem("telocel");
var Correo = sessionStorage.getItem("correo");
var Ep = sessionStorage.getItem("EP");
var estado = sessionStorage.getItem("estados");
var Promedio = sessionStorage.getItem("Promedio");
var nombreEscuela = sessionStorage.getItem("nombreEscuela");

// Mostrar los valores en la página si existen en sessionStorage
if (boleta && nombre && ap && am && fechaNacimiento && genero && curp && discapacidad) {
    document.getElementById("NBoleta").value = boleta;
    document.getElementById("Nombre").value = nombre;
    document.getElementById("APaterno").value = ap;
    document.getElementById("AMaterno").value = am;
    document.getElementById("FNacimiento").value = fechaNacimiento;

    // Marcar el botón de género según el valor almacenado
    document.getElementById(genero.toLowerCase()).checked = true;

    document.getElementById("CURP").value = curp;

     // Obtener el valor del select "discapacidad"
     var discapacidadSelect = document.getElementById("discapacidad");
     var discapacidad = discapacidadSelect.options[discapacidadSelect.selectedIndex].text;
 
     // Obtener el valor del select "alcaldia"
     var alcaldiaSelect = document.getElementById("alcaldia");
     var alcaldia = alcaldiaSelect.options[alcaldiaSelect.selectedIndex].text;
 
     // Obtener el valor del select "estados"
     var estadosSelect = document.getElementById("estados");
     var estado = estadosSelect.options[estadosSelect.selectedIndex].text;
 
     // Obtener el valor del select "EP" (Escuela de Procedencia)
     var escuelaSelect = document.getElementById("EP");
     var escuela = escuelaSelect.options[escuelaSelect.selectedIndex].text;
 

    document.getElementById("calle").value = Calle;
    document.getElementById("numero").value = Numero;
    document.getElementById("colonia").value = Colonia;
    //document.getElementById("alcaldia").value = alcaldia;
    document.getElementById("cpostal").value = Cpostal;
    document.getElementById("telocel").value = Telocel;
    document.getElementById("correo").value = Correo;
    //document.getElementById("EP").value = Ep;
    //document.getElementById("estados").value = estado;
    document.getElementById("Promedio").value = Promedio;
    document.getElementById("nombreEscuela").value = nombreEscuela;
}
