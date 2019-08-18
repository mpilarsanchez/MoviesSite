<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\User;
use Auth;
class UsuariosController extends Controller
{
  public function traerUsuario(){
    $usuario = User::find($this->usuarioLoguedoId());
    $vac = compact("usuario");
    return view ("perfil", $vac);
  }

  public function usuarioLoguedoId(){
   return Auth::user()->id;
  }
}
