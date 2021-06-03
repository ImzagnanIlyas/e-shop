<?php
    if(!isset($_SESSION)) { session_start(); }
    include '../Controllers/includes/IncludeFileAtStart.inc.php';
    include_once '../Models/DB.php';
    $conn = connectBase();
    if(isset($_SESSION['Filter'])) echo $_SESSION['Filter'];

    $stm2 = $conn->query(GetCategories());
    $stm3 = $conn->query(GetSizes());
    $stm4 = $conn->query(GetBrands());

    //Pagination
    $results_per_page = 9;  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    } 
    $page_first_result = ($page - 1) * $results_per_page; 
    if(!isset($_SESSION['Filter'])) {
        $stm5 = $conn->query('SELECT COUNT(*) FROM `produit`');
        $number_of_result = $stm5->fetch();
        $number_of_page = ceil ($number_of_result[0] / $results_per_page); 
        $query = "SELECT * FROM produit LIMIT " . $page_first_result . ',' . $results_per_page; 
        $stm1 = $conn->query($query);
    }
    if(isset($_SESSION['Filter'])) {
        $stm5 = $conn->query($_SESSION['Count']);
        $number_of_result = $stm5->fetch();
        $number_of_page = ceil ($number_of_result[0] / $results_per_page); 
        $query = "".$_SESSION['Filter']." LIMIT " . $page_first_result . ',' . $results_per_page; 
        $stm1 = $conn->query($query);
    }
?>

<!DOCTYPE html>

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
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css" type="text/css">
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
                            <li class="active"><a href="./shop.html">Shop</a></li>
                            <li><a href="./shopping-cart.html.php">Shopping Cart</a></li>
                            
                        </ul>
                    </nav>
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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="Home.html.php">Home</a>
                            <span>Shop</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                    <form method="GET" action="/Controllers/ShopControler.php">
                        <div class="shop__sidebar__search">      
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button><br><br>
                        </div>
                    </form>   
                    <form method="GET" action="/Controllers/ShopControler.php">    
                                <input type="hidden" name="reset_filter">
                                <button type="submit" name="reset_filter"><span> Afficher tous les produit </span></button>
                                <br><br>
                    </form> 

                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                <?php
                                                    while($response2 = $stm2->fetch()){
                                                ?>
                                                    <li><a href="/Controllers/ShopControler.php?Categorie=<?php echo $response2['Categorie'] ?>
                                                    "><?php echo $response2['Categorie'] ?></a></li>
                                                <?php
                                                    }
                                                ?>    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                <?php
                                                    while($response4 = $stm4->fetch()){
                                                ?>
                                                    <li><a href="/Controllers/ShopControler.php?Brand=<?php echo $response4['Brand'] ?>
                                                    "><?php echo $response4['Brand'] ?></a></li>
                                                <?php
                                                    }
                                                ?>             
                                                

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= BETWEEN 0 AND 50">0.00 DH - 50.00 DH</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= BETWEEN 50 AND 100">50.00 DH - 100.00 DH</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= BETWEEN 100 AND 150">100.00 DH - 150.00 DH</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= BETWEEN 150 AND 200">150.00 DH - 200.00 DH</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= BETWEEN 200 AND 250">200.00 DH - 250.00 DH</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Prix= >= 250"BETWEEN >250.00+</a></li>
                        
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Age</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="/Controllers/ShopControler.php?Age= BETWEEN 0 AND 5">0 - 5</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Age= BETWEEN 5 AND 10">5 - 10</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Age= BETWEEN 10 AND 15">10 - 15</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Age= BETWEEN 15 AND 20">15 - 20</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Age= BETWEEN 20 AND 30">20 - 30</a></li>
                                                    <li><a href="/Controllers/ShopControler.php?Age= >= 35"BETWEEN >35+</a></li>
                        
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                            <?php
                                                    while($response3 = $stm3->fetch()){
                                            ?>
                                               <ul>
                                               <li><a href="/Controllers/ShopControler.php?Size=<?php echo $response3['Size'] ?>
                                                    "><?php echo $response3['Size'] ?></a></li>
                                                </ul>
                                            <?php
                                                   }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    
                    
                    <div class="row">
                    <?php
                        while($response1 = $stm1->fetch()){
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $response1['Image'] ?>">

                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $response1['Designation'] ?></h6>
                                    <a href="/Controllers/CartController.php?add=<?php echo $response1['Reference'] ?>&quant=1"
                                    class="add-cart">+ Add To Cart</a>
                                    <h5><?php echo $response1['Prix'] ?> DH</h5>
                                    <h6>Brand : <?php echo $response1['Brand'] ?></h6>
                                    <h6>Size : <?php echo $response1['Size'] ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                     </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                            <?php
                            
                                for($page1 = 1; $page1<= $number_of_page; $page1++) {  
                                    if($page1 == $page) echo '<a class="active" href = "shop.html.php?page=' . $page1 . '">' . $page1 . ' </a>';  
                                    else  echo '<a href = "shop.html.php?page=' . $page1 . '">' . $page1 . ' </a>';  
                                }  
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->



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