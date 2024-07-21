<?php

$db = mysqli_connect("localhost", "root", "", "db");

function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_X_CLIENT_IP'])) : return $_SERVER['HTTP_X_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];


    }
}

function add_cart(){
    global $db;
    if(isset($_GET['add_cart'])){
        $ip_add = getRealIpUser();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
        $run_check = mysqli_query($db, $check_product);

        if(mysqli_num_rows($run_check)){
            echo "<script>alert('This product is already added in cart') </script>";
            echo "<script>window.open('details.php?pro_id=$p_id', '_self') </script>";

        }else{
            $query = "insert into cart (p_id, ip_add, qty) values ('$p_id', '$ip_add', '$product_qty')";
            $run_query = mysqli_query($db, $query);
            echo "<script>window.open('details.php?pro_id=$p_id', '_self') </script>";
        }
    }
}

function discount($product_id){
    global $db;
    $get_products = "SELECT *
    FROM products
    JOIN product_categories ON products.p_category_id = product_categories.p_category_id
    WHERE products.product_id = $product_id";
    $run_products = mysqli_query($db, $get_products);
    $row_products=mysqli_fetch_array($run_products);
   
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $p_category_id = $row_products['p_category_id'];
        $product_discount = $row_products['product_discount'];
        $p_category_title = $row_products['p_category_title'];
        $pro_image1 = $row_products['product_image1'];
    $pro_discounted_price = $pro_price - ($pro_price * ($product_discount / 100));
       
    return
    $pro_discounted_price;
    
}

function getSalePro() {
    global $db;

    $get_products = "SELECT *
    FROM products
    JOIN product_categories ON products.p_category_id = product_categories.p_category_id
    WHERE product_categories.p_category_title = 'SALE' order by 1 DESC LIMIT 0,6";
    // $get_products = "select * from products where p_category_id = '7'";


    $run_products = mysqli_query($db, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $p_category_id = $row_products['p_category_id'];
        $product_discount = $row_products['product_discount'];
        $p_category_title = $row_products['p_category_title'];
        $pro_image1 = $row_products['product_image1'];


      
        $pro_discounted_price = $pro_price - ($pro_price * ($product_discount / 100));

        echo "
        
        <div class='col-md-4 col-sm-6 single'>
            <div class='product'> 
            
                <a href='details.php?pro_id=$pro_id'>
                    <img class='img-responsive' src='product_images/$pro_image1'>
                </a>

                <div class='text'>
                    <h3> 
                        <a href='details.php?pro_id=$pro_id'>
                            $pro_title
                        </a>
                    </h3>

                    <p class='price' style = 'text-decoration: line-through'>
                        $$pro_price
                    </p>
                    <p class='price text-center' style='color: red;' > 
                        $$pro_discounted_price
                    </p>

                    <p class='button'>
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                            View Details
                        </a>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart 
                        </a>                 
                    </p>
                 </div>
            </div>
        </div>

        ";
    }

}


function getPro() {
    global $db;

    $get_products = "select * from products where p_category_id!='7' order by 1 DESC LIMIT 0,6";

    $run_products = mysqli_query($db, $get_products);

    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $p_category_id = $row_products['p_category_id'];
        $pro_price = $row_products['product_price'];
        $pro_image1 = $row_products['product_image1'];

        // if(!($p_category_id == '7')){       
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
            <div class='product'> 
                <a href='details.php?pro_id=$pro_id'>
                    <img class='img-responsive' src='product_images/$pro_image1'>
                </a>

                <div class='text'>
                    <h3> 
                        <a href='details.php?pro_id=$pro_id'>
                            $pro_title
                        </a>
                    </h3>

                    <p class='price'>
                        $$pro_price
                    </p>

                    <p class='button'>
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                            View Details
                        </a>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart 
                        </a>
                    </p>
                 </div>
            </div>
        </div>

        ";

        // }
    }

}

function getPCategories(){

    global $db;

    $get_p_categories = "select * from product_categories";

    $run_p_categories = mysqli_query($db, $get_p_categories);
    
    while($row_p_categories=mysqli_fetch_array($run_p_categories)){
        $p_category_id = $row_p_categories['p_category_id'];
        $p_category_title = $row_p_categories['p_category_title'];

        if($p_category_title == 'SALE'){
            echo "
                <li>
                    <a style='color:red;' class= 'text-center' href='shop.php?p_categories=$p_category_id'> $p_category_title </a>
                </li>
            ";
        }else
            echo "
            <li>
                <a class= 'text-center' href='shop.php?p_categories=$p_category_id'> $p_category_title </a>
            </li>
        ";}
}


function getMaterial(){

    global $db;

    $get_p_material = "select * from product_material";

    $run_p_material = mysqli_query($db, $get_p_material);
    
    while($row_p_material=mysqli_fetch_array($run_p_material)){
        $p_material_id = $row_p_material['p_material_id'];
        $p_material_title = $row_p_material['p_material_title'];

        echo "
            <li>

                <a class= 'text-center' href='shop.php?p_material=$p_material_id'> $p_material_title </a>
            </li>
        ";

    }

}

    function getpcatpro(){
        global $db;
        if(isset($_GET['p_categories'])){
            $p_category_id = $_GET['p_categories'];
            $get_p_categories = "select * from product_categories where p_category_id='$p_category_id'";
            $run_p_categories = mysqli_query($db, $get_p_categories);
            $row_p_categories = mysqli_fetch_array($run_p_categories);
            $p_category_title = $row_p_categories['p_category_title'];
            $p_category_desc = $row_p_categories['p_category_desc'];
            $get_products = "select * from products where p_category_id = '$p_category_id'";
            $run_products = mysqli_query($db, $get_products);

            $count = mysqli_num_rows($run_products);

            if($count==0){
                echo "
                    <div class='box'>
                        <h1> No Product Found In This Product Category</h1>

                    </div>
                ";
            }else{
                echo"
                    <div class='box'>
                        <h1> $p_category_title </h1>
                        <p> $p_category_desc </p>
                    </div>
                ";

            }
            while($row_products=mysqli_fetch_array($run_products)){
                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_image1 = $row_products['product_image1'];

                

                if($p_category_title == 'SALE'){
                    $pro_discounted_price = discount($pro_id);
                echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'> 
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='product_images/$pro_image1'>
                        </a>
        
                        <div class='text'>
                            <h3> 
                                <a href='details.php?pro_id=$pro_id'>
                                    $pro_title
                                </a>
                            </h3>
                        
                            <p class='price text-center' style='text-decoration: line-through;'>
                                $$pro_price
                            </p>
                            <p class='price text-center' style='color: red;' > 
                                $$pro_discounted_price
                            <p>
        
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to Cart 
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
        
                ";
                }else{
                    echo "
                    <div class='col-md-4 col-sm-6 center-responsive'>
                        <div class='product'> 
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='img-responsive' src='product_images/$pro_image1'>
                            </a>
            
                            <div class='text'>
                                <h3> 
                                    <a href='details.php?pro_id=$pro_id'>
                                        $pro_title
                                    </a>
                                </h3>
            
                                <p class='price''>
                                    $$pro_price
                                </p>
            
                                <p class='button'>
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                        View Details
                                    </a>
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                        <i class='fa fa-shopping-cart'></i> Add to Cart 
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
            
                    ";
                }

            }

        }

    } 

function getmatpro(){
    global $db;
    if(isset($_GET['p_material'])){
        $p_material_id = $_GET['p_material'];
        $get_p_material= "select * from product_material where p_material_id='$p_material_id' LIMIT 0,6";
        $run_p_material = mysqli_query($db, $get_p_material);
        $row_p_material = mysqli_fetch_array($run_p_material);
        $p_material_title = $row_p_material['p_material_title'];
        $p_material_desc = $row_p_material['p_material_desc'];
        $get_material = "select * from products where p_material_id = '$p_material_id'";
        $run_products = mysqli_query($db, $get_material);

        $count = mysqli_num_rows($run_products);
        if($count == 0){

            echo "
                <div class='box'>
                    <h1> No Product Found With This Material </h1>
                </div>
            ";
        }else{
            echo "
                <div class='box'>
                    <h1> $p_material_title </h1>
                    <p> $p_material_desc </p>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_image1 = $row_products['product_image1'];

            echo "
            <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'> 
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='product_images/$pro_image1'>
                    </a>
    
                    <div class='text'>
                        <h3> 
                            <a href='details.php?pro_id=$pro_id'>
                                $pro_title
                            </a>
                        </h3>
    
                        <p class='price'>
                            $pro_price
                        </p>
    
                        <p class='button'>
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                View Details
                            </a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                <i class='fa fa-shopping-cart'></i> Add to Cart 
                            </a>
                        </p>
                     </div>
                </div>
            </div>
    
            "; 
        }
    }

}

?>