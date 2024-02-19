@extends('layouts.plantilla')

@section('title', 'Home')
@section('content')
    <h1>Crear un curso nuevo</h1>
    <form action="{{route('cursos.store')}}" method="POST">
        @csrf
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="categoria">Categoria:</label><br>
        <input type="text" name="categoria" id="categoria"><br><br>

        <label for="description">Descripcion:</label><br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>

        <button type="submit">Enviar formulario</button>
    </form>
@endsection