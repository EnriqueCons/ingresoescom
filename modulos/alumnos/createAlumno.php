<?php 
include("../../conexion.php");
session_start();
if (!isset($_SESSION["nombre"])==$admin[1]) {
    // Si no está iniciada, redirigir al formulario de inicio de sesión
    session_destroy();
    header("Location: http://localhost/WEB/admin.html");
    exit();
}
?>

<?php 

    if($_POST){
        

     $NBoleta=(isset($_POST['NBoleta'])?$_POST['NBoleta']:"");
     $Nombre=(isset($_POST['Nombre'])?$_POST['Nombre']:"");
     $APaterno=(isset($_POST['APaterno'])?$_POST['APaterno']:"");
     $AMaterno=(isset($_POST['AMaterno'])?$_POST['AMaterno']:"");
     $FNacimiento=(isset($_POST['FNacimiento'])?$_POST['FNacimiento']:"");
     $Genero=(isset($_POST['Genero'])?$_POST['Genero']:"");
     $CURP=(isset($_POST['CURP'])?$_POST['CURP']:"");
     $discapacidad=(isset($_POST['discapacidad2'])?$_POST['discapacidad2']:"");
     $otrodiscapacidad=(isset($_POST['otrodiscapacidad'])?$_POST['otrodiscapacidad']:"");
     $calle=(isset($_POST['calle'])?$_POST['calle']:"");
     $numero=(isset($_POST['numero'])?$_POST['numero']:"");
     $colonia=(isset($_POST['colonia'])?$_POST['colonia']:"");
     $cpostal=(isset($_POST['cpostal'])?$_POST['cpostal']:"");
     $telocel=(isset($_POST['telocel'])?$_POST['telocel']:"");
     $correo=(isset($_POST['correo'])?$_POST['correo']:"");
     $alcaldia=(isset($_POST['alcaldia'])?$_POST['alcaldia']:"");
     $EP=(isset($_POST['EP'])?$_POST['EP']:"");
     $nombreEscuela=(isset($_POST['nombreEscuela'])?$_POST['nombreEscuela']:"");
     $estados=(isset($_POST['estados'])?$_POST['estados']:"");
     $Promedio=(isset($_POST['Promedio'])?$_POST['Promedio']:"");
     $folio = (isset($_POST['folio']) ? $_POST['folio'] : "");
     $laboratorio = (isset($_POST['laboratorio']) ? $_POST['laboratorio'] : "");
     $horario = (isset($_POST['horario']) ? $_POST['horario'] : "");
    
 
     $stm=$conexion->prepare("INSERT INTO alumnos(NBoleta,Nombre,APaterno,AMaterno,FNacimiento,Genero,CURP,discapacidad,otrodiscapacidad,calle,numero,colonia,cpostal,telocel,correo,alcaldia,EP,nombreEscuela,estados,Promedio,folio,laboratorio,horario) VALUES (:NBoleta,:Nombre,:APaterno,:AMaterno,:FNacimiento,:Genero,:CURP,:discapacidad,:otrodiscapacidad,:calle,:numero,:colonia,:cpostal,:telocel,:correo,:alcaldia,:EP,:nombreEscuela,:estados,:Promedio, :folio, :laboratorio, :horario)");
 
     $folioMax = "SELECT MAX(folio) as max_folio FROM alumnos";
     $resultMaxfolio = $conexion->query($folioMax);
     $datosMaxfolio = $resultMaxfolio->fetch(PDO::FETCH_ASSOC);
     $maxfolio = $datosMaxfolio['max_folio'];
 
     // Calcular el nuevo grupo
     $nuevofolio = ($maxfolio !== null) ? $maxfolio + 1 : 1;

     $stm->bindParam(":folio", $nuevofolio);
 
 
     //ingresar horario y laboratorio
 
     if($nuevofolio <= 30){
         $stm->bindValue(":laboratorio",'1');
         $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');
     }
     elseif ($nuevofolio <= 60) {
        $stm->bindValue(":laboratorio",'2');
        $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');;
     }
     elseif ($nuevofolio <= 90) {
        $stm->bindValue(":laboratorio",'3');
        $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');
     }
     elseif ($nuevofolio <= 120) {
        $stm->bindValue(":laboratorio",'4');
        $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');
     }
     elseif ($nuevofolio <= 150) {
        $stm->bindValue(":laboratorio",'5');
        $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');
     }
     elseif ($nuevofolio <= 180) {
        $stm->bindValue(":laboratorio",'6');
        $stm->bindValue(":horario",'08:00 hrs -- 09:30 hrs');
     }
     elseif ($nuevofolio <= 210) {
        $stm->bindValue(":laboratorio",'1');
        $stm->bindValue(":horario",'09:45 hrs -- 11:15 hrs');
     }
     elseif ($nuevofolio <= 240) {
        $stm->bindValue(":laboratorio",'2');
        $stm->bindValue(":horario",'09:45 hrs -- 11:15 hrs');
     }
     elseif ($nuevofolio <= 270) {
        $stm->bindValue(":laboratorio",'3');
        $stm->bindValue(":horario",'09:45 hrs -- 11:15 hrs');
     }
     elseif ($nuevofolio <= 300) {
        $stm->bindValue(":laboratorio",'4');
        $stm->bindValue(":horario",'09:45 hrs -- 11:15 hrs');
     }
     elseif ($nuevofolio > 300) {
         echo "Se ha alcanzado el límite de inscripciones. No es posible registrar más personas.";
         $conexion->close();
     }



     $stm->bindParam(":NBoleta",$NBoleta);
     $stm->bindParam(":Nombre",$Nombre);
     $stm->bindParam(":APaterno",$APaterno);
     $stm->bindParam(":AMaterno",$AMaterno);
     $stm->bindParam(":FNacimiento",$FNacimiento);
     $stm->bindParam(":Genero",$Genero);
     $stm->bindParam(":CURP",$CURP);
     $stm->bindParam(":discapacidad",$discapacidad);
     $stm->bindParam(":otrodiscapacidad",$otrodiscapacidad);
     $stm->bindParam(":calle",$calle);
     $stm->bindParam(":numero",$numero);
     $stm->bindParam(":colonia",$colonia);
     $stm->bindParam(":cpostal",$cpostal);
     $stm->bindParam(":telocel",$telocel);
     $stm->bindParam(":correo",$correo);
     $stm->bindParam(":alcaldia",$alcaldia);
     $stm->bindParam(":EP",$EP);
     $stm->bindParam(":nombreEscuela",$nombreEscuela);
     $stm->bindParam(":estados",$estados);
     $stm->bindParam(":Promedio",$Promedio);
 
     $stm->execute();

     echo '<script>alert("Datos insertados correctamente");</script>';

     header("location:index.php");
    }
    ?>

<?php include("../../template/header.php");?>
<form action="" method="POST" onsubmit="return validar()" autocomplete="off">
        <div class="container">
                    <div class="card d-flex justify-content-between fw-bold ">
                        <div class="card-body">
                            <fieldset>
                                <span class="text-warning text-center"><legend>Identidad</legend></span>
                                <div class="mb-3">
                                    <label for="NBoleta" class="form-label">No. de Boleta:</label>
                                    <input type="text" class="form-control" name="NBoleta" id="NBoleta" required>
                                    <p id="errorBOL"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre(s):</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" required>
                                    <p id="errorNAME"></p>
                                </div>
                                <div class="mb-3">
                                <label for="APaterno" class="form-label">Apellido paterno:</label>
                                <input type="text" class="form-control" name="APaterno" id="APaterno" required>
                                <p id="errorAP"></p>

                            </div>
                            <div class="mb-3">
                                <label for="AMaterno" class="form-label">Apellido materno:</label>
                                <input type="text" class="form-control" name="AMaterno" id="AMaterno" required>
                                <p id="errorAM"></p>
                            </div>
                            <div class="mb-3">
                                <label for="FNacimiento" class="form-label">Fecha de nacimiento:</label>
                                <input type="date" class="form-control" name="FNacimiento" id="FNacimiento" required>
                                <p id="errorEDAD"></p>
                            </div>  
                            <div class="generos">                             
                                <div class="form-check">
                                    <label for="Genero">Género:</label><br>
                                    <input class="form-check-input" type="radio" name="Genero" id="masculino" value="Masculino"><span class="fw-normal" required>Masculino</span>                                
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Genero" id="femenino" value="Femenino"><span class="fw-normal">Femenino</span> 
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Genero" id="otro" value="Otro"><span class="fw-normal">Prefiero no especificar</span> 
                                </div>
                                <p id="errorGEN"></p> 
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="CURP" class="form-label">CURP:</label>
                                <input type="text" class="form-control" name="CURP" id="CURP" required>
                                <p id="errorCURP"></p>
                            </div>
                            <div class="mb-3">
                                <label for="discapacidad" >A fin de considerar sus necesidades y atenderlas,
                                    requerimos saber si usted es una persona:</label><br>
                                <select class="form-select" aria-label="Default select example" name="discapacidad2" id="discapacidad2" onchange="mostrarDiscapacidad()" required>
                                    <option value="Ninguna" selected>Ninguna</option>
                                    <option value="Con discapacidad auditiva">Con discapacidad auditiva</option>
                                    <option value="Con discapacidad motriz usuaria de silla de ruedas">Con discapacidad motriz usuaria de silla de ruedas</option>
                                    <option value="Con discapacidad motriz usuaria de muletas">Con discapacidad motriz usuaria de muletas</option>
                                    <option value="Con discapacidad motriz usuaria de bastón">Con discapacidad motriz usuaria de bastón</option>
                                    <option value="Con discapacidad visual">Con discapacidad visual</option>
                                    <option value="OTRO">OTRO</option>
                                </select><br><br>
                                </div>
                                
                                <div id="otrodis2" style="display: none;">
                                    <label for="otrodiscapacidad">Especifica:</label>
                                    <input type="text" class="form-control" id="otrodiscapacidad" name="otrodiscapacidad">
                                    <br><br>
                                </div>
                        
                            </fieldset>
                        </div>
                      </div>
                      <br>
                      <div class="card d-flex justify-content-between fw-bold">
                        <div class="card-body">
                            <fieldset>
                                <span class="text-warning text-center"><legend>Contacto</legend></span>
                                <div class="mb-3">
                                    <label for="calle" class="form-label">Calle:</label>
                                    <input type="text" class="form-control" name="calle" id="calle" required>
                                    <p id="errorCalle"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número exterior:</label>
                                    <input type="text" class="form-control" name="numero" id="numero" required>
                                    <p id="errorNum"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="colonia" class="form-label">Colonia:</label>
                                    <input type="text" class="form-control" name="colonia" id="colonia" required>
                                    <p id="errorCol"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="cpostal" class="form-label">Código Postal:</label>
                                    <input type="text" class="form-control" name="cpostal" id="cpostal" required>
                                    <p id="errorCodi"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="telocel" class="form-label">Teléfono o celular:</label>
                                    <input type="text" class="form-control" name="telocel" id="telocel" required>
                                    <p id="errorTC"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" name="correo" id="correo" required>
                                    <p id="errorCorreo"></p>
                                </div>
                                <div class="mb-3">
                                <label for="alcaldía">Alcaldía</label><br>
                                <select class="form-select" aria-label="Default select example" name="alcaldia" id="alcaldia">
                                    <option selected>Selecciona tu alcaldía</option>
                                    <option value="Álvaro Obregón">Álvaro Obregón</option>
                                    <option value="Azcapotzalco">Azcapotzalco</option> 
                                    <option value="Benito Juárez">Benito Juárez</option>
                                    <option value="Coyoacán">Coyoacán</option>
                                    <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
                                    <option value="Cuauhtémoc">Cuauhtémoc</option>
                                    <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                                    <option value="Iztacalco">Iztacalco</option>
                                    <option value="Iztapalapa">Iztapalapa</option>
                                    <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                                    <option value="Miguel Hidalgo">Miguel Hidalgo</option> 
                                    <option value="Milpa Alta">Milpa Alta</option>
                                    <option value="Tláhuac">Tláhuac</option>
                                    <option value="Tlalpan">Tlalpan</option>
                                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                                    <option value="Xochimilco">Xochimilco</option>
                                </select><br>
                                <p id="errorAlca"></p>
                                </div>
                                
                            </fieldset>
                        </div>
                      </div>
                      <br>
                      <div class="card d-flex justify-content-between fw-bold">
                        <div class="card-body">
                      <fieldset>
                        <span class="text-warning text-center"><legend>Procedencia</legend></span>
                        <div class="mb-3">
                        <label for="escuelas">Escuela de procedencia</label><br>
                        <select class="form-select" aria-label="Default select example" name="EP" id="EP" onchange="mostrarNombreEscuela()" required>
                            <option selected>Selecciona tu escuela</option>
                            <option value='CECyT #1: "Gonzalo Vázquez Vega"'>CECyT #1: “Gonzalo Vázquez Vega”</option>
                            <option value='CECyT #2: "Miguel Bernard"'>CECyT #2: "Miguel Bernard"</option>
                            <option value='CECyT #3: "Estanislao Ramírez Ruiz"'>CECyT #3: "Estanislao Ramírez Ruiz"</option>
                            <option value='CECyT 4 "Lázaro Cárdenas"'>CECyT 4 "Lázaro Cárdenas"</option>
                            <option value='CECyT #5: "Benito Juárez García"'>CECyT #5: "Benito Juárez García"</option>
                            <option value='CECyT #6: "Miguel Othón de Mendizábal"'>CECyT #6: "Miguel Othón de Mendizábal"</option>
                            <option value='CECyT #7: "Cuauhtémoc"'>CECyT #7: "Cuauhtémoc"</option>
                            <option value='CECyT #8: "Narciso Bassols García"'>CECyT #8: "Narciso Bassols García"</option>
                            <option value='CECyT #9: "Juan de Dios Bátiz"'>CECyT #9: "Juan de Dios Bátiz"</option>
                            <option value='CECyT #10: "Carlos Vallejo Márquez"'>CECyT #10: "Carlos Vallejo Márquez"</option>
                            <option value='CECyT #11: "Wilfrido Massieu Pérez"'>CECyT #11: "Wilfrido Massieu Pérez"</option>
                            <option value='CECyT #12: "José María Morelos y Pavón"'>CECyT #12: "José María Morelos y Pavón"</option>
                            <option value='CECyT #13: "Ricardo Flores Magón"'>CECyT #13: "Ricardo Flores Magón"</option>
                            <option value='CECyT #14: "Luis Enrique Erro"'>CECyT #14: "Luis Enrique Erro"</option>
                            <option value='CECyT #15: "Diódoro Antúnez Echegaray"'>CECyT #15: "Diódoro Antúnez Echegaray"</option>
                            <option value='CECyT #16: "Hidalgo"'>CECyT #16: "Hidalgo"</option>
                            <option value='CECyT #17: "León, Guanajuato"'>CECyT #17: "León, Guanajuato" </option>
                            <option value='CECyT #18: "Zacatecas"'>CECyT #18: "Zacatecas"</option>
                            <option value='CECyT 19 “Leona Vicario”'>CECyT 19 “Leona Vicario”</option>
                            <option value='CET 1 “Walter Cross Buchanan”'>CET 1 “Walter Cross Buchanan”</option>
                            <option value="OTRO">OTRO</option>
                        </select><br>
                        <p id="errorEsc"></p>
                    </div>
                        
                        
                            <div id="nombreEscuelaContainer" style="display: none;">
                                <label for="nombreEscuela">Nombre de la escuela:</label>
                                <input type="text" class="form-control"  id="nombreEscuela" name="nombreEscuela">
                                <br><br>
                            
                        </div>
                        <div class="mb-3">
                        <label for="estados">Entidad Federativa de procedencia</label><br>
                        <select class="form-select" aria-label="Default select example" name="estados" id="estados">
                            <option selected>Selecciona tu Entidad</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select><br>
                        <p id="errorEst"></p>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="promedio" class="col-form-label">Promedio</label>
                            </div>
                            <div class="col-auto">
                              <input type="number" class="form-control" name="Promedio" id="Promedio" step="0.01" required>
                              <p id="errorPro"></p>
                            </div>
                        </div><br>
                    </fieldset>
                </div>
            </div>
            <div>
            <input type="reset" class="btn btn-secondary btn-lg">
        <a href="index.php" class="btn btn-danger btn-lg">Cancelar</a>
        <button type="submit" class="btn btn-success btn-lg">Guardar</button>
      </div>
      </form>
      <br>
      <?php include("../../template/footer.php");?>