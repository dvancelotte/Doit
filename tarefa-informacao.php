<?php

require_once("conecta.php");
require_once("logica-usuario.php"); 

if($_SESSION["usuario_tipo"]!=3)
    require_once("cabecalho.php");
else
    require_once("cabecalho-colaborador.php");

require_once("tarefa-banco.php");

$id_tarefa = $_GET['id_tarefa'];
$tarefa = todaInformacaoTarefa($conexao, $id_tarefa);

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        
	    <table class="table funcionario" id="tableFuncionario">
	    	<tr><td colspan="2" id="title"><h1>Informações da tarefa</h1></td></tr>
            <tr>
                <td>Título: </td>
                <td><?=$tarefa['TITULO']?></td>
            </tr>
            <tr>
                <td>Descrição:  </td>
                <td><?=$tarefa['DESC_TAREFA']?></td>
            </tr>
            <tr>
                <td>Nome do Projeto:  </td>
                <td><?=$tarefa['PROJETO']?></td>
            </tr>
            <tr>
                <td>Descrição do Projeto:  </td>
                <td><?=$tarefa['DESC_PROJETO']?></td>
            </tr>
            <tr>
                <td>Funcionário Responsável:  </td>
                <td><?=$tarefa['FUNCIONARIO']?></td>
            </tr>
            <tr>
                <td></td>
	        	<td align="right">
	        
	        		<button class="btn btn btn-danger" type="submit" onclick="window.history.back()">Voltar</button>
	        	</td>
	        </tr>
	    </table>
	</div>
</div>




<?php require_once("rodape.php"); ?>