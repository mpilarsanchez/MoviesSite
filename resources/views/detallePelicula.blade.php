@extends('plantilla')
@section('titulo')
  Detalle de Pelicula
@endsection
@section("principal")
  <h1>Usted eligio la Pelicula {{$pelicula->title}}</h1>
  <img src="/storage/{{$pelicula->poster}}" alt="">
  <h2>Rating: {{$pelicula->rating}}</h2>
  <h2>Awards: {{$pelicula->awards}}</h2>
  <h2>Duración: {{$pelicula->length}}</h2>
  @if($pelicula->genero)
  <h2>{{$pelicula->genero->name}}</h1>
@endif
  <form class="" action="/borrarPelicula" method="post">
  {{csrf_field()}}
   <input type="hidden" name="id" value="{{$pelicula->id}}">
   <input type="submit" name="" value="Borrar Pelicula">
  </form>
@endsection
