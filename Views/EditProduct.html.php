<?php
    session_start();
    include_once '../Models/DB.php';
?>
<!DOCTYPE html>
<html lang="en"
xmlns:th="http://www.thymleaf.org"
xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout"

>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Edit Products</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

	
	
	
    <!-- Main CSS-->
    <link href="../Assets/css1/main.css" rel="stylesheet" media="all">

    <!-- Drop down-->
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
 
</head>

<body > 
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50" >
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Edit Produit</h2>
                </div>
                <div class="card-body">
                    <form method="POST"  action="/Controllers/ProductControler.php">
                        <div class="form-row">
                            <div class="name">Référence</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="hidden" name="ref" value="<?php
                                    echo $_GET['Ref'];
                                    ?>" required> 
                                    <label for="refs"><?php echo $_GET['Ref'];?></label><br>
                   					<span class="error" ></span>
                                </div>
                            </div>
                        </div>
                            
                         <div class="form-row">
                            <div class="name">Prix </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="prix" value="<?php
                                    echo $_GET['Prix'];
                                    ?>" required>
                                    <span class="error" ></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Désignation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="designation" value="<?php
                                    echo $_GET['Des'];
                                    ?>" required>
                                    <span class="error" ></span>
                                </div>
                            </div>
						</div>

						 <div class="form-row">
                         <div class="name"> Catégorie </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="categorie" value="<?php
                                    echo $_GET['Cat'];
                                    ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                           </div>


                        <div class="form-row">
                        <div class="name">Prixacquisition</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="prixacquisition" value="<?php
                                    echo $_GET['P'];
                                    ?>" required>
                                    <span class="error" ></span>
                                </div>
                            </div>
						</div>

                        <div class="form-row">
                            <div class="name">Age</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="age" value="<?php
                                    echo $_GET['Age'];
                                    ?>" required>
                                        <span class="error" ></span>
                                    </div>
                                </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Size</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="size" value="<?php
                                    echo $_GET['Size'];
                                    ?>
                                    " required>
                                        <span class="error" ></span>
                                    </div>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Brand</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="brand" value="<?php
                                    echo $_GET['B'];
                                    ?>" required>
                                        <span class="error" ></span>
                                    </div>
                                </div>
                        </div>
                            <?php
                                if(isset($_SESSION['error_product'])){
                                ?>
                                <span class="error">All Informations are requiredx</span>
                            <?php   
                                $_SESSION['error_product'] = null;   
                                }
                                ?>
                            <input class="input--style-5" type="hidden" name="EditP" value="EditP">
                            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button> <br>
                            <span> <a href="Home.html.php"> Go Home </a> </span> <br>
                            <span> <a href="EditAndDeleteProducts.html.php"> Manage Products </a> </span>
                        </div>
                    </form>
    </div>
    </div>
    </div>
    </div>

	<!--     Jquery JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
   <!--  Vendor JS -->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   <!--  Main JS -->
    <script src="js1/global.js"></script> 

</body>

</html>
<!-- end document-->