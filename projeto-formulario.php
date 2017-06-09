<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

	verificaUsuario();

    if ($gerentes==NULL){
		$gerentes = listaFuncionarioSemProjeto($conexao, "GERENTE");

    }
    if($colaboradores == NULL){
		$colaboradores = listaFuncionarioSemProjeto($conexao, "COLABORADOR");
    }

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
		<form action="projeto-cadastro.php" onclick="return validar()" method="post">
		    <table class="table" class="table funcionario" id="tableProjeto">
		    	<tr><td colspan="2" id="title"><h1>Novo Projeto</h1></td></tr>

		        <?php include("projeto-formulario-base.php"); ?>

		        <tr>
		        	<td></td>
		            <td align=	"right"><button class="btn btn btn-danger" type="submit">Cancelar</button> <button 
		            class="btn btn-primary" type="submit">Cadastrar</button></td>
		        </tr>
		    </table>
		</form>
		<span>* Campos obrigatórios</span>
	</div>
</div>


<?php require_once("rodape.php"); ?>
