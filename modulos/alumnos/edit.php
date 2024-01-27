<?php 
session_start();
include("../../conexion.php");
//session_destroy();
if (!isset($_SESSION['nombre'])==$admin[1]) {
    // Si no está iniciada, redirigir al formulario de inicio de sesión
    session_destroy();
    header("Location: http://localhost/WEB/admin.html");
    exit();
}
?>

<?php
    $url_base = "http://localhost/WEB/";
?>

<?php
    if(isset($_GET['CURP'])){
        $txtcurp=(isset($_GET['CURP'])?$_GET['CURP']:"");
        $stm=$conexion->prepare("SELECT * FROM alumnos WHERE CURP=:txtcurp");
        $stm->bindParam(":txtcurp",$txtcurp);
        $stm->execute();
        $registro=$stm->fetch(PDO::FETCH_LAZY);

        $NBoleta=$registro['NBoleta'];
        $Nombre=$registro['Nombre'];
        $APaterno=$registro['APaterno'];
        $AMaterno=$registro['AMaterno'];
        $FNacimiento=$registro['FNacimiento'];
        $Genero=$registro['Genero'];
        $CURP=$registro['CURP'];
        $discapacidad=$registro['discapacidad'];
        $otrodiscapacidad=$registro['otrodiscapacidad'];
        $calle=$registro['calle'];
        $numero=$registro['numero'];
        $colonia=$registro['colonia'];
        $cpostal=$registro['cpostal'];
        $telocel=$registro['telocel'];
        $correo=$registro['correo'];
        $alcaldia=$registro['alcaldia'];
        $EP=$registro['EP'];
        $nombreEscuela=$registro['nombreEscuela'];
        $estados=$registro['estados'];
        $Promedio=$registro['Promedio'];
    }

    if($_POST){
        $txtcurp=(isset($_POST['CURP'])?$_POST['CURP']:"");
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

        $stm=$conexion->prepare("UPDATE alumnos SET NBoleta=:NBoleta,Nombre=:Nombre,APaterno=:APaterno,AMaterno=:AMaterno,FNacimiento=:FNacimiento,Genero=:Genero,CURP=:CURP,discapacidad=:discapacidad,otrodiscapacidad=:otrodiscapacidad,calle=:calle,numero=:numero,colonia=:colonia,cpostal=:cpostal,telocel=:telocel,correo=:correo,alcaldia=:alcaldia,EP=:EP,nombreEscuela=:nombreEscuela,estados=:estados,Promedio=:Promedio WHERE CURP=:txtcurp");

        $stm->bindParam(":txtcurp",$txtcurp);
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

        header("location:index.php");
    }



?>

<?php include("../../template/header.php");?>


<form action="" method="POST" autocomplete="off">
                    <div class="card d-flex justify-content-between fw-bold ">
                        <div class="card-body">
                            <fieldset>
                                <span class="text-warning text-center"><legend>Identidad</legend></span>
                                <div class="mb-3">
                                    <label for="NBoleta" class="form-label">No. de Boleta:</label>
                                    <input type="text" class="form-control" name="NBoleta" id="NBoleta" value="<?php echo $NBoleta?>" required>
                                    <p id="errorBOL"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre(s):</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?php echo $Nombre?>" required>
                                    <p id="errorNAME"></p>
                                </div>
                                <div class="mb-3">
                                <label for="APaterno" class="form-label">Apellido paterno:</label>
                                <input type="text" class="form-control" name="APaterno" id="APaterno" value="<?php echo $APaterno?>" required>
                                <p id="errorAP"></p>

                            </div>
                            <div class="mb-3">
                                <label for="AMaterno" class="form-label">Apellido materno:</label>
                                <input type="text" class="form-control" name="AMaterno" id="AMaterno" value="<?php echo $AMaterno?>" required>
                                <p id="errorAM"></p>
                            </div>
                            <div class="mb-3">
                                <label for="FNacimiento" class="form-label">Fecha de nacimiento:</label>
                                <input type="date" class="form-control" name="FNacimiento" id="FNacimiento" value="<?php echo $FNacimiento?>" required>
                                <p id="errorEDAD"></p>
                            </div>  
                            <div class="generos">                             
                                <div class="form-check">
                                    <label for="Genero">Género:</label><br>
                                    <input class="form-check-input" type="radio" name="Genero" id="masculino" value="Masculino" <?php echo ($Genero === 'Masculino') ? 'checked' : ''; ?>><span class="fw-normal" required>Masculino</span>                                
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Genero" id="femenino" value="Femenino" <?php echo ($Genero === 'Femenino') ? 'checked' : ''; ?>><span class="fw-normal">Femenino</span> 
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Genero" id="otro" value="Otro" <?php echo ($Genero === 'Otro') ? 'checked' : ''; ?>><span class="fw-normal">Prefiero no especificar</span> 
                                </div>
                                <p id="errorGEN"></p> 
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="CURP" class="form-label">CURP:</label>
                                <input type="text" class="form-control" name="CURP" id="CURP" value="<?php echo $CURP?>" required>
                                <p id="errorCURP"></p>
                            </div>
                            <div class="mb-3">
                                <label for="discapacidad" >A fin de considerar sus necesidades y atenderlas,
                                    requerimos saber si usted es una persona:</label><br>
                                <select class="form-select" aria-label="Default select example" name="discapacidad2" id="discapacidad2" onchange="mostrarDiscapacidad()" required>
                                    <option value="Ninguna" <?php echo ($discapacidad === 'Ninguna') ? 'selected' : ''; ?>>Ninguna</option>
                                    <option value="Con discapacidad auditiva" <?php echo ($discapacidad === 'Con discapacidad auditiva') ? 'selected' : ''; ?>>Con discapacidad auditiva</option>
                                    <option value="Con discapacidad motriz usuaria de silla de ruedas" <?php echo ($discapacidad === 'Con discapacidad motriz usuaria de silla de ruedas') ? 'selected' : ''; ?>>Con discapacidad motriz usuaria de silla de ruedas</option>
                                    <option value="Con discapacidad motriz usuaria de muletas" <?php echo ($discapacidad === 'Con discapacidad motriz usuaria de muletas') ? 'selected' : ''; ?>>Con discapacidad motriz usuaria de muletas</option>
                                    <option value="Con discapacidad motriz usuaria de bastón" <?php echo ($discapacidad === 'Con discapacidad motriz usuaria de bastón') ? 'selected' : ''; ?>>Con discapacidad motriz usuaria de bastón</option>
                                    <option value="Con discapacidad visual" <?php echo ($discapacidad === 'Con discapacidad visual') ? 'selected' : ''; ?>>Con discapacidad visual</option>
                                    <option value="OTRO" <?php echo ($discapacidad === 'OTRO') ? 'selected' : ''; ?>>OTRO</option>
                                </select><br><br>
                                </div>
                                
                                <div id="otrodis2" style="display: none;">
                                    <label for="otrodiscapacidad">Especifica:</label>
                                    <input type="text" class="form-control" id="otrodiscapacidad" name="otrodiscapacidad" value="<?php echo $otrodiscapacidad?>">
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
                                    <input type="text" class="form-control" name="calle" id="calle" value="<?php echo $calle?>" required>
                                    <p id="errorCalle"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número exterior:</label>
                                    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $numero?>" required>
                                    <p id="errorNum"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="colonia" class="form-label">Colonia:</label>
                                    <input type="text" class="form-control" name="colonia" id="colonia" value="<?php echo $colonia?>" required>
                                    <p id="errorCol"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="cpostal" class="form-label">Código Postal:</label>
                                    <input type="text" class="form-control" name="cpostal" id="cpostal" value="<?php echo $cpostal?>" required>
                                    <p id="errorCodi"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="telocel" class="form-label">Teléfono o celular:</label>
                                    <input type="text" class="form-control" name="telocel" id="telocel" value="<?php echo $telocel?>" required>
                                    <p id="errorTC"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $correo?>" required>
                                    <p id="errorCorreo"></p>
                                </div>
                                <div class="mb-3">
                                <label for="alcaldía">Alcaldía</label><br>
                                <select class="form-select" aria-label="Default select example" name="alcaldia" id="alcaldia">
                                    <option>Selecciona tu alcaldía</option>
                                    <option value="Álvaro Obregón" <?php echo ($alcaldia === 'Álvaro Obregón') ? 'selected' : ''; ?>>Álvaro Obregón</option>
                                    <option value="Azcapotzalco" <?php echo ($alcaldia === 'Azcapotzalco') ? 'selected' : ''; ?>>Azcapotzalco</option> 
                                    <option value="Benito Juárez" <?php echo ($alcaldia === 'Benito Juárez') ? 'selected' : ''; ?>>Benito Juárez</option>
                                    <option value="Coyoacán" <?php echo ($alcaldia === 'Coyoacán') ? 'selected' : ''; ?>>Coyoacán</option>
                                    <option value="Cuajimalpa de Morelos" <?php echo ($alcaldia === 'Cuajimalpa de Morelos') ? 'selected' : ''; ?>>Cuajimalpa de Morelos</option>
                                    <option value="Cuauhtémoc" <?php echo ($alcaldia === 'Cuauhtémoc') ? 'selected' : ''; ?>>Cuauhtémoc</option>
                                    <option value="Gustavo A. Madero" <?php echo ($alcaldia === 'Gustavo A. Madero') ? 'selected' : ''; ?>>Gustavo A. Madero</option>
                                    <option value="Iztacalco" <?php echo ($alcaldia === 'Iztacalco') ? 'selected' : ''; ?>>Iztacalco</option>
                                    <option value="Iztapalapa" <?php echo ($alcaldia === 'Iztapalapa') ? 'selected' : ''; ?>>Iztapalapa</option>
                                    <option value="La Magdalena Contreras" <?php echo ($alcaldia === 'La Magdalena Contreras') ? 'selected' : ''; ?>>La Magdalena Contreras</option>
                                    <option value="Miguel Hidalgo" <?php echo ($alcaldia === 'Miguel Hidalgo') ? 'selected' : ''; ?>>Miguel Hidalgo</option> 
                                    <option value="Milpa Alta" <?php echo ($alcaldia === 'Milpa Alta') ? 'selected' : ''; ?>>Milpa Alta</option>
                                    <option value="Tláhuac" <?php echo ($alcaldia === 'Tláhuac') ? 'selected' : ''; ?>>Tláhuac</option>
                                    <option value="Tlalpan" <?php echo ($alcaldia === 'Tlalpan') ? 'selected' : ''; ?>>Tlalpan</option>
                                    <option value="Venustiano Carranza" <?php echo ($alcaldia === 'Venustiano Carranza') ? 'selected' : ''; ?>>Venustiano Carranza</option>
                                    <option value="Xochimilco" <?php echo ($alcaldia === 'Xochimilco') ? 'selected' : ''; ?>>Xochimilco</option>
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
                            <option value='CECyT #1: "Gonzalo Vázquez Vega"' <?php echo ($EP === 'CECyT #1: "Gonzalo Vázquez Vega"') ? 'selected' : ''; ?>>CECyT #1: “Gonzalo Vázquez Vega”</option>
                            <option value='CECyT #2: "Miguel Bernard"' <?php echo ($EP === 'CECyT #2: "Miguel Bernard"') ? 'selected' : ''; ?>>CECyT #2: "Miguel Bernard"</option>
                            <option value='CECyT #3: "Estanislao Ramírez Ruiz"' <?php echo ($EP === 'CECyT #3: "Estanislao Ramírez Ruiz"') ? 'selected' : ''; ?>>CECyT #3: "Estanislao Ramírez Ruiz"</option>
                            <option value='CECyT 4 "Lázaro Cárdenas"' <?php echo ($EP === 'CECyT 4 "Lázaro Cárdenas"') ? 'selected' : ''; ?>>CECyT 4 "Lázaro Cárdenas"</option>
                            <option value='CECyT #5: "Benito Juárez García"' <?php echo ($EP === 'CECyT #5: "Benito Juárez García"') ? 'selected' : ''; ?>>CECyT #5: "Benito Juárez García"</option>
                            <option value='CECyT #6: "Miguel Othón de Mendizábal"' <?php echo ($EP === 'CECyT #6: "Miguel Othón de Mendizábal"') ? 'selected' : ''; ?>>CECyT #6: "Miguel Othón de Mendizábal"</option>
                            <option value='CECyT #7: "Cuauhtémoc"' <?php echo ($EP === 'CECyT #7: "Cuauhtémoc"') ? 'selected' : ''; ?>>CECyT #7: "Cuauhtémoc"</option>
                            <option value='CECyT #8: "Narciso Bassols García"' <?php echo ($EP === 'CECyT #8: "Narciso Bassols García"') ? 'selected' : ''; ?>>CECyT #8: "Narciso Bassols García"</option>
                            <option value='CECyT #9: "Juan de Dios Bátiz"' <?php echo ($EP === 'CECyT #9: "Juan de Dios Bátiz"') ? 'selected' : ''; ?>>CECyT #9: "Juan de Dios Bátiz"</option>
                            <option value='CECyT #10: "Carlos Vallejo Márquez"' <?php echo ($EP === 'CECyT #10: "Carlos Vallejo Márquez"') ? 'selected' : ''; ?>>CECyT #10: "Carlos Vallejo Márquez"</option>
                            <option value='CECyT #11: "Wilfrido Massieu Pérez"' <?php echo ($EP === 'CECyT #11: "Wilfrido Massieu Pérez"') ? 'selected' : ''; ?>>CECyT #11: "Wilfrido Massieu Pérez"</option>
                            <option value='CECyT #12: "José María Morelos y Pavón"' <?php echo ($EP === 'CECyT #12: "José María Morelos y Pavón"') ? 'selected' : ''; ?>>CECyT #12: "José María Morelos y Pavón"</option>
                            <option value='CECyT #13: "Ricardo Flores Magón"' <?php echo ($EP === 'CECyT #13: "Ricardo Flores Magón"') ? 'selected' : ''; ?>>CECyT #13: "Ricardo Flores Magón"</option>
                            <option value='CECyT #14: "Luis Enrique Erro"' <?php echo ($EP === 'CECyT #14: "Luis Enrique Erro"') ? 'selected' : ''; ?>>CECyT #14: "Luis Enrique Erro"</option>
                            <option value='CECyT #15: "Diódoro Antúnez Echegaray"' <?php echo ($EP === 'CECyT #15: "Diódoro Antúnez Echegaray"') ? 'selected' : ''; ?>>CECyT #15: "Diódoro Antúnez Echegaray"</option>
                            <option value='CECyT #16: "Hidalgo"' <?php echo ($EP === 'CECyT #16: "Hidalgo"') ? 'selected' : ''; ?>>CECyT #16: "Hidalgo"</option>
                            <option value='CECyT #17: "León, Guanajuato"' <?php echo ($EP === 'CECyT #17: "León, Guanajuato"') ? 'selected' : ''; ?>>CECyT #17: "León, Guanajuato" </option>
                            <option value='CECyT #18: "Zacatecas"' <?php echo ($EP === 'CECyT #18: "Zacatecas"') ? 'selected' : ''; ?>>CECyT #18: "Zacatecas"</option>
                            <option value='CECyT 19 “Leona Vicario”' <?php echo ($EP === 'CECyT 19 “Leona Vicario”') ? 'selected' : ''; ?>>CECyT 19 “Leona Vicario”</option>
                            <option value='CET 1 “Walter Cross Buchanan”' <?php echo ($EP === 'CET 1 “Walter Cross Buchanan”') ? 'selected' : ''; ?>>CET 1 “Walter Cross Buchanan”</option>
                            <option value="OTRO" <?php echo ($EP === 'OTRO') ? 'selected' : ''; ?>>OTRO</option>
                        </select><br>
                        <p id="errorEsc"></p>
                    </div>
                        
                        
                            <div id="nombreEscuelaContainer" style="display: none;">
                                <label for="nombreEscuela">Nombre de la escuela:</label>
                                <input type="text" class="form-control"  id="nombreEscuela" name="nombreEscuela" value="<?php echo $nombreEscuela?>">
                                <br><br>
                            
                        </div>
                        <div class="mb-3">
                        <label for="estados">Entidad Federativa de procedencia</label><br>
                        <select class="form-select" aria-label="Default select example" name="estados" id="estados">
                            <option>Selecciona tu Entidad</option>
                            <option value="Aguascalientes" <?php echo ($estados === 'Aguascalientes') ? 'selected' : ''; ?>>Aguascalientes</option>
                            <option value="Baja California" <?php echo ($estados === 'Baja California') ? 'selected' : ''; ?>>Baja California</option>
                            <option value="Baja California Sur" <?php echo ($estados === 'Baja California Sur') ? 'selected' : ''; ?>>Baja California Sur</option>
                            <option value="Campeche" <?php echo ($estados === 'Campeche') ? 'selected' : ''; ?>>Campeche</option>
                            <option value="Coahuila de Zaragoza" <?php echo ($estados === 'Coahuila de Zaragoza') ? 'selected' : ''; ?>>Coahuila de Zaragoza</option>
                            <option value="Colima" <?php echo ($estados === 'Colima') ? 'selected' : ''; ?>>Colima</option>
                            <option value="Chiapas" <?php echo ($estados === 'Chiapas') ? 'selected' : ''; ?>>Chiapas</option>
                            <option value="Chihuahua" <?php echo ($estados === 'Chihuahua') ? 'selected' : ''; ?>>Chihuahua</option>
                            <option value="Ciudad de México" <?php echo ($estados === 'Ciudad de México') ? 'selected' : ''; ?>>Ciudad de México</option>
                            <option value="Durango" <?php echo ($estados === 'Durango') ? 'selected' : ''; ?>>Durango</option>
                            <option value="Guanajuato" <?php echo ($estados === 'Guanajuato') ? 'selected' : ''; ?>>Guanajuato</option>
                            <option value="Guerrero" <?php echo ($estados === 'Guerrero') ? 'selected' : ''; ?>>Guerrero</option>
                            <option value="Hidalgo" <?php echo ($estados === 'Hidalgo') ? 'selected' : ''; ?>>Hidalgo</option>
                            <option value="Jalisco" <?php echo ($estados === 'Jalisco') ? 'selected' : ''; ?>>Jalisco</option>
                            <option value="Estado de México" <?php echo ($estados === 'Estado de México') ? 'selected' : ''; ?>>Estado de México</option>
                            <option value="Michoacán de Ocampo" <?php echo ($estados === 'Michoacán de Ocampo') ? 'selected' : ''; ?>>Michoacán de Ocampo</option>
                            <option value="Morelos" <?php echo ($estados === 'Morelos') ? 'selected' : ''; ?>>Morelos</option>
                            <option value="Nayarit" <?php echo ($estados === 'Nayarit') ? 'selected' : ''; ?>>Nayarit</option>
                            <option value="Nuevo León" <?php echo ($estados === 'Nuevo León') ? 'selected' : ''; ?>>Nuevo León</option>
                            <option value="Oaxaca" <?php echo ($estados === 'Oaxaca') ? 'selected' : ''; ?>>Oaxaca</option>
                            <option value="Puebla" <?php echo ($estados === 'Puebla') ? 'selected' : ''; ?>>Puebla</option>
                            <option value="Querétaro" <?php echo ($estados === 'Querétaro') ? 'selected' : ''; ?>>Querétaro</option>
                            <option value="Quintana Roo" <?php echo ($estados === 'Quintana Roo') ? 'selected' : ''; ?>>Quintana Roo</option>
                            <option value="San Luis Potosí" <?php echo ($estados === 'San Luis Potosí') ? 'selected' : ''; ?>>San Luis Potosí</option>
                            <option value="Sinaloa" <?php echo ($estados === 'Sinaloa') ? 'selected' : ''; ?>>Sinaloa</option>
                            <option value="Sonora" <?php echo ($estados === 'Sonora') ? 'selected' : ''; ?>>Sonora</option>
                            <option value="Tabasco" <?php echo ($estados === 'Tabasco') ? 'selected' : ''; ?>>Tabasco</option>
                            <option value="Tamaulipas" <?php echo ($estados === 'Tamaulipas') ? 'selected' : ''; ?>>Tamaulipas</option>
                            <option value="Tlaxcala" <?php echo ($estados === 'Tlaxcala') ? 'selected' : ''; ?>>Tlaxcala</option>
                            <option value="Veracruz de Ignacio de la Llave" <?php echo ($estados === 'Veracruz de Ignacio de la Llave') ? 'selected' : ''; ?>>Veracruz de Ignacio de la Llave</option>
                            <option value="Yucatán" <?php echo ($estados === 'Yucatán') ? 'selected' : ''; ?>>Yucatán</option>
                            <option value="Zacatecas" <?php echo ($estados === 'Zacatecas') ? 'selected' : ''; ?>>Zacatecas</option>
                        </select><br>
                        <p id="errorEst"></p>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="promedio" class="col-form-label">Promedio</label>
                            </div>
                            <div class="col-auto">
                              <input type="number" class="form-control" name="Promedio" id="Promedio" value="<?php echo $Promedio?>" step="0.01" required>
                              <p id="errorPro"></p>
                            </div>
                        </div><br>
                    </fieldset>
                </div>
            </div>
      <div>
        <br>
        <a href="index.php" class="btn btn-danger btn-lg">Cancelar</a>
        <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
      </div>
      </form>
<br>
<?php include("../../template/footer.php");?>