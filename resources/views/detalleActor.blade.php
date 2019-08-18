@extends('plantilla')
@section('titulo')
  Detalle de Actor
@endsection
@section("principal")
  <h1>Usted eligio el Actor {{$actor->getNombreCompleto()}}</h1>
  <img src="/storage/{{$actor->imagen}}" alt="">
  <h1>{{$actor["rating"]}}</h1>
  @if($actor->favorite_movie)
  <h1>{{$actor->favorite_movie->title}}</h1>
@endif
  <p>Peliculas en las que participo {{$actor->getNombreCompleto()}} : </p>
  @if($actor->peliculas)
    <ul>
      @foreach ($actor->peliculas as $pelicula)
      <li>
        <a href="/pelicula/{{$pelicula->id}}">{{$pelicula->title}}</a>
      </li>
      @endforeach
    </ul>
  @endif
</ul>
<div class="col-12 text-center">
<form class="" action="/actor/{{$actor->id}}/edit" method="get">
  <input type="hidden" name="id" value="{{$actor->id}}">
  <input type="submit" class="btn btn-primary" name="" value="Actualizar">
  {{-- <a style="color:red" href="/actor/edit"> --}}
</form>
</div>

<br>
<div class="col-12 text-center">
  <form class="" action="/borrarActor" method="post">
    {{method_field('delete')}}
  {{csrf_field()}}
   <input type="hidden" name="id" value="{{$actor->id}}">
   <input type="submit" name="" value="Borrar Actor">
  </form>
  {{-- f. Crear un nuevo formulario con un botón “Eliminar” en la vista actor.blade.php​.
  (Tener en cuenta que el formulario deberá apuntar a la ruta ​/actor/{id}​).
  Utilizar la función ​method_field​ para que el formulario se envíe con el método DELETE.
  Este formulario debe tener un input type=”hidden”> con el id del actor a eliminar. --}}
   {{-- <form class="" action="/borrarActor">
     {{-- /actor/{{$actor->id}} --}}
    {{-- {{ method_field("DELETE") }} --}}
  {{-- <input type="hidden" name="id" value="{{$actor->id}}"> --}}
  {{-- <input type="hidden" name="_method" value="PUT"> --}}
  {{-- <input type="submit" class="btn btn-primary" value="Borrar Actor">
  </form> --}}
</div>
@endsection
