@extends('layouts.plantilla')

@section('title', 'Home')
@section('content')
    <h1> Bienvenido a la pg {{$curso->name}}</h1>
    <a href="{{route("cursos.index")}}">Volver a página de cursos</a>
    <br>
    <a href="{{route("cursos.create")}}">La cabra La cabra La cabra La cabra</a>
    <br>
    <a href="{{route("cursos.edit", $curso->id)}}" method='get'>El cabron</a>
    <br>
    <form action="{{route('cursos.destroy', $curso)}}" method='post'>
        @csrf
        @method('delete')
        <button type="submit">Eliminar curso</button>
    </form>

    <p><strong>Categoria: </strong> {{$curso->categoria}}</p>
    <p>{{$curso->description}}</p>
@endsection