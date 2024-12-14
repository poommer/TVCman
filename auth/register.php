<?php
require('../server/conn.php');
$role =$_GET['role'];
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
                Register
            </div>
            <div class="card-body">
                <form action="../server/server_auth.php?action=register&role=<?php echo $role?>" method="post">
                    <?php
                    if($role =='restaurant'){
                      ?>
                      ชื่อร้าน
                      <input class="form-control" type="text" name="res_name">
                        หมวดหมู่
                        <select class="form-select" name="res_type" >
                            <?php
                            $sql = "SELECT * FROM `res_type`";
                            $query = mysqli_query($conn,$sql);
                            $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
                            foreach($result as $row) :
                            ?>
                            <option value="<?php echo $row['resType_id'] ?>"><?php echo $row['resType_name'] ?></option>
                            <?php endforeach?>
                        </select>
                    <?php
                    }
                    ?>

                    Username
                    <input class="form-control" type="text" name="username">
                    Email
                    <input class="form-control" type="text" name="email">
                    Password
                    <input class="form-control" type="password" name="password">
                    Address
                    <input class="form-control" type="text" name="address">
                    Tel
                    <input class="form-control" type="text" name="tel">
                    <button class="btn btn-primary mt-2">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>