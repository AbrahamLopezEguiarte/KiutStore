@extends('layouts.master')

@section('title')
    Inicio | KiutStore
@endsection

@section('content')
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
                            <li><a href="{{route('shop.index')}}">Tienda</a></li>
                            <li><a href="{{redirect('/')}}">Páginas</a>
                                <ul class="dropdown">
                                    <li><a href="{{redirect('/')}}">Nosotros</a></li>
                                    <li><a href="{{redirect('/')}}">Detalles de compra</a></li>
                                    <li><a href="{{route('cart.index')}}">Carro de compra</a></li>
                                    <li><a href="{{redirect('/')}}">Pagar</a></li>
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
                        <li class="active" data-filter=".all">Todo</li>
                        @foreach($categories as $category)
                            <li data-filter=".{{$category->category}}">{{$category->category}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            @foreach($products as $product) 
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{$product->category}} all">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$product->image}}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{$product->name}}</h6>
                            <div class="formAdd">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-light remove-btn">+ Add To Cart</button>
                                </form>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>${{$product->price}}</h5>
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
@endsection