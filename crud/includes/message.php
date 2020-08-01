<?php
//Sessão
session_start();
if (isset($_SESSION['mensagem'])) {//verificando se existe a sessão mensagem?>
<script>
//mensagem
	window.onload = function() {
		M.toast({html: '<?php echo $_SESSION['mensagem'];?>'});
	};
</script>
<?php
}
session_unset();