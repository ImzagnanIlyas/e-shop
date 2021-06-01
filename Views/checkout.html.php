<?php
    include '../Controllers/includes/IncludeFileAtStart.inc.php';
    $mustLogin = true;
    $ordre = true;
    $end = false;
    if(isset($_SESSION['login'])) $mustLogin = false;
    if(isset($_SESSION['Filter'])){ $_SESSION['Filter'] = NULL;}

    if(!isset($_SESSION)) { session_start(); } 
    $conn = connectBase();
    if ($_SESSION['cart']) {
        $items = '('.implode(",",array_keys($_SESSION['cart'])).')';
        $query = 'SELECT * FROM produit WHERE Reference IN '.$items;
    }else{
        $query = 'SELECT * FROM produit WHERE 0=1';
        $ordre = false;
        if (isset($_GET['end'])) {
            $end = true;
        }
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                            <li><a href="Home.html.php">Home</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad" style="padding-top: 50px;">
        <div class="container">
        <?php if($ordre){ ?>
            <div class="checkout__form">
                <form action="/Controllers/OrdreController.php" method="POST">
                    <div class="row justify-content-center">
                        <!-- <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div> -->
                        <div class="col-lg-7 col-md-6">
                            <?php if($mustLogin){ ?>
                                <a href="/Views/Login.html.php">
                                <h6 class="coupon__code">
                                    <span class="icon_tag_alt"></span> 
                                    Pour finaliser votre commande, vous devez vous connecter ou vous inscrire 
                                </h6>
                                </a>
                            <?php } ?>
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <?php
                                        $total = 0;
                                        while($row = $stm->fetch(PDO::FETCH_OBJ)){ 
                                    ?>
                                        <li>&#10095; <?php echo $row->Designation." (x".$_SESSION['cart'][$row->Reference].")" ?> <span><?php echo $row->Prix*$_SESSION['cart'][$row->Reference] ?> MAD</span></li>
                                    <?php 
                                        $total += $row->Prix*$_SESSION['cart'][$row->Reference];} 
                                    ?>  
                                    <!-- <li>01. Vanilla salted caramel <span>$ 300.0</span></li>
                                    <li>02. German chocolate <span>$ 170.0</span></li>
                                    <li>03. Sweet autumn <span>$ 170.0</span></li>
                                    <li>04. Cluten free mini dozen <span>$ 110.0</span></li> -->
                                </ul>
                                <ul class="checkout__total__all">
                                    <!-- <li>Subtotal <span>$750.99</span></li> -->
                                    <li>Total <span><?php echo $total; ?> MAD</span></li>
                                </ul>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <p>Choisissez votre méthode de paiement :</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked <?php if($mustLogin){ echo "disabled"; } ?> >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        À la livraison
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?php if($mustLogin){ echo "disabled"; } ?> >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Carte bancaire
                                    </label>
                                </div>
                                <button type="submit" name="ordre" class="site-btn" <?php if($mustLogin){ echo "disabled"; } ?> >PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php }else{ ?>
            <?php if($end){ ?>
                <div class="alert alert-success" role="alert">
                    <h1 class="alert-heading text-center"><i class="fas fa-check-circle"></i></h1>
                    <hr>
                    <h4 class="text-center" >Votre commande a été passée avec succès</h4>
                </div>
            <?php }else{ ?>
                <div class="alert alert-warning" role="alert">
                    Ajouter des produits à votre panier d'abord.
                </div>
            <?php } ?>
        <?php } ?>
        </div>
    </section>
    <!-- Checkout Section End -->

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