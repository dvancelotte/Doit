<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php"); ?>

<?php

$id_funcionario = $_POST["id_funcionario"];
$nome_func = $_POST["nome"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$tipo_usuario = $_POST['tipo_usuario'];

if(alteraFuncionario($conexao, $id_funcionario, $nome_func, $email, $senha, $tipo_usuario)) { ?>
    <p class="text-success">O cadastro do funcionário <?= $nome; ?> foi alterado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O cadastro do funcionário <?= $nome; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>