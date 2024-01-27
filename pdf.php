<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el CURP ingresado
        $curp = $_POST["curp"];

        $conexion = mysqli_connect("localhost","root","","registro_alumnos");

        
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

        require('fpdf186/fpdf.php');

        //Clase PDF hereda todas las propiedades y métodos de la clase fpdf
        class PDF extends FPDF{
            //Cabecera de mi documento
            function header(){
                //Agregamos un banner, imagen o logo
                //Hacemos referencia al mismo objeto
                $this->Image('imgs/logoESCOM.png',170,12,30);
                $this->Image('imgs/IPNlogo.png',10,8,15);
                $this->SetFont('helvetica','I','10');
                $this->Cell(0, 10, utf8_decode('Comprobante de inscripción al examen'), 0, 1, 'C');
                $this->Cell(0, 10, utf8_decode('Ingreso a la Escuela Superior de Cómputo'), 0, 1, 'C');
                $this->Ln(18);
            }

            function footer(){
                $this->SetY(-20);
                $this->SetFont('helvetica','I','10');
                $this->Cell(0,15,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
        

    //Realizamos la conexión a nuestra BD para obtener los datos de los registros
    

        $consulta = "SELECT * FROM alumnos WHERE CURP='$curp'";
        $resultado = mysqli_query($conexion,$consulta);

        if ($resultado->num_rows > 0) {
            $alumno = mysqli_fetch_array($resultado);
            $nombre = $alumno[1];
            $paterno = $alumno[2];
            $materno = $alumno[3];
            $NBoleta = $alumno[0];
            $fechaNacimiento = $alumno[4];
            $Discapacidad = $alumno[7];
            $otroDis = $alumno[8];
            $promedio = $alumno[19];
            $correo = $alumno[14];
            $telocel = $alumno[13];
            $calle = $alumno[9];
            $numero = $alumno[10];
            $colonia = $alumno[11];
            $postal = $alumno[12];
            $alcaldia = $alumno[15];
            $estado = $alumno[18];
            $ep = $alumno[16];
            $oEp = $alumno[17];
            $laboratorio = $alumno[21];
            $horario = $alumno[22];     
    
            
    
            //Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages(); //Define el total de las páginas
            $pdf ->AddPage();
            $pdf->SetTitle($NBoleta,true);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(19, 10, utf8_decode('Nombre: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($nombre . ' ' . $paterno . ' ' . $materno), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(13, 10, utf8_decode('Curp: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($curp), 0, 1);
    
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(40, 10, utf8_decode('Número de Boleta: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($NBoleta), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(45, 10, utf8_decode('Fecha de nacimiento: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($fechaNacimiento), 0, 1);
            
            if($Discapacidad == 'Ninguna'){
    
            }
            elseif ($Discapacidad == 'OTRO') {
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(30, 10, utf8_decode('Discapacidad: '), 0, 0);
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, utf8_decode($otroDis), 0, 1);
            } 
            else{
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(30, 10, utf8_decode('Discapacidad: '), 0, 0);
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, utf8_decode($Discapacidad), 0, 1);
            }
    
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(23, 10, utf8_decode('Promedio: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($promedio), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(17, 10, utf8_decode('Correo: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($correo), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(39, 10, utf8_decode('Telefono o celular: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($telocel), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(33, 10, utf8_decode('Calle y número: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($calle.' '.$numero), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(18, 10, utf8_decode('Colonia: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($colonia), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(31, 10, utf8_decode('Código Postal: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($postal), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(19, 10, utf8_decode('Alcaldía: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($alcaldia), 0, 1);
    
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(17, 10, utf8_decode('Estado: '), 0, 0);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, utf8_decode($estado), 0, 1);
    
            if($ep == 'OTRO'){
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(17, 10, utf8_decode('Escuela de Procedencia: '), 0, 0);
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, utf8_decode($oEp), 0, 1);        
            }
            
            else{
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(51, 10, utf8_decode('Escuela de Procedencia: '), 0, 0);
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, utf8_decode($ep), 0, 1);
            }
    
    
            $pdf->Cell(0, 20, utf8_decode('Hora y grupo asignados para el examen'), 0, 1, 'C');
        
            $anchoPagina = $pdf->GetPageWidth();
            $anchoTabla = 120;  // Ajusta el ancho de la tabla según tus necesidades
            $inicioX = ($anchoPagina - $anchoTabla) / 2;

            // Título "Laboratorio"
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetXY($inicioX, $pdf->GetY());
            $pdf->Cell(70, 10, utf8_decode('Laboratorio'), 1, 0, 'C');

            // Contenido centrado para "Laboratorio"
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(50, 10, utf8_decode($laboratorio), 1, 1, 'C');

            // Título "Horario"
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetX($inicioX);
            $pdf->Cell(70, 10, utf8_decode('Horario'), 1, 0, 'C');

            // Contenido centrado para "Horario"
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(50, 10, utf8_decode($horario), 1, 1, 'C');
            $pdf->Ln(5);

            $pdf->SetFont('Arial', 'I', 8);
            $pdf->Cell(0, 20, utf8_decode('Recuerda que es indispensable llevar este formato para poder ingresar a las instalaciones y realizar tu examen'), 0, 1, 'C');
            $pdf->Cell(0, 1, utf8_decode('Si no ingresas a la hora establecida, se dará de baja del examen y tendrás que realizar de nuevo el registro'), 0, 1, 'C');
            
        
            //De esta forma se descarga en automático en el equipo el pdf con el nombre del número de boleta. Ustedes decidan si lo guardan en un archivo en específico o lo generan dinámicamente hasta que el usuario lo quiera recuperar
            $pdf->Output($NBoleta.'.pdf','D');
            $conexion->close();

        } else {
            // No se encontró ningún usuario con el CURP proporcionado
            echo "Usuario no encontrado con el CURP: $curp";
        }
}   
?>
