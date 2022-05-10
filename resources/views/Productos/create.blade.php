<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Css Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    
    
    <title>Agregar productos</title>
</head>
<body class="mx-5 my-3">
    <h2 class="text-center mt-2">Create</h2>
    
    <div class="mx-auto card" style="width: 1000px">

        <div class="card-body">
            <a href="{{route('productos.index')}}" class="ml-6 badge badge-pill badge-light mb-2">Volver a la página principal</a><br>
            <form class="row g-3" action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 mt-2">
                    <label for="name" class="form-label">Producto</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    @error('name')
                        <small>* {{$message}}</small>
                        <br>
                        <br>
                    @enderror
                </div>

                <div class="col-md-12 mt-2">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" name="description" rows="10">{{old('description')}} </textarea>
                    @error('description')
                        <small>* {{$message}}</small>
                        <br>
                        <br>
                    @enderror
                </div>
                <div class="col-4 mt-2">
                    <label for="price" class="form-label">Precio</label>
                    <input class="form-control" type="number" name="price" value="{{old('price')}}">
                    @error('price')
                        <small>* {{$message}}</small>
                        <br>
                        <br>
                    @enderror
                </div>

                <div class="col-2 mt-2">
                    <label for="exampleColorInput" class="form-label">Color</label>
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                </div>

                <div class="col-md-2 mt-2">
                    <label for="category" class="form-label">Categoría 
                        <br>
                        <select id="category" name="category" class="form-select">
                            <option value="Mochilas" selected>Mochilas</option>
                            <option value="Pañaleras">Pañaleras</option>
                        </select>
                        @error('category')
                            <br>
                            <small>* {{$message}}</small>
                            <br>
                            <br>
                        @enderror
                    </label>
                </div>
                <div class="col-4 mt-2">
                    <label class="form-label" for="image">
                        Subir imagen
                        <br>
                        <input type="file" name="image" id="image" accept="image/*">
                        @error('image')
                            <br>
                            <small>* {{$message}}</small>
                            <br>
                            <br>
                        @enderror
                    </label>
                </div>
                <div class="col-3 mt-5 mx-auto" style="width: 200px;">
                    <button type="submit" class="btn btn-outline-dark">Enviar información</button>
                </div>
            </form>
        </div>
        
    </div>
         

</body>
</html>