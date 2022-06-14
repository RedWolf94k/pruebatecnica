<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <div class="container">
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <br><br><br><br><br>
            
<div class="card">
    <div class="card-header">
Login
    </div>
    <div class="card-body">

    <!--mensaje de error en caso de log incorrecto-->
    <?php if (isset($mensaje)){?>
      <div class="alert alert-danger" role="alert">
        <?php echo $mensaje;?>
      </div>
    <?php }?>

<form method="POST">

<div class = "form-group">
<label>Usuario</label>
<input type="text" class="form-control" name="t1" placeholder="Ingrese el usuario">
</div>

<div class="form-group">
<label>Contraseña</label>
<input type="password" class="form-control" name="t2" placeholder="Contraseña">
</div>

<button type="submit" class="btn btn-primary">Entrar al Administrador</button>
</form>


    </div>

</div>

        </div>
        
    </div>
  </div>
    
  </body>
</html>
<?php
//login simple
if($_POST){
  session_start();
  require('config/db.php');

  $usuario=(isset($_POST['t1']))?$_POST['t1']:"";
  $password=(isset($_POST['t2']))?$_POST['t2']:"";
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query= $con-> prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND password= :password");
  $query->bindParam(":usuario", $usuario);
  $query->bindParam(":password", $password);
  $query->execute();
  $usuario= $query->fetch(PDO::FETCH_ASSOC);
  if($usuario){
    $_SESSION ['usuario']=$usuario["usuario"];
    header("Location:seccion/clientes.php");
  }else{
    $mensaje="Error contraseña o usuario incorrecto vuelva a intentarlo";
  }
}
?>

