<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class EstudianteController extends Controller
{
    public function comprobarNombre(){
      return view('estudiante.formulario');
    }

    public function validarNombre(Request $request){
      //Session::flash('message-error','El deudor es menor de edad');
      $nombre_apellido = $request["nombre_apellido"];
      $nombre_apellido = $this->retornaMayuscula($nombre_apellido);

      if ($this->validaNumero($nombre_apellido)) {
        Session::flash('message-error','El nombre que ingreso contiene un número');
        return redirect()->to('comprobarnombre');
      }

      if ($this->validaLongitud($nombre_apellido,100)) {
        Session::flash('message-error','El nombre excede los 100 caracteres');
        return redirect()->to('comprobarnombre');
      }

      $cantidad_palabras = $this->retornaCantidadPalabras($nombre_apellido);


      Session::flash('message','El nombre es '.$nombre_apellido.' Cantidad de palabras:'.$cantidad_palabras);
      return redirect()->to('comprobarnombre');
    }

    //El texto que se imprime debe estar en mayúsculas
    public function retornaMayuscula($cadena){
      return strtoupper($cadena);
    }

    //Debe retornar un mensaje de alerta cuando ingrese un número
    public function validaNumero($cadena){
      $array_cadena = str_split($cadena);
      $encontro_numero = false;

      foreach ($array_cadena as $key) {
        if (is_numeric($key)){
          $encontro_numero = true;
          break;
        }
      }

      if($encontro_numero){
        return true;
      }else{
        return false;
      }
    }

    // Retorna una alerta cuando sobrepasa los 100 caracteres
    public function validaLongitud($cadena,$longitud){
      if (strlen($cadena)>$longitud) {
        return true;
      } else {
        return false;
      }
    }

    //Debe imprimir también la cantidad de palabras en el nombre
    public function retornaCantidadPalabras($cadena){
      if (empty($cadena)) {
        return 0;
      }else{
        $array_cadena = explode(" ",$cadena);
        return count($array_cadena);
      }
    }

}
