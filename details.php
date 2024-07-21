<?php
    include("includes/header.php");
?>

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        Shop
                    </li>

                    <li>
                        <a href="shop.php?p_categories=<?php echo $p_category_id; ?>"><?php echo $p_category_title; ?></a>
                    </li>

                    <li>
                        <?php echo $pro_title ?>
                    </li>
                </ul>
            </div>

            <div class="col-md-3">
                <?php
                    include("includes/sidebar.php");
                ?>
            </div>

            <div class="col-md-9">
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide">
                                <ol class="carousel-indicators">
                                    <li data-target = "#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target = "#myCarousel" data-slide-to="1"></li>
                                    <li data-target = "#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="product_images/<?php echo $pro_image1; ?>" alt=""></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="product_images/<?php echo $pro_image2; ?>" alt=""></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="product_images/<?php echo $pro_image3; ?>" alt=""></center>
                                    </div>
                                </div>

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $pro_title; ?></h1>

                            <?php
                                add_cart();
                            ?>

                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>

                                    <div class="col-md-7">
                                    <input name="product_qty" type="number" id="typeNumber" class="form-control" value="1"/>
                                    </div>
                                </div>
                                
                                <?php if($p_category_title === 'SALE'){ echo "<p class='price' style = 'text-decoration: line-through'>$$pro_price</p>";}else{echo "<p class='price'>$$pro_price</p>";}?></p>
                                <p class="price" style="color:red; margin-top: 0px;"><?php if($p_category_title === 'SALE'){echo '$' . discount($product_id);} ?></p>
                                <p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  

        </div>
    </div>
    <?php
            include("includes/footer.php");
        ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>