<?php
$dsn = 'mysql:host=localhost;dbname=crud;charset=utf8;port:3306';
$db_user = 'root';
$db_pass = '';
try{
    // Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
    $db = new PDO($dsn, $db_user, $db_pass);
    $query = $db->query('SELECT * FROM usuarios');
    $usuarios = $query->fetchALL(PDO::FETCH_ASSOC);
}catch( PDOException  $e) {
    echo $e->getMessage();
    die();
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
<body><br>
<a class="btn btn-primary" href="new.php"> Cadastro </a>
<br><br>
<form>

      <table class="table">
      <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th> Ações</th>
        </tr>    
        </thead>
        <tbody>
        <?php foreach ($usuarios as $linha){?>
        <tr>
        <td><?php echo $linha['idusuarios'] ?> </td>
        <td><?php echo $linha['nome'] ?> </td>
        <td><?php echo $linha['email'] ?> </td>
        
        <td>
        <a href="edit.php? id=<?php echo $linha['idusuarios'] ; ?>">Editar</a>
        <a href="delete.php? id= <?php echo $linha['idusuarios'] ; ?>"> Exluir</a></td>
        <?php 

        }?>
        </tr>



</form>

    
</body>
</html>
