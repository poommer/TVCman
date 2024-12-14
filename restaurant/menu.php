<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <script src="../asset/js/bootstrap.js"></script>
</head>
<body>
<nav>
        <?php require('../components/nav.php') ?>
    </nav>
<main class="container-fluid d-flex justify-content-center">
    <div class="card" style="width:100%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            MENU 🍽
            <a href="add_menu.php" class="btn btn-success">+</a>
        </div>
        <div class="card-body">
        <?php
        if(isset($_SESSION['success'])){
            echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['fail'])){
            echo '<div class="alert alert-danger">'.$_SESSION['fail'].'</div>';
            unset($_SESSION['fail']);
        }
        ?>
            
            <table style="width:100%;">
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>action</th>
                </tr>

                <tr>
                <?php
                    require('../server/conn.php');
                    $id = $_SESSION['id'];
                    $i = 1;
                    $sql = "SELECT `menu`.*, `food_category`.* FROM `menu` LEFT JOIN `food_category` ON `menu`.`menu_cateID` = `food_category`.`foodCate_id` WHERE foodCate_resID = $id;";
                    $query = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    foreach($result as $row):
                        ?>
                        <tr>
                            <td><?php echo $i; $i +=1; ?></td>
                            <td><img src="../asset/image/food/<?php echo $id.'/'.$row['menu_id'] ?>.jpg" alt="" style="width:240px; height:148px;object-fit: cover; object-position: center;"></td>
                            <td><?php echo $row['menu_name']; ?></td>
                            <td><?php echo $row['foodCate_name']; ?></td>
                            <td>
                            <?php if($row['menu_discount'] > 0) {?>

                               <span class="h4" >  ฿<?php echo $row['menu_price'] - (($row['menu_discount']/100)*$row['menu_price']); ?></span>
                               <span class="text-danger small text-decoration-line-through"> ฿<?php echo $row['menu_price'] ; ?></span>
                               <span class="text-danger small" >[-<?php echo $row['menu_discount']; ?>%]</span>
                            <?php } else{?>
                                    <span class="h4">฿<?php echo $row['menu_price']; ?></span>
                            <?php }?>
                        </td>
                            <td>
                                <a class="btn btn-outline-danger" href="../server/restaurant/server_menu.php?action=del&id=<?php echo $row['menu_id'] ; ?>">🗑</a>
                                <a class="btn btn-outline-warning" href="#">✏</a>
                            </td>

                        </tr>
                        <?php endforeach ?>
                </tr>
            </table>
        </div>
    </div>
</main>
</body>
</html>