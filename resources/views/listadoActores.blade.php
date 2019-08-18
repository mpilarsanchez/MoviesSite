@extends("plantilla")
@section("principal")

@section('titulo')
  Listado de actores
@endsection
  <h1>Mis actores</h1>
    <form class="" action="actores/buscar" method="post">
      <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}">
      <label for="buscador">Buscar Actor</label>
        <input type="text" class="form-control" placeholder="encontra tu actor preferido" name="buscador">
        <input type="submit" name="" value="Buscar">
        {{ (request()->is('actores/buscar')) ? print "<button><a href=/actores>cancelar filtro</a></button>" : ''}}
    </form>
    <ul>
    @forelse ($actores as $actor)
      <li><a href="actor/{{$actor->getId()}}">
          {{-- <a href="{{ url(/"actor/{$actor->id}")}}"></a>
          {{-- {{$actor['first_name']}} {{$actor['last_name']}} --}}
          {{$actor->getNombreCompleto()}}</a>
        </li>
        @if($actor->peliculas)
          <ul>
            @foreach ($actor->peliculas as $pelicula)
            <li>
              {{$pelicula->title}}
            </li>
            @endforeach
          </ul>
        @endif
    @empty
        <p>
          No hay peliculas para este actor
        </p>
      @endforelse
    </ul>
    {{$actores->links()}} 
    @endsection
