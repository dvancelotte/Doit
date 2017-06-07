<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");

	verificaUsuario();

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-div">
		<form action="projeto-cadastro.php" method="post">
		    <table class="table" class="table funcionario" id="tableProjeto">
		    	<tr><td colspan="2" id="title"><h1>Inclusão de tarefas</h1></td></tr>

		        <?php include("tarefa/tarefa-formulario-base.php"); ?>

		        <tr>
		        	<td></td>
		            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
		        </tr>
		    </table>
		</form>
	</div>
</div>


<?php require_once("rodape.php"); ?>