<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Agregar productos</title>
</head>
<body>
    <h1>Create</h1>
    <a href="{{route('productos.index')}}">Volver a la página principal</a><br>
    <form action="{{route('producto.store')}}" method="POST">
        @csrf
        <label>
            Producto:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
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
            <textarea name="description" rows="10">{{old('description')}}</textarea>
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
            <input type="number" name="price" value="{{old('price')}}">
            <br>
        </label>
        @error('price')
            <small>* {{$message}}</small>
            <br>
            <br>
        @enderror
        <br>
        <button type="submit">Enviar información</button>
    </form>
</body>
</html>