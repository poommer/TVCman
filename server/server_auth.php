<?php
require('conn.php');
session_start();
$action = $_GET['action'];
if($action === 'register'){
    $role = $_GET['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    if($role === 'restaurant'){
        $res_name = $_POST['res_name'];
        $res_type = $_POST['res_type'];
        $sql = "INSERT INTO `restaurant` (`res_name`,`res_type`,`username`,`password`,`email`,`address`,`tel`) VALUE ('$res_name','$res_type','$username','$password','$email','$address','$tel')";
    }else if( $role === 'rider'){
        $sql = "INSERT INTO `rider` (`username`,`password`,`email`,`address`,`tel`) VALUE ('$username','$password','$email','$address','$tel')";
        
    }else{
        $sql = "INSERT INTO `user` (`username`,`password`,`email`,`address`,`tel`, role) VALUE ('$username','$password','$email','$address','$tel', '$role')";
    }
    echo $sql;
    $query = mysqli_query($conn,$sql); 
    if($query){
        echo 'created!';
        $_SESSION['success'] = 'สร้างแล้ว';
        header('location:../auth/login.php ');
    }else{
        echo 'not created!';
        $_SESSION['success'] = 'สร้างไม่ได้';
        header('location:../auth/register.php');
    }

}
else if($action === 'login'){
    $role = $_GET['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($role === 'restaurant'){
        $sql = "SELECT * FROM `restaurant` WHERE email= '$email' AND password = '$password' ";
    }else{
        $roletable = $role === 'rider' ? 'rider' : 'user';
        $sql = "SELECT * FROM `$roletable` WHERE email= '$email' AND password = '$password' ";
    }
    echo $sql;
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)===1){
        $result =mysqli_fetch_array($query);
        $_SESSION['id'] = $result['id'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['username'] = $result['username'];
        header('location: ../'.$role);
    }else{
        header('location: ../auth/login.php?role='.$role);
    }


}
else if($action === 'logout'){
    session_destroy();
    header('location: ../auth/login.php');
}
else if($action === 'edit'){
    $role = $_GET['role'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    if($role === 'restaurant'){

    }
}
else{
    echo 'ไม่มีโว้ยย' ;
}
?>