@extends('layout')
@section('title', 'Bienvenido a Mi Tienda')
<p> con locale: {{ __('messages.welcome', ['name' => 'dayle']) }} </p>
@section('content')
    <h2>Nuestros Productos</h2>

    <div class="productos">
        <div class="producto">
            <h3>Producto 1</h3>
            <p>Descripción del Producto 1</p>
            <p><strong>Precio: </strong>Q100.00</p>
        </div>

        <div class="producto">
            <h3>Producto 2</h3>
            <p>Descripción del Producto 2</p>
            <p><strong>Precio: </strong>Q150.00</p>
        </div>
    </div>
@endsection
