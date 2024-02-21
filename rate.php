<?php
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/eventC.php";
$eventC = new EventC();

$listevent = $eventC->afficherEvent1($_GET["idEvent"]);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Yamifood Restaurant - Responsive HTML5 Template</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style media="screen">
		.rating {
			display: flex;
			flex-direction: row-reverse;
			justify-content: center;
		}


		.rating>input {
			display: none;
		}

		.rating>label {
			position: relative;
			width: 1.1em;
			font-size: 3vw;
			color: #FFD700;
			cursor: pointer;
		}

		.rating>label::before {
			content: "\2605";
			position: absolute;
			opacity: 0;
		}

		.rating>label:hover:before,
		.rating>label:hover~label:before {
			opacity: 1 !important;
		}

		.rating>input:checked~label:before {
			opacity: 1;
		}

		.rating:hover>input:checked~label:before {
			opacity: 0.4;
		}
	</style>
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a class="nav-link" href="../user/compte.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../Panier/menu.php">Menu</a></li>
						<li class="nav-item active"><a class="nav-link" href="ListeEvent.php">Reservation</a></li>
						<li class="nav-item"><a class="nav-link" href="../reclamation/ajouterReclamation.php">Reclamation</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Mon Compte</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../user/info.php">Mes informations</a>
								<a class="dropdown-item" href="../user/logout.php"><boutton id="logout">Logout</boutton></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Event</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Event</h2>
						<p>Liste d'evenements disponibles</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				foreach ($listevent as $event) {
				?>
					<div class="col-lg-4 col-md-6 col-12">
						<div class="blog-box-inner">
							<div class="blog-img-box">
								<img class="img-fluid" src="images/blog-img-01.jpg" alt="">
							</div>
							<div class="blog-detail">
								<h4>Nom d'evenement : <?php echo $event["nom"]; ?></h4>
								<ul>
									<li><span>Date d'evenement</span></li>
									<li>:</li>
									<li><span><?php echo $event["date"]; ?></span></li>
								</ul>
								<h4>Prix d'evenement : <?php echo $event["prix"]; ?> DT</h4>
                                <form action="AjoutRate.php?idEvent=<?php echo $event["id"]; ?>" method="POST">
								<div class="rating">
									<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
									<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
									<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
									<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
									<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
								</div>
                                <button type="submit" class="btn btn-lg btn-circle btn-outline-new-black">ajouter rate</button>
                                </form>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<!-- End blog -->

	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Yamifood Restaurant</a> Design By :
							<a href="https://html.design/">html design</a>
						</p>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End Footer -->

	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->

	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>