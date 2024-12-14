<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create food category</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <script src="../asset/js/bootstrap.js"></script>
</head>
<body>
    <nav>
        <?php require('../components/nav.php') ?>
    </nav>
    <main class="container">
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
            <form action="../server/restaurant/create_category.php" method="post" class="d-flex gap-2">
                <input type="text" name="cate_name" class="form-control">
                <button class="btn btn-success">+</button>
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    category All
                </div>

                <div class="card-body">
                    <?php
                    require('../server/conn.php');
                    $sql = "SELECT * FROM food_category";
                    $query = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    foreach($result as $row){
                        echo "<p>".$row['foodCate_name']."</p>";
                    }
                    ?>
                </div>
            </div>

    </main>
</body>
</html>