<?php 

require_once("logica-usuario.php");

if($_SESSION["usuario_tipo"]!=3){
    require_once("cabecalho.php");
} else{
    require_once("cabecalho-colaborador.php");
}

require_once("banco-consulta-sql.php");
require_once("funcionario-banco.php");
require_once("tarefa-banco.php");

error_reporting(0);
$id_tarefa = $_GET['id_tarefa'];
$tarefas = buscaTarefa($conexao, $id_tarefa);

$id_projeto = $_GET['id_projeto'];
$id_funcionario = $_GET['id_funcionario'];
$id_status = $_GET['id_status'];

  if($colaboradores == NULL){
    $colaboradores = listaFuncionarioDoProjeto($conexao, $id_projeto, "COLABORADOR");
  }

  if($status == NULL){
    $status = listaStatus($conexao);
  }

  if ($_GET['erro'] != NULL){
    ?>
    <p class="text-danger">Campos obrigatórios não foram inseridos corretamente !</p>
  <?php   
  }

?>
<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        
        <form action="tarefa-altera.php" method="post">
             <table class="table funcionario" id="tableFuncionario">
                <tr><td colspan="2" id="title"><h1>Alterando os dados da Tarefa</h1></td></tr>
                <input type="hidden" name="id_tarefa" value="<?=$id_tarefa?>" />

                <?php include("tarefa-formulario-base.php"); ?>

                <tr>
                    <td><button class="btn btn-primary" type="submit">Alterar</button></td>
                </tr>
              </table>
        </form>
    </div>
</div>

<?php require_once("rodape.php"); ?>