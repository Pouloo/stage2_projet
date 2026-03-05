<!DOCTYPE html>
<html>
	<head> 
		<title>Tableau de Bord: Admin </title>
		
	<!-- Metas -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="all,follow">

	<!-- Bootstrap CSS-->
		<link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">

	<!-- Font Awesome CSS-->
		<link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">

	<!-- Custom Font Icons CSS-->
		<link rel="stylesheet" href="admin/css/font.css">

	<!-- Google Fonts\Muli-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">

	<!-- Theme Stylesheet-->
		<link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">

	<!-- Custom Stylesheet - for your changes-->
		<link rel="stylesheet" href="admin/css/custom.css">

	<!-- Favicon-->
		<link rel="shortcut icon" href="admin/img/favicon.ico">
	</head>
	<body>
		<header class="header">   
			<nav class="navbar navbar-expand-lg">
				<div class="search-panel">
					<div class="search-inner d-flex align-items-center justify-content-center">
						<div class="close-btn">Close <i class="fa fa-close"></i></div>
						<form id="searchForm" action="#">
							<div class="form-group">
								<input type="search" name="search" placeholder="What are you searching for...">
								<button type="submit" class="submit">Search</button>
							</div>
						</form>
					</div>
				</div>
				<div class="container-fluid d-flex align-items-center justify-content-between">
				<div class="navbar-header">
				<!-- Navbar Header-->
					<!-- <a href="index.html" class="navbar-brand">
						<div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
						<div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
					</a> -->

				<!-- Sidebar Toggle Btn-->
					<button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
				</div>
				<div class="right-menu list-inline no-margin-bottom">    
					<div class="list-inline-item logout">
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
								{{ __('Déconnexion') }}
							</x-dropdown-link>
							<x-dropdown-link :href="route('index')">
								{{ __('Retour') }}
							</x-dropdown-link>
						</form>
					</div>
				</div>
			</nav>
		</header>
		<div class="d-flex align-items-stretch">
		<!-- Sidebar Navigation-->
			<nav id="sidebar">

			<!-- Sidebar Header-->
				<!-- <div class="sidebar-header d-flex align-items-center">
					<div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
					<div class="title">
						<h1 class="h5">Admin</h1>
						<p>Fullfort Productions</p>
					</div>
				</div> -->

			<!-- Sidebar Navidation Menus-->
			 	<!-- <span class="heading">Main</span> -->
				<ul class="list-unstyled">
					<li class="active"><a href="/dashboard"> <i class="icon-home"></i>Vue D'ensemble</a></li>
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Catégories</a>
						<ul id="exampledropdownDropdown" class="collapse list-unstyled ">
							<li><a href="{{route('admin.add.category')}}">Ajouter Catégorie</a></li>
							<li><a href="{{route('admin.show.category')}}">Afficher Catégories</a></li>
						</ul>
					</li>
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Produits</a>
						<ul id="exampledropdownDropdown" class="collapse list-unstyled ">
							<li><a href="{{route('admin.add.product')}}">Ajouter Produit</a></li>
							<li><a href="{{route('admin.show.product')}}">Afficher Produits</a></li>
							<li><a href="#">Afficher Commande</a></li>
						</ul>
					</li>
				</ul>
			</nav>

			<div class="page-content">
				<div class="page-header">
					<div class="container-fluid">
						<h2 class="h5 no-margin-bottom">Tableau de Bord: Administration</h2>
					</div>
				</div>
				<section class="no-padding-top no-padding-bottom">

					@yield('dashboard')

					@yield('add_category')

					@yield('show_category')

					@yield('update_category')

					@yield('add_product')

					@yield('show_product')

					@yield('update_product')

				</section>

				<footer class="footer">
					<div class="footer__block block no-margin-bottom">
						<div class="container-fluid text-center"></div>
					</div>
				</footer>
			</div>
		</div>

	<!-- JavaScript Files/Scripts-->
		<script src="admin/vendor/jquery/jquery.min.js"></script>
		<script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
		<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
		<script src="admin/vendor/chart.js/Chart.min.js"></script>
		<script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="admin/js/charts-home.js"></script>
		<script src="admin/js/front.js"></script>
	</body>
</html>