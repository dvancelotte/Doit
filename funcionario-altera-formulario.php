<?php require_once("cabecalho.php");
      require_once("banco-consulta-sql.php");
      require_once("funcionario-banco.php");

$id_funcionario = $_GET['id_funcionario'];
$id_tipo_funcionario = $_GET['id_tipo_funcionario'];
$funcionario = buscaFuncionario($conexao, $id_funcionario);
$tabela = 'tipo_funcionario';
$tipo_funcionario = listaTipos($conexao,$tabela);

echo $id_tipo_funcionario;
?>

<h1>Alterando dados de Funcionário</h1>
<form action="funcionario-altera.php" method="post">
    <input type="hidden" name="id_funcionario" value="<?=$funcionario['id_funcionario']?>" />
    <input type="hidden" name="id_tipo_funcionario" value="<?=$funcionario['id_tipo_funcionario']?>" />
    <table class="table">

        <?php include("funcionario-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>