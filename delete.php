<?php
$dsn = 'mysql:host=localhost;dbname=crud;charset=utf8;port:3306';
$db_user = 'root';
$db_pass = '';
try{
    // Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
    $db = new PDO($dsn, $db_user, $db_pass);
    $id= isset ($_GET['id'])?$_GET['id']:false;
     if($id){
         $query =$db->prepare('DELETE FROM usuarios WHERE idusuarios = :id');
         $query-> bindVAlue(':id', $id, PDO::PARAM_INT);
         $query-> execute();
         header('Location:new.php'); 
     }

}catch( PDOException  $e) {
    echo $e->getMessage();
    die();
}  

?>