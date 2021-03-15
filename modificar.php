<?php
include("clases/conexionOpen.php");
include("fragmentos/header.php");

?>

<div class="row">
    <div class="col-4 col-md-5"></div>
    <div class="col-4 col-md-2">
    <form action="insertar.php" method="post">
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca" class="form-control">
        <label for="calidad">Calidad</label>
        <input type="text" name="calidad" id="calidad" class="form-control">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" class="form-control"><br>
        <input type="submit" value="Modificar" class="btn btn-secondary" name="btnmodificar">
    </form>
    <?php
        $_id = $_GET['id'];
        $_marca = $_POST['marca'];
        $_calidad = $_POST['calidad'];
        $_precio = $_POST['precio'];
        $query = "UPDATE portatil SET marca_por = '$_marca', calidad_por = '$_calidad' precio_por = '$_precio' WHERE id_por = '$_id'";
        $registro = mysqli_query($conexion, $query);

    ?>

    </div>
    <div class="col-4 col-md-5"></div>
</div>

<?php
include("fragmentos/footer.php");
?>