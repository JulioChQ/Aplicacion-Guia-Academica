<?php
require_once "model/Curso.php";
require_once "model/Usuario.php";

class CursoController{
   private $curso_modelo;
   private $usuario_modelo;

   function __construct()
   {
      $this->curso_modelo = new Curso();
      $this->usuario_modelo = new Usuario();
   }

   public function vistaSituacionCursos(){
      $codigoUsuario = $_SESSION["usuario"];
      $cursos = $this->curso_modelo->getListaCursosXUsuario($codigoUsuario); 
      $usuario = $this->usuario_modelo->getUsuario($codigoUsuario);
      $nombreUsuario = $usuario["nombre"] . " " . $usuario["apellido1"];
      require_once "view/cursos.php";
   }
}

$cursoController = new CursoController();

$cursoController->vistaSituacionCursos();