<?php
require('../server/conn.php');
$role = $_GET['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-item-center">
        <div class="card mt-2" style="width:500px;">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form action="../server/server_auth.php?action=login&role=<?php echo $role?>" method="post">
                    Email
                    <input class="form-control" type="text" name="email">
                    Password
                    <input class="form-control" type="password" name="password" >
                    <button class="btn btn-success mt-2">Login</button>
                </form>
                <?php
                if($role !=='admin'){
                ?>
                <span>ยังไม่มีบัญชี ? <a href="../auth/register.php?action=regis&role=<?php echo $role?>">ลงทะเบียน</a></span>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>