<?php
//Sessão
session_start();

//Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-editar'])) {

	if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {/*se o valor inserido não for int ele da como verdadeiro e executa o bloco não deixando que valor seja inserido*/
		$_SESSION['mensagem'] = "Formato de idade inválido";
		header('Location: ../index.php');
	} else {
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$idade = mysqli_escape_string($connect, $_POST['idade']);

		$id = mysqli_escape_string($connect, $_POST['id']);

		$sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";/*aqui estamos atualizando o cadastro de um cliente e estamos passando os valores a serem atualizados e para que ele não atualize todos os registros estamos dizendo no final onde deve ser atualizado que é onde o id do banco de dados tem que ser igual a variavel $id */

		if (mysqli_query($connect, $sql)) {
			$_SESSION['mensagem'] = "Atualizado com sucesso!";
			header('Location: ../index.php');
		} else {
			$_SESSION['mensagem'] = "Erro ao atualizar";
			header('Location: ../index.php');
		}
	}
}