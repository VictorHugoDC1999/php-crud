<?php
//Conexão
include_once 'php_action/db_connect.php';

//Header
include_once 'includes/header.php';

//Mensagem
include_once 'includes/message.php';
?>
<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Clientes</h3>
		<table class="striped">
			<thead>
				<tr>

					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Email:</th>
					<th>Idade:</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM clientes";
				$resultado = mysqli_query($connect, $sql);//executando a query(que está na variavel sql) no banco de dados que está conectado pela variavel $connect

				if (mysqli_num_rows($resultado) > 0) {//se o numero de linhas dentro do banco de dados for maior que 0 clientes ele vai executar
					while ($dados = mysqli_fetch_array($resultado)) {/*transformando os dados do cliente em um array para que possamos trabalhar com todos os dados dele*/
				?>
				<tr>
					<td><?php echo $dados['nome'];?></td>
					<td><?php echo $dados['sobrenome'];?></td>
					<td><?php echo $dados['email'];?></td>
					<td><?php echo $dados['idade'];?></td>
					<td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['id'];//aqui colocamos o id, pois cada registro tem um botão que faz referencia ao modal daquele registro?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
					
					<!-- Modal Structure -->
					<div id="modal<?php echo $dados['id'];/*aqui colocamos o id, pois cada registro tem um botão que faz referencia ao modal daquele registro*/?>" class="modal">
						<div class="modal-content">
							<h4>Opa!</h4>
							<p>Tem certeza que deseja excluir esse cliente?</p>
						</div>
						<div class="modal-footer">

							<form action="php_action/delete.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $dados['id'];/*aqui colocamos o id, pois cada registro tem um botão que faz referencia ao modal daquele registro*/?>">
								<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

								<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
							</form>

						</div>
					</div>
				</tr>
				<?php
					}
				}
				else {//caso não tenha nenhum cliente ele vai apresentar este bloco?>
					<tr>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				<?php	

				}
				?>
			</tbody>
		</table>
		<br>
		<a href="adicionar.php" class="btn">Adicionar cliente</a>
	</div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>