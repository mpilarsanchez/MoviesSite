@extends("plantilla")
@section("principal")

@section('titulo')
  Listado de peliculas
@endsection
<h1>Mis peliculas</h1>
<ul>
  @forelse ($peliculas as $pelicula)
    <li>
      <p><a href="/pelicula/{{$pelicula->id}}">{{$pelicula['title']}}</a></p>
        {{-- <a href="/pelicula/{{$pelicula->id}}"></a>   --}}
        {{-- {{ url("/pelicula/{$pelicula->id}")}} --}}
        @if ($pelicula->genero)
      <p>Genero:{{$pelicula->genero->name}}</p>
        @endif
        <p>Actores:</p>
        <ul>
          @foreach ($pelicula->actores as $actor)
            <li>
              {{$actor->getNombreCompleto()}}
            </li>
          @endforeach
        </ul>
      @unless ($pelicula['rating'] < 8)
        <p>EXELENTE</p>
      @endunless
    </li>
  @empty
    <p>
      No hay películas
    </p>
  @endforelse
</ul>
@endsection
