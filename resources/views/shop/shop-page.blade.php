@extends('layouts.master')

@section('title')
    KiutStore | Tienda
@endsection

@section('content')

    @section('cart')
        <div class="price">$0.00</div>
    @endsection
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Tienda</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('landingpage')}}">Inicio</a>
                            <a href="{{route('shop.index')}}">Tienda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categorías</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories"> 
                                                <ul class="filter__controls">
                                                    <li class="active mr-0 d-block text-left" style="font-size: 1rem" data-filter=".all">Todo</li>
                                                    @foreach($categories as $category)
                                                        <li class="mr-0 d-block text-left" style="font-size: 1rem" data-filter=".{{$category->category}}">{{$category->category. " (". $arr_count["$category->category"]. ")"}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>            
                </div>
                <div class="col-lg-9">
                    <div class="row product__filter">
                    @foreach($products as $product) 
                        <div class="col-lg-4 col-md-6 col-sm-6 mix {{$product->category}} all">
                            <div class="product__item">            
                                        <div class="product__item__pic set-bg" data-setbg="{{$product->image}}">
                                            <li><a href="{{route('shop.show',  $product->id)}}"><span class="label">Ver</span> </a></li>
                                            <ul class="product__hover">
                                                <li><a href="{{redirect('/')}}"><img src="../img/icon/heart.png" alt=""></a></li>
                                            </ul>
                                        </div>    
                                    
                                    {{-- <span class="label">New</span> --}}
                                    
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
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $products->links('pagination::bootstrap-5') }} 
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </section>      
    <!-- Shop Section End -->

@endsection