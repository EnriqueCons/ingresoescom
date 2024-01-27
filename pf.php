<?php

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn=mysqli_connect("localhost","root","","registro_alumnos");


    $folioMax = "SELECT MAX(folio) as max_folio FROM alumnos";
    $resultMaxfolio = $conn->query($folioMax);
    $datosMaxfolio = $resultMaxfolio->fetch_assoc();
    $maxfolio = $datosMaxfolio['max_folio'];

    // Calcular el nuevo grupo
    $nuevofolio = ($maxfolio !== null) ? $maxfolio + 1 : 1;


    //ingresar horario y laboratorio

    if($nuevofolio <= 30){
        $laboratorio = "1";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 60) {
        $laboratorio = "2";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 90) {
        $laboratorio = "3";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 120) {
        $laboratorio = "4";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 150) {
        $laboratorio = "5";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 180) {
        $laboratorio = "6";
        $horario = "08:00 hrs -- 09:30 hrs";
    }
    elseif ($nuevofolio <= 210) {
        $laboratorio = "1";
        $horario = "09:45 hrs -- 11:15 hrs";
    }
    elseif ($nuevofolio <= 240) {
        $laboratorio = "2";
        $horario = "09:45 hrs -- 11:15 hrs";
    }
    elseif ($nuevofolio <= 270) {
        $laboratorio = "3";
        $horario = "09:45 hrs -- 11:15 hrs";
    }
    elseif ($nuevofolio <= 300) {
        $laboratorio = "4";
        $horario = "09:45 hrs -- 11:15 hrs";
    }
    elseif ($nuevofolio > 300) {
        echo "Se ha alcanzado el límite de inscripciones. No es posible registrar más personas.";
        $conn->close();
    }



    // Obtener los datos del formulario
    $NBoleta = $_POST["NBoleta"];
    $Nombre = $_POST["Nombre"];
    $APaterno = $_POST["APaterno"];
    $AMaterno = $_POST["AMaterno"];
    $FNacimiento = $_POST["FNacimiento"];
    $Genero = $_POST["Genero"];
    $CURP = $_POST["CURP"];
    $discapacidad = $_POST["discapacidad"];
    $otrodiscapacidad = isset($_POST["otrodiscapacidad"]) ? $_POST["otrodiscapacidad"] : "";
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $colonia = $_POST["colonia"];
    $cpostal = $_POST["cpostal"];
    $telocel = $_POST["telocel"];
    $correo = $_POST["correo"];
    $alcaldia = $_POST["alcaldia"];
    $EP = $_POST["EP"];
    $nombreEscuela = isset($_POST["nombreEscuela"]) ? $_POST["nombreEscuela"] : "";
    $estados = $_POST["estados"];
    $Promedio = $_POST["Promedio"];

    

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos en la tabla
    $sql = "INSERT INTO alumnos (NBoleta, Nombre, APaterno, AMaterno, FNacimiento, Genero, CURP, discapacidad, otrodiscapacidad, calle, numero, colonia, cpostal, telocel, correo, alcaldia, EP, nombreEscuela, estados, Promedio, folio, laboratorio, horario)
            VALUES ('$NBoleta', '$Nombre', '$APaterno', '$AMaterno', '$FNacimiento', '$Genero', '$CURP', '$discapacidad', '$otrodiscapacidad', '$calle', '$numero', '$colonia', '$cpostal', '$telocel', '$correo', '$alcaldia', '$EP', '$nombreEscuela', '$estados', '$Promedio', '$nuevofolio', '$laboratorio', '$horario')";

if ($conn->query($sql) === TRUE) {
    // Redireccionar a mensaje.html con los datos
    header("Location: mensaje.html?" . http_build_query($_POST));
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    // Cerrar la conexión
    $conn->close();
}
?>
