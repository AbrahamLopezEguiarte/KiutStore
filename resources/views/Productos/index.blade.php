<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
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
    
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD</title>
</head>
<body class="mx-5 my-3">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                                    
                                    {{-- Cambiar por route --}}
                                    <a href="{{redirect('/')}}">INICIO</a>
                                    
                                    <a href="{{redirect('/')}}">FAQs</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <h1 class="text-center mt-2" style="font-size: 60px">Productos</h1>
    <a href="{{url('http://crud_app.test:8080/')}}" class="badge badge-pill badge-light mb-2">Regresar a la página principal</a>
    <a href="{{route('productos.create')}}" class="badge badge-pill badge-light mb-2">Agregar un nuevo producto</a>   
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Producto</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Categoría</th>
        <th scope="col">Imagen</th>
        <th scope="col">Detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
        <th scope="row">{{$producto -> id}}</th>
        <td>{{$producto -> name}}</td>
        <td>{{$producto -> description}}</td>
        <td>{{$producto -> price}}</td>
        <td>{{$producto -> category}}</td>
        <td style="width: 8%" >
            <img class="img-thumbnail rounded"  src="{{$producto -> image}}" alt="">
        </td>
        <td>
            <a href="{{route('productos.show', $producto->id)}}" class="badge badge-pill badge-light mb-2">Ver detalle</a><br>
        </td>
        </tr>
        @endforeach
        
    </tbody>
    </table>
    {{ $productos->links() }}
</body>
</html>