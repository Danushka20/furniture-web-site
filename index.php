<!-- <?php
// session_start();
// if (!isset($_SESSION["user"])) {
//    header("Location: login.php");
// }
?> -->

<?php
    $active = 'Home';
    include("includes/header.php");
?>
    <main>
        <div class="bg-image d-flex justify-content-center align-items-flex-start banner"
            style=" background-image: url('images/home.webp'); background-size: cover; background-position:bottom; background-blend-mode: multiply; height: 80vh; padding: 8rem 0">
                <div class="holder flex-center">
                    <div class="banner-text">
                        <h1>Discover the best <span>furnitures</span> for you!</h1>
                        <a href="shop.php" id="banner-btn">View all products</a>
                    </div>
                </div>
        </div>



        <div id="advantages">
            <div class="holder">
                <div class="d-flex align-items-stretch">
                    <div class="col-sm-4">
                        <div class="box h-100">
                            <div class="icon">
                            <i class="fa-solid fa-heart"></i>
                            </div>
                            <h3>We Love Our Costumers</h3>
                            <p>We know to provide the best possible service ever</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box h-100">
                            <div class="icon">
                            <i class="fa-solid fa-tag"></i>
                            </div>
                            <h3>Best Prices</h3>
                            <p>Compare us with another store site, who have the best prices.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box h-100">
                            <div class="icon">
                            <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <h3>100% Original Products</h3>
                            <p>We just offer you the best and original products all over the world</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div id="sale">
            <div class="sale-box col-md-12">
                <div class="holder">
                    <h2>
                        Products On Sale
                    </h2>
                </div>
            </div>
        </div>

        <div id="content" class="holder">
            <div class="row">
            
                <?php
                    getSalePro();
                ?>
            </div>
        </div>



        <div id="latest">
            <div class="latest-box col-md-12">
                <div class="holder">
                    <h2>
                        Our Latest Products
                    </h2>
                </div>
            </div>
        </div>

        <div id="content" class="holder">
            <div class="row">
                <?php
                    getPro();
                ?>
            </div>
        </div>

        <br><br><br>

        <?php
            include("includes/footer.php");
        ?>
    </main>
</body>
</html>