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
//$usuario = new Usuario();
//$usuario->login("Francisca","Garrafa");
//echo $usuario;

//Criando um novo usuario
//$aluno = new Usuario("aluno", "@lun0");
//$aluno->insert();
//echo $aluno;

//Alterando um dado
//$usuario = new Usuario();
//$usuario->loadByid(2);
//$usuario->update("professor", "batatinha");
//echo $usuario;

//Deletando dados
$usuario = new Usuario();
$usuario->loadByid(1);
$usuario->delete();
echo $usuario;
