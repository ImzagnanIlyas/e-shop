<?php
 if(!isset($_SESSION)) { session_start(); }
 if(isset($_SESSION['Filter'])){ $_SESSION['Filter'] = NULL;}
?> 
<?php
    include '../Controllers/includes/IncludeFileAtStart.inc.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cinephile's fashion store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../Assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php
                                if(!isset($_SESSION['role'])){
                                ?>
                                <a href="/Views/Login.html.php">Sign in</a>
                                <?php
                                }
                                ?>   
                            </div>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php
                                if(isset($_SESSION['role'])){
                                ?>
                                <a href="/Controllers/LogOut.php">Sign Out</a>
                                <?php
                                if($_SESSION['role'] == "admin"){
                                ?>
                                <a href="AddUser.html.php">Add User</a>
                                <a href="AddProduct.html.php">Add Products</a>
                                <a href="EditAndDeleteProductsAndUsers.html.php">Manage Products And Users</a>

                                <?php
                                }
                                }
                                ?>   
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="Home.html.php"><img src="../Assets/img/hero/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="Home.html.php">Home</a></li>
                            <li><a href="shop.html.php">Shop</a></li>
                            <li><a href="./shopping-cart.html.php">Shopping Cart</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <form method="GET" action="/Controllers/ShopControler.php">
                        <div class="shop__sidebar__search">      
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button><br><br>
                        </div>
                    </form> 
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="../Assets/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h2>E-Commerce Web Site</h2>
                                <a href="shop.html.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="../Assets/js/jquery-3.3.1.min.js"></script>
    <script src="../Assets/js/bootstrap.min.js"></script>
    <script src="../Assets/js/jquery.nice-select.min.js"></script>
    <script src="../Assets/js/jquery.nicescroll.min.js"></script>
    <script src="../Assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../Assets/js/jquery.countdown.min.js"></script>
    <script src="../Assets/js/jquery.slicknav.js"></script>
    <script src="../Assets/js/mixitup.min.js"></script>
    <script src="../Assets/js/owl.carousel.min.js"></script>
    <script src="../Assets/js/main.js"></script>
</body>

</html>