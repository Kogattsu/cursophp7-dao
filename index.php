<?php

require_once("configi.php");

/*$sql= new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);*/

$name = new Usuario();

$name->loadByid(3);

echo $name;