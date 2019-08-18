@extends('plantilla')
@section('titulo')
  Agregar Pelicula
@endsection
@section("principal")
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        <h2>Crear película</h2>
        <ul class="errores" style="color:red">
          @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
          @endforeach
        </ul>
        <form action="/agregarPelicula" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Título:</label>
                <input type="text" class="form-control" placeholder="Ej: Star Wars" name="title" value={{old("title")}}>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Rating:</label>
                <input type="text" class="form-control" placeholder="Ej: 8.5" name="rating" value={{old("rating")}}>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Premios:</label>
                <input type="text" class="form-control" placeholder="Ej: 5" name="awards" value={{old("premios")}}>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Fecha de lanzamiento:</label>
                <input type="date" class="form-control" name="release_date" value="2019-01-25">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Duración:</label>
                <input type="text" class="form-control" placeholder="Ej: 120" name="length">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Género:</label>
                <select class="form-control" name="genre_id">
                  <option value="">Elegí un género</option>
                   @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Poster:</label>
                <input type="file" class="form-control" name="poster" value="">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection
