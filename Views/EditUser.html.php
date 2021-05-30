<?php
    session_start();
    include_once '../Models/DB.php';
    if(isset($_SESSION['Filter'])) $_SESSION['Filter'] = NULL;
?>
<!DOCTYPE html>
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
                    <h2 class="title">Edit User</h2>
                </div>
                <div class="card-body">
                <form method="POST"  action="/Controllers/ClientControler.php">
                        <div class="form-row">
                            <div class="name">ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="hidden" name="id" value="<?php
                                    if(isset($_GET['I']))
                                    echo $_GET['I'];
                                    ?>" required> 
                                    <label for="id"><?php  if(isset($_GET['I'])) echo $_GET['I'];?></label><br>
                   					<span class="error" ></span>
                                </div>
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="name">Login :</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="login" value="<?php
                                     if(isset($_GET['log']))
                                    echo $_GET['log'];
                                    ?>" required>
                                    <span class="error" ></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                         <div class="name"> Password :</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password" value="<?php
                                    if(isset($_GET['pas']))
                                    echo $_GET['pas'];
                                    ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                           </div>

						 <div class="form-row">
                         <div class="name"> Password Confirmation :</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password2" value="<?php
                                    if(isset($_GET['pas']))
                                    echo $_GET['pas'];
                                    ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                           </div>

                        <div class="form-row">
                            <div class="name">Role :</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="role" required>
                                            <option selected="selected" ><?php
                                            if(isset($_GET['R']))
                                            echo $_GET['R'];
                                            ?></option>
                                            <option>admin</option>
                                            <option>user </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="form-row">
                        <div class="name">Tele : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="tele" value="<?php
                                    if(isset($_GET['Tel']))
                                    echo $_GET['Tel'];
                                    ?>" required>
                                    <span class="error" ></span>
                                </div>
                            </div>
						</div>
                        <div class="form-row">
                            <div class="name">Adresse :</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="adresse" value="<?php
                                        if(isset($_GET['Ad']))
                                    echo $_GET['Ad'];
                                    ?>" required>
                                        <span class="error" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="name">Ville :</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="ville" value="<?php
                                        if(isset($_GET['Vi']))
                                    echo $_GET['Vi'];
                                    ?>" required>
                                        <span class="error" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Email : </div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="email" name="email" value="<?php
                                            if(isset($_GET['Em']))
                                            echo $_GET['Em'];
                                    ?>" required>
                                            <span class="error" ></span>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                if(isset($_SESSION['error_user'])){
                                ?>
                                <span class="error">Passwords do not match</span> <br>
                            <?php   
                                $_SESSION['error_user'] = null;   
                                }
                                ?>

                            <input class="input--style-5" type="hidden" name="EditC" value="EditC">
                            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button> <br>
                            <span> <a href="Home.html.php"> Go Home </a> </span> <br>
                            <span> <a href="EditAndDeleteProductsAndUsers.html.php"> Manage Products And Users</a> </span>
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

