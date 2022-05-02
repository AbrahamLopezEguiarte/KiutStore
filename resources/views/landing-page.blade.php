<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KiutStore</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('register') }}">Registrarse</a>
                <a href="#">FAQs</a>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="../img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @if (!Auth::check())
                                    <a href="{{ route('login') }}">Iniciar sesión</a>
                                    <a href="{{ route('register') }}">Registrarse</a>
                                    <a href="#">FAQs</a>
                                @else
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit(); " role="button">{{ __('Cerrar sesión') }}
                                        </a>
                                    </form>
                                    @if (Auth::user()->role===1)
                                        <a href="{{route('productos.index')}}">Ir al CRUD</a>
                                    @endif
                                    <a href="{{redirect('/')}}">FAQs</a>
                                @endif
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
                        <a href="{{redirect('/')}}"><img src="img/logoKiut.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{redirect('/')}}">Inicio</a></li>
                            <!-- <li><a href="./shop.html">Tienda</a></li> -->
                            <li><a href="{{redirect('/')}}">Tienda</a></li>
                            <li><a href="{{redirect('/')}}">Páginas</a>
                                <ul class="dropdown">
                                    <li><a href="{{redirect('/')}}">Nosotros</a></li>
                                    <li><a href="{{redirect('/')}}">Detalles de compra</a></li>
                                    <li><a href="{{redirect('/')}}">Carro de compra</a></li>
                                    <li><a href="{{redirect('/')}}">Pagar</a></li>
                                    <!-- <li><a href="./about.html">Nosotros</a></li>
                                    <li><a href="./shop-details.html">Detalles de compra</a></li>
                                    <li><a href="./shopping-cart.html">Carro de compra</a></li>
                                    <li><a href="./checkout.html">Pagar</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="{{redirect('/')}}" class="search-switch"><img src="../img/icon/search.png" alt=""></a>
                        <a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a>
                        <a href="{{redirect('/')}}"><img src="../img/icon/cart.png" alt=""> <span>0</span></a>
                        <!-- <div class="price">$0.00</div> -->
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            
            <div class="hero__items set-bg" data-setbg="img/hero/hero-2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Nueva Colección</h6>
                                <h2>Colección 2022</h2>
                                <p>Mochila moda coreana con una calidad excepcional. </p>
                                <a href="{{redirect('/')}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="https://www.facebook.com/KiuToys-101139685147311"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/kiutoys/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/hero-1.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Nueva Colección</h6>
                                <h2>Colección 2022</h2>
                                <p>Mochila moda coreana con una calidad excepcional. </p>
                                <a href="{{redirect('/')}}" class="primary-btn">Comprar ahora <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="https://www.facebook.com/KiuToys-101139685147311"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/kiutoys/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        @foreach($categories as $category)
                        {{-- <li class="active" data-filter=".mochilas">Mochilas</li>
                        <li data-filter=".panaleras">Pañaleras</li> --}}
                        <li data-filter=".{{$category->category}}">{{$category->category}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            @foreach($products as $product) 
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{$product->category}}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{$product->image}}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product->name}}</h6>
                        <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{$product->price}}</h5>
                        <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active beige" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="pink" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            </div>
            {{-- 
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix mochilas">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/mochila-mod2-rosa.jpg">
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Set 5 Piezas Mochila Coreana Con Osito</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$599</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active pink" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="black" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                                <label class="purple" for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix mochilas">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="../img/product/mochila-mod3-mostaza.jpg">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Set 5 Piezas Mochila Coreana Con Osito</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$599</h5>
                            <div class="product__color__select">
                                <label for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="active mustard" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                                <label class="pink" for="pc-10">
                                    <input type="radio" id="pc-10">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix panaleras">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/panalera-patito-morada.jpg">
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Pañalera 5 Piezas Diseño De Patito</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$589</h5>
                            <div class="product__color__select">
                                <label for="pc-11" class="pink">
                                    <input type="radio" id="pc-11">
                                </label>
                                <label class="active purple" for="pc-12">
                                    <input type="radio" id="pc-12">
                                </label>
                                <label class="black" for="pc-13">
                                    <input type="radio" id="pc-13">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix mochilas">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../img/product/mochila-mod4-negra.jpg">
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Set 5 Piezas Mochila Coreana Con Osito</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$599</h5>
                            <div class="product__color__select">
                                <label for="pc-14" class="pink">
                                    <input type="radio" id="pc-14">
                                </label>
                                <label class="active black" for="pc-15">
                                    <input type="radio" id="pc-15">
                                </label>
                                <label class="beige" for="pc-16">
                                    <input type="radio" id="pc-16">
                                </label>
                                <label class="blue" for="pc-17">
                                    <input type="radio" id="pc-17">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix mochilas">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="../img/product/mochila-mod5-verde.jpg">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Set 5 Piezas Mochila Coreana Con Osito</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$599</h5>
                            <div class="product__color__select">
                                <label for="pc-18" class="pink">
                                    <input type="radio" id="pc-18">
                                </label>
                                <label class="active green" for="pc-19">
                                    <input type="radio" id="pc-19">
                                </label>
                                <label class="black" for="pc-20">
                                    <input type="radio" id="pc-20">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix accesorios">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/bt21-bandolera-amarilla.jpg">
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>BTS BT21 Bolsa Bandolera KPOP</h6>
                            <a href="{{redirect('/')}}" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$359</h5>
                            <div class="product__color__select">
                                <label for="pc-21">
                                    <input type="radio" id="pc-21">
                                </label>
                                <label class="active yellow" for="pc-22">
                                    <input type="radio" id="pc-22">
                                </label>
                                <label class="brown" for="pc-23">
                                    <input type="radio" id="pc-23">
                                </label>
                                <label class="red" for="pc-24">
                                    <input type="radio" id="pc-24">
                                </label>

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>¡Síguenos en Instagram!</p>
                        <h3>#Korean_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{redirect('/')}}"><img src="img/logo-footer.png" alt=""></a>
                        </div>
                        <p>El cliente está en el corazón de nuestro modelo de negocio único, que incluye el diseño.</p>
                        <a href="{{redirect('/')}}"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="{{redirect('/')}}">Tienda</a></li>
                            <li><a href="{{redirect('/')}}">Accesorios</a></li>
                            <li><a href="{{redirect('/')}}">Rebajas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Tienda</h6>
                        <ul>
                            <li><a href="{{redirect('/')}}">CONTACTO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>SUSCRÍBETE PARA RECIBIR OFERTAS EXCLUSIVAS, PROMOCIONES Y NOTICIAS DE KIUTSTORE</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Ingrese el producto...">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.nicescroll.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>