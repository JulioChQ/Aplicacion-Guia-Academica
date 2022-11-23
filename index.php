<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
require_once 'model/config.php';

session_start();
if(!isset($_SESSION["usuario"])){
   require_once "controller/usuario_controller.php";
}else{
    require_once "controller/curso_controller.php";
}