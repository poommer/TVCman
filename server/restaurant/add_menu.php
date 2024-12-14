<?php
require('../conn.php');
session_start();

$id = $_SESSION['id'];

$file = $_FILES['image_file'];
$temp = $file['tmp_name'];

$name = $_POST['name'];
$cate = $_POST['cate'];
$price = $_POST['price'];
$discount = $_POST['discount'];


$sql = "INSERT INTO `menu`(`menu_cateID`, `menu_name`, `menu_price`, `menu_discount`) VALUES ('$cate','$name','$price','$discount')";
echo $sql ;
$query = mysqli_query($conn, $sql);
if($query){
    $menu_id = mysqli_insert_id($conn);
    if(is_dir('../asset/image/food/'.$_SESSION['id'])){
        mkdir('../asset/image/food/'.$_SESSION['id']);
    }
    
    $path = '../../asset/image/food/'.$_SESSION['id'].'/'.$menu_id.'.jpg';
    if(move_uploaded_file($temp, $path)){
                $_SESSION['success'] = 'created!';
                echo 'uploaded!' ;
            }else{
                $_SESSION['fail'] = 'not created, try again.';
                echo 'not uploaded!' ;
            }
}else{
    $_SESSION['fail'] = 'not created, try again.';
}
header('location: ../../restaurant/menu.php');
?>