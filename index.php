<?php
include("fragmentos/header.php");
include("clases/conexionOpen.php");
?>
<div class="row">
    <div class="col-3 col-md-3"></div>
    <div class="col-3 col-md-3">
        <form action="index.php" method="post">
            <label for="marca"> marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca">
            <label for="calidad"> calidad:</label>
            <input type="text" name="calidad" id="calidad" class="form-control" placeholder="calidad">
            <label for="id"> valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" placeholder="valor"><br>
            <input type="submit" value="Ingresar" class="btn btn-primary" name="btningresar">
        </form>
        <?php

        if (isset($_POST['btningresar'])) {
            $_marca = $_POST['marca'];
            $_calidad = $_POST['calidad'];
            $_valor = $_POST['valor'];
            $conexion->query("INSERT INTO $tb1(marca_por, calidad_por, valor_por) VALUES('$_marca','$_calidad','$_valor')");
        }

        ?>
    </div>
    <div class="col-3 col-md-3">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MARCA</th>
                    <th>CALIDAD</th>
                    <th>VALOR</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM $tb1";
                $mostrar = mysqli_query($conexion, $query);
                while ($consulta = mysqli_fetch_array($mostrar)) {
                ?>

                    <tr>
                        <td><?php echo $consulta['id_por']; ?></td>
                        <td><?php echo $consulta['marca_por']; ?></td>
                        <td><?php echo $consulta['calidad_por']; ?></td>
                        <td><?php echo $consulta['valor_por']; ?></td>
                        <td><a href="eliminar.php?id=<?php echo $consulta['id_por']; ?>"><button class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a><a href="modificar.php?id=<?php echo $consulta['id_por']; ?>"><button class="btn btn-success"><i class="fas fa-marker"></i></button></a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
    <div class="col-3 col-md-3">
    <form action ="index.php" method="post">
<label for="id" class="form-label">ID </label>
<input  type="text" name="id" id="id" class="form-control">
<input  type="submit" value="buscar" name="btnbuscar" class="btn btn-primary">
</form>
<?php
if (isset($_POST['btnbuscar'])){
    $_id = $_POST['id'];
include("./clases/conexionOpen.php");
    $resultado = mysqli_query($conexion, "SELECT * FROM $tb1 WHERE id = $_id");
    while ($consulta = mysqli_fetch_array($resultado)){
       echo "
       <table class=\"table\">
       <tr>
       <td><center><b>id</b></center></td>
       <td><center><b>marca</b></center></td>
       <td><center><b>calidad</b></center></td>
       <td><center><b>valor</b></center></td>
      
      
       </tr>
    <td><center>".$consulta['id_por']."</center></td>
    <td><center>".$consulta['marca_por']."</center></td>
    <td><center>".$consulta['calidad_por']."</center></td>
    <td><center>".$consulta['valor_por']."</center></td>
   
</table>
       ";
    }
   include("./clases/conexionClose.php");
}
?></div>
</div>
<?php
include("./fragmentos/footer.php");
?>