<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

	verificaUsuario();

	$gerentes = listaFuncionarioSemProjeto($conexao, "GERENTE");
	$colaboradores = listaFuncionarioSemProjeto($conexao, "COLABORADOR");

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-div">
		<form action="projeto-cadastro.php" method="post">
		    <table class="table" class="table funcionario" id="tableProjeto">
		    	<tr><td colspan="2" id="title"><h1>Novo Projeto</h1></td></tr>

		        <?php include("projeto-formulario-base.php"); ?>

		        <tr>
		        	<td></td>
		            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
		        </tr>
		    </table>
		</form>
	</div>
</div>


<?php require_once("rodape.php"); ?>
