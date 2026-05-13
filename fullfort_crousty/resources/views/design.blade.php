<!-- Design Principal (User): Toutes les vues utilisatrices heritent cette template -->
<!DOCTYPE html>
<html>
    <head>
        <title>Fullfort Crousty</title>
        
    <!-- Metadonnées de Base -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Metadonnées pour supports Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
        <link rel="shortcut icon" href="frontend/images/favicon.png" type="image/x-icon">

    <!-- Liaison CSS Bootstrap -->
        <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />

    <!-- CSS Sur Mesure/Custom -->
        <link href="frontend/css/style.css" rel="stylesheet" />

    <!-- CSS Responsive -->
        <link href="frontend/css/responsive.css" rel="stylesheet" />
    </head>

    <body>
    <!-- Section Header -->
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
                            <a href="{{route('index')}}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Accueil</span>
                            </a>
                            @if (Auth::check())
                                <a href="{{route('dashboard')}}">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
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
                            <a href="{{route('register')}}">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <span>Inscription</span>
                            </a>
                            <a href="{{route('login')}}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>Connexion</span>
                            </a>
                            @endif
                            @if (Auth::check())
                                <a href="{{route('cart.products')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">&nbsp;{{$count}}</i>
                                </a>
                            @endif
                        </div>
                    </div>
                </nav>
            </header>
        </div>

    <!-- Section Slider -->
    
        <section class="slider_section" style="width: 95%; margin: auto;">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7" width=30%>
                                        <div class="detail-box"> 
                                            <h1>Bienvenue</h1>
                                            <p>Chez <b><i>Fullfort Crousty</i></b>, nous vous proposons le meilleur du fast food. Préparés avec des produits frais et dans le respect des saveurs authentiques, <b>nos crousty, burgers et plats à base de poulet</b> sont tous disponibles <b>à la commande</b>. Notre mission est simple : vous faire gouter à des saveurs inoubliables, à un prix <b>imbattable.</b></p>
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

    <!-- Section d'heritage -->
    <!-- Toutes les sections/vues auxquelles le design est lègué -->
        <section class="shop_section layout_padding">

            @yield('index')

            @yield('product_details')

            @yield('products_all')

            @yield('products_best')

            @yield('cart_products')

            @yield('payment')

        </section>

    <!-- Section Contact -->

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
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Alençon" width="600" height="300" frameborder="0" style="border: 1px solid black; width: 100%; height:100%" allowfullscreen></iframe>
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

    <!-- Section Infos -->

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
                            <p>Fullfort crousty, une entreprise de publicité en ligne, souhaite s'étendre dans l'univers de la restauration rapide pour vous proposer des produits de qualité.</p>
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
                            <p>Nos conseillers clientèle sont à l'écoute 24h/24, et notre assistance technique est reactive et qualitative.</p>
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

        <!-- Footer -->
            <footer class=" footer_section">
                <div class="container">
                    <p>
                        &copy; <span id="displayYear"></span> Tous Droits Reservés
                    </p>
                </div>
            </footer>
        </section>

        
    <!-- Fichiers/Sripts Javascript -->
        <script src="frontend/js/jquery-3.4.1.min.js"></script>
        <script src="frontend/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="frontend/js/custom.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">

            $(function() 
            {
                var $form = $(".require-validation");

                $('form.require-validation').bind('submit', function(e) 
                {
                    var $form = $(".require-validation"), inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '), $inputs = $form.find('.required').find(inputSelector), $errorMessage = $form.find('div.error'), valid = true;

                    $errorMessage.addClass('hide');

                    $('.has-error').removeClass('has-error');

                    $inputs.each(function(i, el)
                    {
                        var $input = $(el);
                        if ($input.val() === '')
                    {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                    });
                    if (!$form.data('cc-on-file'))
                    {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({number: $('.card-number').val(), cvc: $('.card-cvc').val(), exp_month: $('.card-expiry-month').val(), exp_year: $('.card-expiry-year').val()}, stripeResponseHandler);

                    }
                });

                function stripeResponseHandler(status, response)
                {
                    if (response.error)
                    {
                        $('.error').removeClass('hide').find('.alert').text(response.error.message);

                    }
                    else
                    {
                        /* token contains id, last4, and card type */
                        var token = response['id'];

                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            });

    </script>
    </body>
</html>