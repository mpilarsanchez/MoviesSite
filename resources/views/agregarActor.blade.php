@extends('plantilla')
@section('titulo')
  Agregar Actor
@endsection
@section("principal")

{{-- //5.	Crear las página de agregado de actor incluyendo la posibilidad de seleccionar la película preferida del actor

//TP PRESENCIAL 13/08/19
// a. Crear un nuevo formulario para agregar actores, junto con su ruta
// /actors/add, y la vista actors/add.blade.php. (Tener en cuenta que el
// formulario deberá apuntar a la ruta /actors/add). El formulario debe tener
// los campos necesarios para insertar un actor y estar configurado para viajar
// por POST. No olvides el csrf_field
 --}}

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-10">
					<h2>Agregar Actor</h2>
            <form action="/agregarActor" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Nombre:</label>
									<input type="text" class="form-control" placeholder="Ej: Kate" name="first_name">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Apellido:</label>
									<input type="text" class="form-control" placeholder="Ej: Winslet" name="last_name">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Rating:</label>
									<input type="text" class="form-control" placeholder="Ej: 5" name="rating">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Película Favorita:</label>
									<select class="form-control" name="movie_id">
										<option value="">Elegí una pelicula</option>
										@foreach ($peliculas as $pelicula)
											<option value="{{$pelicula->id}}">{{$pelicula->title}}</option>
										@endforeach --}}
									</select>
								</div>
							</div>
              <div class="col-6">
                <div class="form-group">
                  <label>Imagen del Actor:</label>
                  <input type="file" class="form-control" name="imagen" value="">
                </div>
              </div>
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary">GUARDAR</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php if (isset($saved)): ?>
				<div
					class="alert <?php echo $saved ? 'alert-success' : 'alert-danger'?>"
				>
					<?php echo $saved ? '¡Actor guardado con éxito!' : '¡No se pudo guardar el Actor!' ?>
				</div>
			<?php endif; ?>
		</div>
@endsection
