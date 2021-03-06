<?php
    include '../Controllers/includes/IncludeFileAtStart.inc.php';
    if(!isset($_SESSION)) { session_start(); } 
    if(isset($_SESSION['Filter'])){ $_SESSION['Filter'] = NULL;}
    $conn = connectBase();
    if ($_SESSION['cart']) {
        $items = '('.implode(",",array_keys($_SESSION['cart'])).')';
        $query = 'SELECT * FROM produit WHERE Reference IN '.$items;
    }else{
        $query = 'SELECT * FROM produit WHERE 0=1';
    }
    $stm = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

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

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="../Assets/img/icon/search.png" alt=""></a>
            <a href="#"><img src="../Assets/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="../Assets/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-5">
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
                            <li><a href="Home.html.php">Home</a></li>
                            <li><a href="shop.html.php">Shop</a></li>
                            <li class="active"><a href="./shopping-cart.html.php">Shopping Cart</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <form>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if (empty($_SESSION['cart'])){ ?>
                                    <tr>
                                        <div class="alert alert-warning" role="alert">
                                            Ajouter des produits ?? votre panier d'abord.
                                        </div>
                                    </tr>
                                <?php } ?>
                                <?php
                                $total = 0;
                                while($row = $stm->fetch(PDO::FETCH_OBJ)){ ?>
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="<?php echo $row->Image ?>" style="width: 90px;" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $row->Designation ?></h6>
                                                <h5><?php echo $row->Prix ?> MAD</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" name="<?php echo $row->Reference; ?>" value="<?php echo $_SESSION['cart'][$row->Reference]; ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price"><?php echo $row->Prix*$_SESSION['cart'][$row->Reference] ?> MAD</td>
                                        <td class="cart__close"><a href="/Controllers/CartController.php?delete=<?php echo $row->Reference ?>"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                <?php 
                                $total += $row->Prix*$_SESSION['cart'][$row->Reference];} 
                                ?>   
                                <!-- <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="../Assets/img/shopping-cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>T-shirt Contrast Pocket</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 30.00</td>
                                    <td class="cart__close"><i class="fa fa-close"></i></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.html.php">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div> -->
                    </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <!-- <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div> -->
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <!-- <li>Subtotal <span>$ 169.50</span></li> -->
                            <li>Total <span><?php echo $total; ?> MAD</span></li>
                        </ul>
                        <a href="/Views/checkout.html.php" class="primary-btn" <?php if (empty($_SESSION['cart'])) echo "hidden"; ?> >Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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