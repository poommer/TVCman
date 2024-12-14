<?php
session_start();
$action = $_GET['action'];
$file = $_FILES['image_file'];
$temp = $file['tmp_name'];

if($action === 'food'){
if(is_dir('../asset/image/food/'.$_SESSION['id'])){
    mkdir('../asset/image/food/'.$_SESSION['id']);
}

$path = '../asset/image/food/'.$_SESSION['id'].'/'.$id.'.jpg';
if(move_uploaded_file($temp, $path)){
            echo 'uploaded!' ;
        }else{
            echo 'not uploaded!' ;
        }
}



else if($action === 'profile'){
    if(is_dir('../asset/image/profile/'.$_SESSION['role'].'/'.$_SESSION['id'].'.jpg')){
       unlink('../asset/image/profile/'.$_SESSION['role'].'/'.$_SESSION['id'].'.jpg');
    }
$path = '../asset/image/profile/'.$_SESSION['role'].'/'.$_SESSION['id'].'.jpg';
if(move_uploaded_file($temp, $path)){
            echo 'uploaded!' ;
        }else{
            echo 'not uploaded!' ;
        }
}
?>