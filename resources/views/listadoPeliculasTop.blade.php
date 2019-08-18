@extends("plantilla")
@section("principal")

@section('titulo')
  Listado de peliculas con Rating mayor a 5
@endsection
<h1>Mis peliculas</h1>
<ul>
  @forelse ($peliculas as $pelicula)
    <li>
      <p>{{$pelicula['title']}}</p>
    </li>
  @empty
    <p>
      No hay películas
    </p>
  @endforelse
</ul>
@endsection
