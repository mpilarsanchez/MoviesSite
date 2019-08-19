<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>
      @yield('titulo')
    </title>
  </head>
  <body>
    <style type="text/css">
  body {
    color: purple;
    background-color: #d8da3d   
    }
  </style>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      	<div class="container">
      		<a class="navbar-brand" href="#">Movies Site</a>
      		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" >
      			<span class="navbar-toggler-icon"></span>
      		</button>
      		<div class="collapse navbar-collapse" id="navbarNav">
      			<ul class="navbar-nav">
      				<li class="nav-item">
      					<a class="nav-link" href="/actores">Listado de actores</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="/peliculas">Listado de películas</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="/agregarActor">Agregar Actor</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="/agregarPelicula">Crear película</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="/generos">Listado géneros</a>
      				</li>
              <br>
              <br>
              <br>
              <li class="nav-item">
      					<a class="nav-link" href="/register">REGISTER</a>
      				</li>
              <li class="nav-item">
      					<a class="nav-link" href="/login">LOGIN</a>
      				</li>
              <li class="nav-item">
                <a class="nav-link" href="/perfil">MI PERFIL</a>
              </li>
      			</ul>
      		</div>
      	</div>
      </nav>
      <br><br>
  </header>
  <section>
    @yield('principal')
  </section>
  <div class="col-12 text-center">
  <footer>
    Movies_db 2019
  </footer>
</div>
</body>
</html>
