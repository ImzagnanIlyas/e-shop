<?php
session_start();
$_SESSION['lastLink'] = $_SERVER['HTTP_REFERER'];
?>

<?php
    include '../Controllers/includes/IncludeFileAtStart.inc.php';
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
    <title>Register Form</title>

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




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('select').selectpicker();
</script>
 
</head>

<body layout:fragment="content">
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/Controllers/LoginController.php">
 							<div class="form-row">
                                <div class="name">Login</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" id="login" name="login" value="<?php if(isset($_SESSION["wrongLogin"])) echo $_SESSION["wrongLogin"] ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Password</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="password" id="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group">
                                    <input type="checkbox" name="remember" id="remember" <?php if(isset($_SESSION["member_login"])) { ?> checked <?php } ?> />
                                    <label for="remember-me">Remember me</label>
                                </div>
                            </div>

                            
                            <?php
                            if(isset($_SESSION['error'])){
                            ?>
                            <div class="text-center p-t-115"> 
                            <div class="alert alert-danger">
    							<span >
  								<strong>Identifiant ou mot de passe incorrect</strong><br>
                                Assurez-vous que votre mot de passe et votre identifiant sont corrects.
    							</span> 
    						</div>
    					   </div>	
                           <?php
                           }
                           $_SESSION['error'] = null;                
                            ?>
							<br>
                            <div class="text-center p-t-115"> 
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="auth" value="auth">Login</button>
                            </div>
							<br>
                            <!-- <div class="text-center p-t-115">
								<span class="txt1">
								Don’t have an account?
								</span>

								<a class="txt2" th:href="@{/register}">
								Sign Up
								</a>
							</div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js1/global.js"></script>

</body>

</html>
<!-- end document-->