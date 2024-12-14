<?php
require('../conn.php');
session_start();


$action = $_GET['action'];
$id = $_GET['id'];

if($action === 'del'){
    $sql = "DELETE FROM `menu` WHERE `menu_id` = $id";
    $query = mysqli_query($conn, $sql);
if($query){
    $_SESSION['success'] = 'created!';
}else{
    $_SESSION['fail'] = 'not created, try again.';
}

header('location: ../../restaurant/menu.php');
}
?>