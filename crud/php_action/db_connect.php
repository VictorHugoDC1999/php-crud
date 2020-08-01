<?php
//Conexão com banco de dados

$serverName = "localhost";
$userName = "root";
$password = "123456";
$db_name = "crud";

$connect = mysqli_connect($serverName, $userName, $password, $db_name);
mysqli_set_charset($connect, "utf8");//primeiro parametro conexão, .Aqui estamos fazendo com que o banco de dados entenda os caracteres especiais

if (mysqli_connect_error()) {
	echo "Erro na conexão: ".mysqli_connect_error();
}
?>