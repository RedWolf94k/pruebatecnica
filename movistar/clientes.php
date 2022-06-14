<?php include ("template/cabecera.php");?>

<?php
include("administrador/config/db.php");
$SQLQuery=$con->prepare("SELECT * FROM clientes");
$SQLQuery->execute();
$listaClientes=$SQLQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-7">
<br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DUI</th>
            <th>NIT</th>
            <th>Pasaporte</th>
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Estado Civil</th>
            <th>Direccion 1</th>
            <th>Direccion 2</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?PHP foreach($listaClientes as $cliente) { ?>
        <tr>

            <td><?php echo $cliente['id'];?></td>
            <td><?php echo $cliente['nombre'];?></td>
            <td><?php echo $cliente['apellido'];?></td>
            <td><?php echo $cliente['dui'];?></td>
            <td><?php echo $cliente['nit'];?></td>
            <td><?php echo $cliente['pasaporte'];?></td>
            <td><?php echo $cliente['fecha'];?></td>
            <td><?php echo $cliente['sexo'];?></td>
            <td><?php echo $cliente['estado'];?></td>
            <td><?php echo $cliente['direccion1'];?></td>
            <td><?php echo $cliente['direccion2'];?></td>
            <td><?php echo $cliente['email'];?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include ("template/pie.php");?>