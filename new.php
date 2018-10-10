<?php
if ($_POST){
$dsn = 'mysql:host=localhost;dbname=crud;charset=utf8;port:3306';
$db_user = 'root';
$db_pass = '';
try{
    // Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
    
    
    $db = new PDO($dsn, $db_user, $db_pass);
    $query = $db->prepare('INSERT INTO usuarios(nome, email) VALUES(:nome, :email)');
  
    $query-> execute([
    ':nome'=>$_POST['nome'],
    ':email'=>$_POST['email']
   
    ]);
   
    header('Location:view.php');
    
}catch( PDOException  $e) {
    echo $e->getMessage();
    die();
  }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Crud</title>
    
</head>
<body>
<h1>Inclusão de Usuario</h1>

<form action= "new.php" method= "post">

<div>
<div class="form-group">
    <label for="exampleInputPassword1">Nome:</label>
    <input type="text" style= "width: 200px"class="form-control" name="nome" id="exampleInputPassword1" size= "40px" value= "">
  </div>

<div class="form-group">
    <label for="exampleFormControlInput1">Endereço de email:</label>
    <input type="email" style= "width: 200px"class="form-control"name="email" id="exampleFormControlInput1" placeholder="nome@exemplo.com" value= "">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>

    
</body>
</html>