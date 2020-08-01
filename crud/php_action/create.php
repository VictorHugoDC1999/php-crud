<?php
//Sessão
session_start();

//Conexão
require_once 'db_connect.php';

//Clear
function clear($input){
	global $connect;
	//sql
	$var = mysqli_escape_string($connect, $input);//escapa
	// xss(cross site scripting) proteção contra xss
	$var = htmlspecialchars($var);/*troca caracteres especiais e codigos maliciosos por codigo html*/
	return $var;//retorna a variavel filtrada pelas duas funções acima
}

if (isset($_POST['btn-cadastrar'])) {

	if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {/*se o valor inserido não for int ele da como verdadeiro e executa o bloco não deixando que valor seja inserido*/
		$_SESSION['mensagem'] = "Formato de idade inválido";
		header('Location: ../index.php');
	} else {
		$nome = clear($_POST['nome']);
		$sobrenome = clear($_POST['sobrenome']);
		$email = clear($_POST['email']);
		$idade = clear($_POST['idade']);

		$sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

		if (mysqli_query($connect, $sql)) {
			$_SESSION['mensagem'] = "Cadastrado com sucesso!";
			header('Location: ../index.php');
		} else {
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../index.php');
		}
	}
}