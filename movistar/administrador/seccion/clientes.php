<?php include("../template/cabecera.php");?>
<?php
//Validaciones
$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtDUI=(isset($_POST['txtDUI']))?$_POST['txtDUI']:"";
$txtNIT=(isset($_POST['txtNIT']))?$_POST['txtNIT']:"";
$txtPasaporte=(isset($_POST['txtPasaporte']))?$_POST['txtPasaporte']:"";
$txtFecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
$txtSexo=(isset($_POST['sexo']))?$_POST['sexo']:"";
$txtEstado=(isset($_POST['estado']))?$_POST['estado']:"";
$txtDireccion1=(isset($_POST['txtDireccion1']))?$_POST['txtDireccion1']:"";
$txtDireccion2=(isset($_POST['txtDireccion2']))?$_POST['txtDireccion2']:"";
$txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php");

switch($accion){

    case "Agregar":
        $SQLQuery= $con->prepare("INSERT INTO clientes (nombre, apellido, dui, nit, pasaporte, fecha, sexo, estado, direccion1, direccion2, email, fechaCreacion) VALUES (:nombre, :apellido, :dui, :nit, :pasaporte, :fecha, :sexo, :estado, :direccion1, :direccion2, :email, current_timestamp());");
        $SQLQuery->bindParam(":nombre",$txtNombre);
        $SQLQuery->bindParam(":apellido",$txtApellidos);
        $SQLQuery->bindParam(":dui",$txtDUI);
        $SQLQuery->bindParam(":nit",$txtNIT);
        $SQLQuery->bindParam(":pasaporte",$txtPasaporte);
        $SQLQuery->bindParam(":fecha",$txtFecha);
        $SQLQuery->bindParam(":sexo",$txtSexo);
        $SQLQuery->bindParam(":estado",$txtEstado);
        $SQLQuery->bindParam(":direccion1",$txtDireccion1);
        $SQLQuery->bindParam(":direccion2",$txtDireccion2);
        $SQLQuery->bindParam(":email",$txtEmail);
        header("Location:clientes.php");
        $SQLQuery->execute();
        break;

    case "Modificar":
            $SQLQuery=$con->prepare("UPDATE clientes SET nombre=:nombre, apellido=:apellido, dui=:dui, nit=:nit, pasaporte=:pasaporte,
            fecha=:fecha, sexo=:estado, estado=:estado, direccion1=:direccion1, direccion2=:direccion2, email=:email WHERE id=:id");
            $SQLQuery->bindParam(":id", $txtId);
            $SQLQuery->bindParam(":nombre", $txtNombre);
            $SQLQuery->bindParam(":apellido",$txtApellidos);
            $SQLQuery->bindParam(":dui",$txtDUI);
            $SQLQuery->bindParam(":nit",$txtNIT);
            $SQLQuery->bindParam(":pasaporte",$txtPasaporte);
            $SQLQuery->bindParam(":fecha",$txtFecha);
            $SQLQuery->bindParam(":sexo",$txtSexo);
            $SQLQuery->bindParam(":estado",$txtEstado);
            $SQLQuery->bindParam(":direccion1",$txtDireccion1);
            $SQLQuery->bindParam(":direccion2",$txtDireccion2);
            $SQLQuery->bindParam(":email",$txtEmail);
            $SQLQuery->execute();
            header("Location:clientes.php");
            break;
            

    case "Cancelar":
            header("Location:clientes.php");
            break;

    case "Seleccionar":
        $SQLQuery=$con->prepare("SELECT * FROM clientes WHERE id=:id");
        $SQLQuery->bindParam(":id", $txtId);
        $SQLQuery->execute();
        $Cliente=$SQLQuery->fetch(PDO::FETCH_LAZY);
        $txtNombre=$Cliente['nombre'];
        $txtApellidos=$Cliente['apellido'];
        $txtDUI=$Cliente['dui'];
        $txtNIT=$Cliente['nit'];
        $txtPasaporte=$Cliente['pasaporte'];
        $txtFecha=$Cliente['fecha'];
        $txtSexo=$Cliente['sexo'];
        $txtEstado=$Cliente['estado'];
        $txtDireccion1=$Cliente['direccion1'];
        $txtDireccion2=$Cliente['direccion2'];
        $txtEmail=$Cliente['email'];

            break;
    case "Borrar":
            $SQLQuery= $con->prepare("DELETE FROM clientes WHERE id=:id");
            $SQLQuery->bindParam(":id", $txtId);
            $SQLQuery->execute();
            header("Location:clientes.php");
            break;
            

}

$SQLQuery=$con->prepare("SELECT * FROM clientes");
$SQLQuery->execute();
$listaClientes=$SQLQuery->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del Cliente
        </div>
        <div class="card-body">
    <!--formulario para agregar clientes-->
   <form method="POST" enctype="multipart/from-data">

   <div class = "form-group">
   <input type="hidden" class="form-control" value ="<?php echo $txtId?>" name="txtId" id="txtId" placeholder="...">
   </div>

   <div class = "form-group">
   <label>Nombres:</label>
   <input type="text" required class="form-control" value ="<?php echo $txtNombre?>" name="txtNombre" id="txtNombre" placeholder="Nombres...">
   </div>

   <div class = "form-group">
   <label>Apellidos:</label>
   <input type="text" required class="form-control" value ="<?php echo $txtApellidos?>" name="txtApellidos" id="txtApellidos" placeholder="Apellidos...">
   </div>

   <div class = "form-group">
   <label>DUI:</label>
   <input type="text" required class="form-control" value ="<?php echo $txtDUI?>" name="txtDUI" id="txtDUI" placeholder="DUI...">
   </div>

   <div class = "form-group">
   <label>NIT:</label>
   <input type="text" required class="form-control" value ="<?php echo $txtNIT?>" name="txtNIT" id="txtNIT" placeholder="NIT...">
   </div>

   <div class = "form-group">
   <label>Pasaporte:</label>
   <input type="text" class="form-control"value ="<?php echo $txtPasaporte?>" name="txtPasaporte" id="txtPasaporte" placeholder="Pasaporte* (opcional)">
   </div>

   <div class= "form-group">
   <label>Fecha de Nacimiento </label>
   <input type="date" required class="form-control" value ="<?php echo $txtFecha?>" name="fecha" id="fecha" min="1900-01-01" max="2022-12-31" step="1" />
   </div> 

<!--Seccion de sexo y estado civil-->

   <div class= "form-group">
     <p>
      <label>Sexo</label>
      <select name="sexo">
       <option value="value ="<?php echo $txtSexo?>"">Seleccione...</option>
       <option type="text" id="sexo" value="Hombre">Hombre</option>
       <option type="text" id="sexo" value="Mujer">Mujer</option>
      </select>
      </p>
    </div>

<div class= "from-group">

<p>
   <label>Estado Civil</label>
   <select name="estado">
     <option value="value ="<?php echo $txtEstado?>"">Seleccione...</option>
     <option type="text" id="estado" value="Soltero">Soltero</option>
     <option type="text" id="estado" value="Casado">Casado</option>
     <option type="text" id="estado" value="Acompañado">Acompañado</option>
     <option type="text" id="estado" value="Viudo">Viudo</option>
    </select>
   </p>

</div>

   <div class = "form-group">
   <label>Direccion 1:</label>
   <input type="text" required class="form-control"value ="<?php echo $txtDireccion1?>"  name="txtDireccion1" id="txtDireccion1" placeholder="Direccion 1...">
   </div>

   <div class = "form-group">
   <label>Direccion 2:</label>
   <input type="text" class="form-control"value ="<?php echo $txtDireccion2?>"  name="txtDireccion2" id="txtDireccion2" placeholder="Direccion 2...">
   </div>

   <div class = "form-group">
   <label>E-mail:</label>
   <input type="text" class="form-control" value ="<?php echo $txtEmail?>" name="txtEmail" id="txtEmail" placeholder="Correo Electronico...">
   </div>

<!--botones-->
   <div class="form-group" role="group" aria-label="">
    <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
   </div>

   </form>



        </div>



    </div>
    
   
   
</div>

<div class="col-md-7">
<a href="reportes.php">Reporte PDF</a>
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
            <th>Acciones</th>
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

            <td>
              <form method="post">
                <input type="hidden" name="txtId" id="txtId" value="<?php echo $cliente['id'];?>"/>

                <button type="submit" name="accion" value="Seleccionar" class="btn btn-primary">Seleccionar</button>
                <button type="submit" name="accion" value="Borrar" class="btn btn-danger"/>Borrar</button>
                
              </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>
<?php include("../template/pie.php");?>