<?php 
include("../../conexion.php");
SESSION_START(); 
if (!isset($_SESSION["nombre"])==$admin[1]) {
    // Si no está iniciada, redirigir al formulario de inicio de sesión
    session_destroy();
    header("Location: http://localhost/WEB/admin.html");
    exit();
}
?>



<?php
    
    $stm=$conexion->prepare("SELECT * FROM alumnos");
    $stm->execute();
    $alumnos=$stm->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['CURP'])){
        $txtcurp=(isset($_GET['CURP'])?$_GET['CURP']:"");
        $stm=$conexion->prepare("DELETE FROM alumnos WHERE CURP=:txtcurp");
        $stm->bindParam(":txtcurp",$txtcurp);
        $stm->execute();
        header("location:index.php");
    }
?>

<?php include("../../template/header.php");?>
<a href="createAlumno.php" class="btn btn-primary btn-lg">Agregar</a><br><br>
<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">Boleta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Genero</th>
                <th scope="col">CURP</th>
                <th scope="col">Discapacidad</th>
                <th scope="col">Otra discapacidad</th>
                <th scope="col">Calle</th>
                <th scope="col">Numero</th>
                <th scope="col">Colonia</th>
                <th scope="col">Codigo postal</th>
                <th scope="col">Telefono o celular</th>
                <th scope="col">Correo</th>
                <th scope="col">Alcaldía</th>
                <th scope="col">Escuela de Procedencia</th>
                <th scope="col">Otra escuela</th>
                <th scope="col">Estado</th>
                <th scope="col">Promedio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alumnos as $alumnos){?>
            <tr class="">
                <td scope="row"><?php echo $alumnos['NBoleta'];?></td>
                <td><?php echo $alumnos['Nombre'];?></td>
                <td><?php echo $alumnos['APaterno'];?></td>
                <td><?php echo $alumnos['AMaterno'];?></td>
                <td><?php echo $alumnos['FNacimiento'];?></td>
                <td><?php echo $alumnos['Genero'];?></td>
                <td><?php echo $alumnos['CURP'];?></td>
                <td><?php echo $alumnos['discapacidad'];?></td>
                <td><?php echo $alumnos['otrodiscapacidad'];?></td>
                <td><?php echo $alumnos['calle'];?></td>
                <td><?php echo $alumnos['numero'];?></td>
                <td><?php echo $alumnos['colonia'];?></td>
                <td><?php echo $alumnos['cpostal'];?></td>
                <td><?php echo $alumnos['telocel'];?></td>
                <td><?php echo $alumnos['correo'];?></td>
                <td><?php echo $alumnos['alcaldia'];?></td>
                <td><?php echo $alumnos['EP'];?></td>
                <td><?php echo $alumnos['nombreEscuela'];?></td>
                <td><?php echo $alumnos['estados'];?></td>
                <td><?php echo $alumnos['Promedio'];?></td>
                <td>
                <a href="edit.php?CURP=<?php echo $alumnos['CURP'];?>" class="btn btn-success">Editar</a><br></br>
                <a href="index.php?CURP=<?php echo $alumnos['CURP'];?>" class="btn btn-danger">Eliminar</a>

                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <br><br>
</div>
<br><br><br>


<?php include("../../template/footer.php");?>