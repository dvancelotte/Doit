<?php require_once("cabecalho.php");
      require_once("banco-status_func.php");
      require_once("logica-usuario.php");

verificaUsuario();

$funcionario = array("nome_func" => "", "email" => "", "senha" => "", "cod_status" => "1");
//$usado = "";

$tipo_funcs = listaTiposFuncs($conexao);
?>

<h1>Formulário de Funcionários</h1>
<form action="adiciona-funcionario.php" method="post">
    <table class="table">

        <?php include("funcionario-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>
