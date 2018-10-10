<?php
$id= isset ($_REQUEST['id'])?$_REQUEST['id']:false;

$dsn = 'mysql:host=localhost;dbname=crud;charset=utf8;port:3306';
$db_user = 'root';
$db_pass = '';
try{
    // Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
    $db = new PDO($dsn, $db_user, $db_pass);
    $query = $db->prepare('SELECT*FROM usuarios WHERE idusuarios= :id');
    $query->execute([':id'=>$id]);
    $usuario= $query->fetch(PDO::FETCH_ASSOC);

}catch( PDOException  $e) {
    echo $e->getMessage();
    die();
    }  

 if ($_POST){

        try{
         $query = $db->prepare('UPDATE  usuarios SET nome = :nome, email =:email where idusuarios= :id');
        $query-> execute([
        ':nome'=>$_POST['nome'],
        ':email'=>$_POST['email'],
        ':id'=>$id
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
    <title></title>
</head>
<body>

<form action= "edit.php" method= "post">
<input type= 'hidden' name='id' value=" <?php echo $usuario ['idusuarios']?>">
Nome:
<input type="text" name="nome" value= "<?php echo $usuario['nome'];?>"><br>
Email:
<input type="text" name="email" value= "<?php echo $usuario['email'];?>">
<input type="submit"  value= "Enviar">



</form>

    
</body>
</html>