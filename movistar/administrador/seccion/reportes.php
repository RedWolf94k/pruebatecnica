<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php

include("../config/db.php");
$SQLQuery=$con->prepare("SELECT * FROM clientes");
$SQLQuery->execute();
$listaClientes=$SQLQuery->fetchAll(PDO::FETCH_ASSOC);

?>

</head>
<body>
  
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

</body>
</html>



<?php
$html=ob_get_clean();
require_once'../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$dompdf->loadhtml($html);

//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("archivo_pdf", array("Attachment"=> false));
?>

