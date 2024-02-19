@extends('layouts.plantilla')

@section('title', 'Actualizar curso')

@section('content')
    <h1>Actualizar un curso</h1>
    <form action="{{route('cursos.update', $curso)}}" method="POST">
        @csrf
        @method('put')
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{$curso->name}}"><br><br>

        <label for="categoria">Categoria:</label><br>
        <input type="text" name="categoria" id="categoria" value="{{$curso->categoria}}"><br><br>

        <label for="description">Descripcion:</label><br>
        <textarea name="description" id="description" cols="30" rows="10">{{$curso->description}}</textarea><br><br>

        <button type="submit">Enviar formulario</button>
    </form>
@endsection