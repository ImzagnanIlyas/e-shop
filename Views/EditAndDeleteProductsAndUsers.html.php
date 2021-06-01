<?php
include '../Controllers/PermissionsController.php';
adminPermission();
include '../Controllers/includes/IncludeFileAtStart.inc.php';
include_once '../Models/DB.php';
if(!isset($_SESSION)) { session_start(); } 
if(isset($_SESSION['Filter'])){ $_SESSION['Filter'] = NULL;}
$conn = connectBase();
$stm1 = $conn->query(GetAllProduct());
$stm2 = $conn->query(GetAllClients());

?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete And Add</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    
    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/animated-headline.css">
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css1/main.css" rel="stylesheet" media="all">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body >

  <section>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w995">
        	 <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Delete Or Edit Products</h2>
                </div>
                
        	<table class="table table-striped table-dark">
  				<thead>
					<tr>
      					<th scope="col">Référence</th>
		  				<th scope="col">Prix</th>
      					<th scope="col">Désignation</th>
      					<th scope="col">Catégorie</th>
      					<th scope="col">Prixacquisition</th>
      					<th scope="col">Age</th>
						<th scope="col">Size</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Image Link</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
             
   					 </tr>
  				</thead>
  				
 				 <tbody >
					<?php
                        while($response1 = $stm1->fetch()){
                    echo '<tr>';
						echo '<td >'.$response1['Reference'].'</td>';
                        echo '<td >'.$response1['Prix'].'</td>';
                        echo '<td >'.$response1['Designation'].'</td>';
                        echo '<td >'.$response1['Categorie'].'</td>';
                        echo '<td >'.$response1['Prixacquisition'].'</td>';
                        echo '<td >'.$response1['Age'].'</td>';
                        echo '<td >'.$response1['Size'].'</td>';		
                        echo '<td >'.$response1['Brand'].'</td>';	
                        echo '<td >'.$response1['Image'].'</td>';	
                        echo '<td ><a href="/Controllers/ProductControler.php?EditP='.$response1['Reference'].'">Edit</a></td>';
                        echo '<td ><a href="/Controllers/ProductControler.php?DeleteP='.$response1['Reference'].'">Delete</a></td>';
                    echo '</tr>';
                        }
                        $conn = null;
                    ?>
  				</tbody>
		</table>          
      
        </div>
        </div>


        <div class="wrapper wrapper--w995">
        	 <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Delete Or Edit Users</h2>
                </div>
                
        	<table class="table table-striped table-dark">
  				<thead>
					<tr>
      					<th scope="col">ID</th>
		  				<th scope="col">Role</th>
      					<th scope="col">login</th>
      					<th scope="col">Password</th>
      					<th scope="col">Tele</th>
      					<th scope="col">Ville</th>
						<th scope="col">Adresse</th>
                        <th scope="col">Email</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
             
   					 </tr>
  				</thead>
  				
 				 <tbody >
					<?php
                        while($response2 = $stm2->fetch()){
                    echo '<tr>';
						echo '<td >'.$response2['ID'].'</td>';
                        echo '<td >'.$response2['Role'].'</td>';
                        echo '<td >'.$response2['login'].'</td>';
                        echo '<td >'.$response2['password'].'</td>';
                        echo '<td >'.$response2['Tel'].'</td>';
                        echo '<td >'.$response2['Ville'].'</td>';
                        echo '<td >'.$response2['Adresse'].'</td>';		
                        echo '<td >'.$response2['Email'].'</td>';	
                        echo '<td ><a href="/Controllers/ClientControler.php?EditC='.$response2['ID'].'">Edit</a></td>';
                        echo '<td ><a href="/Controllers/ClientControler.php?DeleteC='.$response2['ID'].'">Delete</a></td>';
                    echo '</tr>';
                        }
                        $conn = null;
                    ?>
  				</tbody>
		</table>          
      
        </div>
        </div>
    
    </div>
                    <span> <a href="Home.html.php"> Go Home </a> </span> <br>
                    <span> <a href="AddProduct.html.php"> Add Products </a> </span> <br>
                    <span> <a href="AddUser.html.php"> Add Users </a> </span> <br>
                    <span><a href="shop.html.php">Shop</a></span>
  </section>  








            <!-- Js Plugins -->
 <!--    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>