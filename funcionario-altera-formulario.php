<?php require_once("cabecalho.php");
      require_once("banco-consulta-sql.php");
      require_once("funcionario-banco.php");

$id_funcionario = $_GET['id_funcionario'];
$id_tipo_funcionario = $_GET['id_tipo_funcionario'];
$funcionario = buscaFuncionario($conexao, $id_funcionario);

$tabela = 'tipo_funcionario';
$tipo_funcionario = listaTipos($conexao,$tabela);

?>
<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        
        <form action="funcionario-altera.php" method="post">
             <table class="table funcionario" id="tableFuncionario">
                <tr><td colspan="2" id="title"><h1>Alterando dados de Funcionário</h1></td></tr>
                <input type="hidden" name="id_funcionario" value="<?=$funcionario['ID_FUNCIONARIO']?>" />
                <input type="hidden" name="id_tipo_funcionario" value="<?=$funcionario['id_tipo_funcionario']?>" />

                <?php include("funcionario-formulario-base.php"); ?>

                <tr>
                    <td><button class="btn btn-primary" type="submit">Alterar</button></td>
                </tr>
              </table>
        </form>
    </div>
</div>

<?php require_once("rodape.php"); ?>