@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
    <h1> Bienvenido a la pg de cursos</h1>

    <ul>
        @foreach ($cursos as $curso)
            <li>{{$curso->id}} <a href="{{route('cursos.show', $curso->id)}}"> {{$curso->name}} </a></li>
        @endforeach
    </ul>

    {{$cursos->links()}}
@endsection