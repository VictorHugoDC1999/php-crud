<?php
//Conexão
include_once 'php_action/db_connect.php';

//Header
include_once 'includes/header.php';

//Select
if (isset($_GET['id'])) {/*aqui estamos verificando se existe o parametro id na url, atraves da superglobal get. Então se o parametro id existir ele executa o bloco(se existir ele vai atribuir para a variavel $id)*/
	$id = mysqli_escape_string($connect, $_GET['id']);/*atribuindo o valor id para a varaivel $id. E filtramos o id antes de dar um select no banco de dados*/
	$sql = "SELECT * FROM clientes WHERE id = '$id'";/*aqui estamos dizendo que o id do banco de dados tem que ser igual a variavel $id do nosso codigo, então ele vai pegar todos os campos do cliente que tiver o id(da variavel $id) para que possamos editar*/
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);//atribuindo os dados do cliente a um erro
}
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Editar Cliente</h3>
		<form action="php_action/update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']//aqui ninguem vai conseguir ver este input...Ele serve para que possamos pegar o id do cliente para que possamos ter o id dele na hora de fazer o update no banco de dados;?>">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];//aqui estamos pegando os registros da variavel dados e colocando dentro dos campos?>">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
				<label for="sobrenome">Sobrenome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email" value="<?php echo $dados['email'];?>"><!--caso o atributo name esteja escrito incorretamente, ele não vai conseguir enviar ao banco de dados (exemplo se eu colocar no atributo name:"emai" quando eu for registrar ele não vai enviar e cadastrar o email do cliente)-->
				<label for="Email">Email</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
				<label for="idade">Idade</label>
			</div>
			<button type="submit" name="btn-editar" class="btn">Atualizar</button>
			<a href="index.php" class="btn green">Lista de Clientes</a>
		</form>
	</div>
</div>

<?php  
//Footer
include_once 'includes/footer.php';
?>