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
    <div class="card" style="width:50%;">
        <div class="card-header d-flex justify-content-center">
            ADD MENU🍳
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
            <form action="../server/restaurant/add_menu.php" method="post" class="d-flex flex-column gap-2" enctype="multipart/form-data">
                image
                <input type="file" name="image_file"  class="form-control">
                name
                <input type="text" name="name" class="form-control">
                category
                <select name="cate"  class="form-select">
                    <?php
                        require('../server/conn.php');
                        $sql = "SELECT * FROM food_category";
                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach($result as $row){
                        echo '<option value="'.$row['foodCate_id'].'">'.$row['foodCate_name'].'</option>';
                        }
                    ?>
                </select>
                price
                <input type="number" name="price"  class="form-control" >
                discount
                <input type="number" name="discount"  class="form-control">
                <button class="btn btn-success">+ add</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>