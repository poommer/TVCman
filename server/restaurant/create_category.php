<?php
require('../conn.php');
session_start();

$id = $_SESSION['id'];
$name = $_POST['cate_name'];

echo $_SESSION['id'] ;
print_r($_SESSION);

$sql = "INSERT INTO `food_category`(`foodCate_resID`, `foodCate_name`) VALUES ('$id','$name')";
echo $sql ;
$query = mysqli_query($conn, $sql);
if($query){
    $_SESSION['success'] = 'created!';
}else{
    $_SESSION['fail'] = 'not created, try again.';
}
header('location: ../../restaurant/create_category.php');
?>