@extends('layouts.master')

@section('title')
    KiutStore | Inicio
@endsection

@section('content')

    @section('cart')
        <div class="price">$0.00</div>
    @endsection
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

@endsection