<!DOCTYPE html>
<html>
    <head>
        <title>Fullfort Crousty</title>
        
    <!-- Basic Metas -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="frontend/images/favicon.png" type="image/x-icon">

    <!-- Slider Stylesheet -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />

    <!-- Custom styles for this template -->
        <link href="frontend/css/style.css" rel="stylesheet" />

    <!-- Responsive Style -->
        <link href="frontend/css/responsive.css" rel="stylesheet" />
    </head>

    <body>
    <!-- Header Section Strats -->
        <div class="hero_area" style="padding: 0; width: 95%; margin: auto;">
            <header class="header_section">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="">
                        <span>Fullfort Crousty</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: rgb(219, 69, 102);">
                        <div class="user_option">
                            @if (Auth::check())
                                <a href="{{route('dashboard')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Tableau de Bord</span>
                                </a>
                                <form method="POST" action="{{route('logout')}}" style="margin-bottom: 0;">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Déconnexion</span>
                                    </a>
                                </form>
                            @else
                                <a href="{{route('login')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Connexion</span>
                                </a>
                                <a href="{{route('register')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Inscription</span>
                                </a>
                            @endif
                            @if (Auth::check())
                                <a href="{{route('cart.products')}}">
                                    <i class="fa fa-shopping-bag" aria-hidden="true">&nbsp;{{$count}}</i>
                                </a>
                            @endif
                            <form class="form-inline" style="margin-bottom: 0;">
                                <button class="btn nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
        </div>

    <!-- Slider Section -->
    
        <section class="slider_section" style="width: 95%; margin: auto;">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box"> 
                                            <h1>Bienvenue</h1>
                                            <p>Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.</p>
                                            <a href="">Nous Contacter</a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="frontend/images/crousty.webp" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Shop Section -->

        <section class="shop_section layout_padding">

            @yield('index')

            @yield('product_details')

            @yield('products_all')

            @yield('cart_products')

        </section>

    <!-- Contact Section -->

        <section class="contact_section ">
            <div class="container px-0">
                <div class="heading_container ">
                    <h2 class="">Nous Contacter</h2>
                </div>
            </div>
            <div class="container container-bg">
                <div class="row">
                    <div class="col-lg-7 col-md-6 px-0">
                        <div class="map_container">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Alençon" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 px-0">
                        <form action="#">
                        <div>
                            <input type="text" placeholder="Nom" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Numero de Téléphone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex">
                            <button style="border-radius: 10px;">Envoyer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <br><br><br>

    <!-- Info Section -->

        <section class="info_section  layout_padding2-top">
            <div class="social_container">
                <div class="social_box">
                    <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="info_container ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <h6>À PROPOS DE NOUS</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,</p>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="info_form ">
                                <H6>NEWSLETTER</h6>
                                <form action="#">
                                    <input type="email" placeholder="Entrez Vote Email">
                                    <button>S'Abonner</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h6>BESOIN D'AIDE?</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,</p>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h6>NOUS CONTACTER</h6>
                            <div class="info_link-box">
                                <a href="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{Adresse Ici}</span>
                                </a>
                                <a href="">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>+06 {Telephone Ici}</span>
                                    </a>
                                <a href="">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>exemple@outlook.com</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Footer Section -->
            <footer class=" footer_section">
                <div class="container">
                    <p>
                        &copy; <span id="displayYear"></span> Tous Droits Reservés
                    </p>
                </div>
            </footer>
        </section>

        
    <!-- JavaScript Files/Scripts -->
        <script src="frontend/js/jquery-3.4.1.min.js"></script>
        <script src="frontend/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="frontend/js/custom.js"></script>
    </body>
</html>