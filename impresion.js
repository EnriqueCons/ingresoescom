
document.addEventListener("DOMContentLoaded", function () {
  // Obtener los parámetros de la URL
  const urlParams = new URLSearchParams(window.location.search)

 var boleta = sessionStorage.getItem("NBoleta");
 var nombre = sessionStorage.getItem("Nombre");
 var ap = sessionStorage.getItem("APaterno");
 var am = sessionStorage.getItem("AMaterno");
 var genero = sessionStorage.getItem("Genero");
 var fechaNacimiento = sessionStorage.getItem("FNacimiento");
 var curp = sessionStorage.getItem("CURP");
 var discapacidad = sessionStorage.getItem("discapacidad");
 var discapacidades = sessionStorage.getItem("otrodiscapacidad");
 var Calle = sessionStorage.getItem("calle");
 var Numero = sessionStorage.getItem("numero");
 var Colonia = sessionStorage.getItem("colonia");
 var Cpostal = sessionStorage.getItem("cpostal");
 var Telocel = sessionStorage.getItem("telocel");
 var Correo = sessionStorage.getItem("correo");
 var Alcaldia = sessionStorage.getItem("alcaldia");
var Ep = sessionStorage.getItem("EP");
 var Estados = sessionStorage.getItem("estados");
var Promedio = sessionStorage.getItem("Promedio");
 var NombreEscuela = sessionStorage.getItem("nombreEscuela");
 
 document.getElementById("mostrarboleta").innerText = boleta;
document.getElementById("mostrarNombre").innerText = nombre;
 document.getElementById("mostrarap").innerText = ap;
 document.getElementById("mostraram").innerText = am;
 document.getElementById("mostrarfna").innerText = fechaNacimiento;
document.getElementById("mostrarNombreCompleto").innerText = nombre + " " + ap +" " + am;
 document.getElementById("mostrargen").innerText = genero;
document.getElementById("mostrarcurp").innerText = curp;
 document.getElementById("mostrardis").innerText = discapacidad;
 document.getElementById("mostrardises").innerText = discapacidades;
  document.getElementById("mostrarcalle").innerText = Calle;
document.getElementById("mostrarnumero").innerText = Numero;
  document.getElementById("mostrarcolonia").innerText =Colonia;
 document.getElementById("mostrarcpostal").innerText = Cpostal;
 document.getElementById("mostrartelocel").innerText = Telocel;
 document.getElementById("mostrarcorreo").innerText = Correo;
 document.getElementById("mostraralcaldia").innerText = Alcaldia;
document.getElementById("mostraraEp").innerText = Ep;
document.getElementById("mostrarestados").innerText = Estados;
document.getElementById("mostrarpromedio").innerText = Promedio;
 document.getElementById("mostrarnombreEscuela").innerText = NombreEscuela;
});
/*function GENPDF() {
    // Redirigir al formulario para modificar datos
    console.log("Función GENPDF() llamada");
    window.location.href = "pdf.html";
    }
 function aceptarDatos() {
  alert("Tus datos fueron guardados correctamente");
   var formData = new FormData();
   formData.append("NBoleta", sessionStorage.getItem("NBoleta"));
   formData.append("Nombre", sessionStorage.getItem("Nombre"));
   formData.append("APaterno", sessionStorage.getItem("APaterno"));
   formData.append("AMaterno", sessionStorage.getItem("AMaterno"));
   formData.append("Genero", sessionStorage.getItem("Genero"));
   formData.append("FNacimiento", sessionStorage.getItem("FNacimiento"));
   formData.append("CURP", sessionStorage.getItem("CURP"));
   formData.append("discapacidad", sessionStorage.getItem("discapacidad"));
   formData.append("otrodiscapacidad", sessionStorage.getItem("otrodiscapacidad"));
   formData.append("calle", sessionStorage.getItem("calle"));
   formData.append("numero", sessionStorage.getItem("numero"));
   formData.append("colonia", sessionStorage.getItem("colonia"));
   formData.append("cpostal", sessionStorage.getItem("cpostal"));
   formData.append("telocel", sessionStorage.getItem("telocel"));
   formData.append("correo", sessionStorage.getItem("correo"));
   formData.append("alcaldia", sessionStorage.getItem("alcaldia"));
   formData.append("EP", sessionStorage.getItem("EP"));
   formData.append("estados", sessionStorage.getItem("estados"));
   formData.append("Promedio", sessionStorage.getItem("Promedio"));
   formData.append("nombreEscuela", sessionStorage.getItem("nombreEscuela"));   

   // Realizar la solicitud AJAX
   fetch("pf.php", {
       method: "POST",
       body: formData
   })
   .then(response => response.json())
   .then(data => {
       // Manejar la respuesta del servidor
       if (data.success) {
           alert("Tus datos fueron guardados correctamente");
           
       } else {
           alert("Hubo un error al guardar los datos");
       }
   })
   .catch(error => {
       console.error("Error en la solicitud AJAX:", error);
   });
   //window.location.href = "pdf.php";  
 }

 function modificarDatos() {
// Redirigir al formulario para modificar datos
window.location.href = "registro.html";
}
*/