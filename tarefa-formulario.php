<?php require_once("cabecalho.php");
	  require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

	verificaUsuario();

	$id_projeto = $_GET['id_projeto'];
	
    if($colaboradores == NULL){
		$colaboradores = listaFuncionarioDoProjeto($conexao, $id_projeto, "COLABORADOR");
    }

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        
        <form action="tarefa-cadastro.php" onclick="return validar()" method="post">
		    <table class="table funcionario" id="tableFuncionario">
		    	<input type="hidden" name="id_projeto" value="<?=$id_projeto?>" />>
		    	<tr><td colspan="2" id="title"><h1>Inclusão de tarefas</h1></td></tr>

		        <?php include("tarefa-formulario-base.php"); ?>

		        <tr>
		        	<td align="right">
		        		<button class="btn btn btn-danger" type="submit">Cancelar</button>
		        		<button class="btn btn-primary" type="submit">Cadastrar</button>
		        	</td>
		        </tr>
		    </table>
		</form>
        <span>* Campos obrigatórios</span>
	</div>
</div>


<?php require_once("rodape.php"); ?>