<?php
    $url_base = "http://localhost/WEB/";
    include("conexion.php");
?>


<?php
    if($_POST['correo']==$admin[2] && $_POST['contrasena']==$admin[3]){
        SESSION_START();
        $_SESSION["nombre"] = $admin[1];
?> 
        

<?php include("template/header.php");?>
            
    <div class="p-5 mb-4 bg-secondary-subtle bg-gradient rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">MODO ADMINISTRADOR</h1>
            <p class="col-md-8 fs-4">
                Esta es la sesión de administrador, con la que podras ver, crear, modificar y eliminar alumnos. En la parte superior con "Alumnos" veras los alumnos registrados y "Cerrar  sesión" para salir del modo administrador. O simplemente da click en el botón de abajo para ver a los alumnos.
            </p><br>
            <a class="btn btn-primary btn-lg" href="<?php echo $url_base;?>modulos/alumnos/">Ver alumnos</a>
        </div>
    </div><br>
<?php include("template/footer.php");?>

    <?php }else{
        echo "<br><h1>Los datos introducidos no corresponden al administrador, regresa e introduce datos validos</h1>";
        echo "<br><a href='admin.html' style='font-size:30px'>Regresar</a>";
    }
?>














