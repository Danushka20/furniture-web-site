<?php
    include("includes/database.php");
    include("includes/functions.php"); 
?>

<?php
if(isset($_GET['pro_id'])){
    $product_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id = '$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_category_id = $row_product['p_category_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_description'];
    $pro_image1 = $row_product['product_image1'];
    $pro_image2 = $row_product['product_image2'];
    $pro_image3 = $row_product['product_image3'];

    $get_p_categories = "select * from product_categories where p_category_id = '$p_category_id'";
    $run_p_categories = mysqli_query($con, $get_p_categories);
    $row_p_categories = mysqli_fetch_array($run_p_categories);
    $p_category_title = $row_p_categories['p_category_title'];


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>User Dashboard</title>
</head>
<body>
    <div id="top">
        <div class="holder row-flex">
            <a href="index.php" class="logo-container">The Furnitures</a>
            <ul class="menu">
                <li class="<?php if($active == 'Home') echo "active"; ?>">
                    <a href="index.php">Home</a>
                </li>
                <li  class="<?php if($active == 'Shop') echo "active"; ?>">
                    <a href="shop.php">Shop</a>
                </li>
                
                <!-- <li>
                    <a href="login.php">Login
                    </a>
                </li> -->
                <li>
                <?php
                session_start();
                if (isset($_SESSION["user"])) {

                    echo "<a href='logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php'>Login</a>";
                }
                
                ?>
                 </li>
                <li  class="<?php if($active == 'Cart') echo "active"; ?>">
                    <a href="cart.php">Cart</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- <div class = 'col-md-4 col-sm-6 center-responsive'>
        <div class = 'product'>
            <a href = 'details.php?pro_id=$pro_id'> 
                <img class='img-responsive'src = 'product_images/$pro_image1'>
            </a>

            <div class='text'>
                <h3>
                    <a href = 'details.php?pro_id=$pro_id'> 
                        $pro_title
                    </a>
                </h3>
                <p class='price'>
                    $$pro_price
                </p>
                <p class ='button'> 
                    <a class='btn btn-default' href = 'details.php?pro_id=$pro_id'> 
                        View Details
                    </a>
                    <a class='btn btn-primary' href = 'details.php?pro_id=$pro_id'> 
                        <i class='fa fa-shopping-cart'> </i> Add To Cart
                    </a>
                </p>
            </div>
                                                    
        </div>
    </div> -->