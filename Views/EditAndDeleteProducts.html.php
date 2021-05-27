<?php
include_once '../Models/DB.php';
include('../Models/Operations.php');
$conn = connectBase();
$stm1 = $conn->query(GetAllProduct());


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
                        <th scope="col"> </th>
                        <th scope="col"> </th>
             
   					 </tr>
  				</thead>
  				
 				 <tbody >
					<?php
                        while($response = $stm1->fetch()){
                    echo '<tr>';
						echo '<td >'.$response['Reference'].'</td>';
                        echo '<td >'.$response['Prix'].'</td>';
                        echo '<td >'.$response['Designation'].'</td>';
                        echo '<td >'.$response['Categorie'].'</td>';
                        echo '<td >'.$response['Prixacquisition'].'</td>';
                        echo '<td >'.$response['Age'].'</td>';
                        echo '<td >'.$response['Size'].'</td>';		
                        echo '<td ><a href="/Controllers/ProductControler.php?EditP='.$response['Reference'].'">Edit</a></td>';
                        echo '<td ><a href="/Controllers/ProductControler.php?DeleteP='.$response['Reference'].'">Delete</a></td>';
                    echo '</tr>';
                        }
                        $conn = null;
                    ?>
                    <span> <a href="Home.html.php"> Go Home </a> </span> <br>
                    <span> <a href="AddProduct.html.php"> Add Product </a> </span>
  				</tbody>



		</table>       
      
        </div>
        </div>
		</table>       
      
        </div>
        </div>
    </div>  
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