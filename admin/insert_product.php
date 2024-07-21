<?php

include("includes/database.php");


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
    <title>Insert Products</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard/Insert Products
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Product
                    </h3>
                </div>

                <div class="panel-body">
                    <form  method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Title</label>

                            <div class="col-md-6">
                                <input name="product_title" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Description</label>

                            <div class="col-md-6">
                                <input name="product_description" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Price</label>

                            <div class="col-md-6">
                                <input name="product_price" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Category</label>
                            <div class="col-md-6">
                                <select name="product_categories" class="form-control">
                                    <option> Select a Category Product</option>

                                    <?php
                                        $get_p_categories = "select * from product_categories";
                                        $run_p_categories = mysqli_query($con, $get_p_categories);

                                        while($row_p_categories = mysqli_fetch_array($run_p_categories)){
                                            $p_category_id = $row_p_categories['p_category_id'];
                                            $p_category_title = $row_p_categories['p_category_title'];

                                            echo "
                                            
                                            <option value= '$p_category_id'> $p_category_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Discount Percentage</label>

                            <div class="col-md-6">
                                <input name="product_discount" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Material</label>
                            <div class="col-md-6">
                                <select name="product_material" class="form-control">
                                    <option> Select a Material</option>

                                    <?php
                                        $get_p_material = "select * from product_material";
                                        $run_p_material = mysqli_query($con, $get_p_material);

                                        while($row_p_material = mysqli_fetch_array($run_p_material)){
                                            $p_material_id = $row_p_material['p_material_id'];
                                            $p_material_title = $row_p_material['p_material_title'];

                                            echo "
                                            
                                            <option value= '$p_material_id'> $p_material_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Image 1</label>

                            <div class="col-md-6">
                                <input name="product_image1" type="file" class="form-control" required>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Image 2</label>

                            <div class="col-md-6">
                                <input name="product_image2" type="file" class="form-control" required>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Image 3</label>

                            <div class="col-md-6">
                                <input name="product_image3" type="file" class="form-control" required>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">
                                <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_categories = $_POST['product_categories'];
    $product_discount = $_POST['product_discount'];    
    $product_material = $_POST['product_material'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    $temp_name2 = $_FILES['product_image2']['tmp_name'];
    $temp_name3 = $_FILES['product_image3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_image1");
    move_uploaded_file($temp_name2, "product_images/$product_image2");
    move_uploaded_file($temp_name3, "product_images/$product_image3");


    $insert_product = "insert into products (p_category_id, p_material_id, product_title, product_description, product_price, product_discount, product_image1, product_image2, product_image3) 
    values ('$product_categories', '$product_material', '$product_title', '$product_description', '$product_price', '$product_discount', '$product_image1', '$product_image2', '$product_image3')";

    $run_product = mysqli_query($con, $insert_product);

    if($run_product){
        echo "<script>alert('Product has been inserted successfully')</script>";
        echo "<script>window.open('insert_product.php', '_self') </script";
    }



}

?>