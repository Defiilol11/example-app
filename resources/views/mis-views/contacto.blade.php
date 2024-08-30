<!-- resources/views/contacto.blade.php -->
@extends('layouts.main')

@section('title', 'Contacto')

@section('content')
    <form method="POST">
        @csrf
        <label for="nombre">Nombre:</label> <input type="text" id="nombre" name="nombre"><br/>
        <label for="email">Email:</label> <input type="text" id="email" name="email"><br/>
        <input type="checkbox" id="publicidad" name="publicidad"><label for="publicidad">Recibir publicidad</label> <br/>
        <label for="mensaje">Mensaje:</label> <br/>
        <textarea id="mensaje" name="mensaje"></textarea><br/>
        <input type="submit" value="Enviar"/>
    </form>
@endsection
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
