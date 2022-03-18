<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Actualizar productos</title>
</head>
<body>
    <h1>Edit</h1>
    <a href="{{route('productos.index')}}">Volver a la página principal</a><br>
    <form action="{{route('productos.update', $producto)}}" method="POST">
        @csrf
        @method('put')
        <label>
            Producto:
            <br>
            <input type="text" name="name" value="{{old('name', $producto->name)}}">
            <br>
        </label>
        @error('name')
            <small>* {{$message}}</small>
            <br>
            <br>
        @enderror
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="10">{{old('description', $producto->description)}}</textarea>
            <br>
        </label>
        @error('description')
            <small>* {{$message}}</small>
            <br>
            <br>
        @enderror
        <label>
            Precio:
            <br>
            <input type="number" name="price" value="{{old('price', $producto->price)}}">
            <br>
        </label>
        @error('price')
            <small>* {{$message}}</small>
            <br>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar información</button>
    </form>
</body>
</html>