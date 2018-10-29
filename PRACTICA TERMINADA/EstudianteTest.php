<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\EstudianteController;

class EstudianteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    /*  PARA EJEMPLO  */
    public function testRetornaMayusculas(){
      //AAA
      //ARRANGE / ACT / ASSER
      $estudiante = new EstudianteController();

      $resultado = $estudiante->retornaMayuscula("cristian");

      $this->assertEquals("CRISTIAN", $resultado);
    }

    public function testRetornaMayusculasCadenaPedro(){
      //AAA
      //ARRANGE / ACT / ASSER
      $estudiante = new EstudianteController();

      $resultado = $estudiante->retornaMayuscula("pedro");

      $this->assertEquals("PEDRO", $resultado);
    }


    public function testValidarNumerosRetornaVerdadero(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaNumero("Cr1st1an B0t1na");
      $this->assertTrue($resultado, "message");
    }

    public function testValidarNumerosRetornaFalso(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaNumero("CRISTIAN");

      $this->assertFalse($resultado, "message");
    }

    public function testValidarNumerosRetornaVerdaderoCadenaConNumeroAlFinal(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaNumero("Cristian1");
      $this->assertTrue($resultado, "message");
    }

    public function testValidarNumerosRetornaVerdaderoCadenaConNumeroAlIncicio(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaNumero("2Cristian");
      $this->assertTrue($resultado, "message");
    }


    public function testValidarCantidadCaracteresMayorA100(){
      $cadena = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam";
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaLongitud($cadena,100);
      $this->assertTrue($resultado, "message");
    }

    public function testValidarCantidadCaracteresMenorA100(){
      $cadena = "Lorem ipsum dolor sit amet, consectetur adipiscing elit dsadsadadasdaasdada dsad assada sdas sadasda";
      $estudiante = new EstudianteController();

      $resultado = $estudiante->validaLongitud($cadena,100);
      $this->assertFalse($resultado, "message");
    }

    public function testRetornaCantidadPalabras(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->retornaCantidadPalabras("CRISTIAN BOTINA CAIPE");

      $this->assertEquals("3", $resultado);
    }

    public function testRetornaCantidadPalabras2(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->retornaCantidadPalabras("CRISTIAN BOTINA CAIPE RESTREPO");

      $this->assertEquals("4", $resultado);
    }


    public function testRetornaCantidad0Palabras(){
      $estudiante = new EstudianteController();

      $resultado = $estudiante->retornaCantidadPalabras("");

      $this->assertEquals("0", $resultado);
    }


}
