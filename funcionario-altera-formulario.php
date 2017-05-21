<?php require_once("cabecalho.php");
      //require_once("banco-categoria.php");
      require_once("funcionario-banco.php");

$id_funcionario = $_GET['id_funcionario'];
$funcionario = buscaFuncionario($conexao, $id_funcionario);

$categorias = listaCategorias($conexao);

?>

<h1>Alterando produto</h1>
<form action="funcionario-altera.php" method="post">
    <input type="hidden" name="id" value="<?=$funcionario['id_funcionario']?>" />
    <table class="table">

        <?php include("funcionario-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>