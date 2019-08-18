@extends('plantilla')
@section('titulo')
  Detalle de Pelicula
@endsection
@section("principal")
  <h1>Generos</h1>
 <ul>
   @foreach ($generos as $genero)
     <li>
       <h2>{{$genero->name}}</h2>
       {{-- {{$genero->peliculas}}
     //devuelve un array de todos los objeto de tipo pelicula(relacion N-N) entonces tenemos que hacer un FOREACH --}}
    <h6>Peliculas:</h6>
    <ul>
    @foreach ($genero->peliculas as $pelicula)
      <li>
        {{$pelicula->title}}
      </li>
    @endforeach

     </ul>
   </li>
   @endforeach
 </ul>
@endsection
