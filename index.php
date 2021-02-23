<?php

require_once("configi.php");

/*$sql= new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

//Carrega 1 usuario
//$name = new Usuario();
//$name->loadByid(3);
//echo $name;

//Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuarios pelo login
//$search = Usuario::search("Fr");
//echo json_encode($search);

//Carrega um usuario usando o login e senha
$usuario = new Usuario();
$usuario->login("Francisca","Garrafa");

echo $usuario;