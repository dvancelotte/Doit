<?php require_once("cabecalho.php");
      require_once("banco-funcionario.php");
      require_once("logica-usuario.php");

verificaUsuario();

$nome_func = $_POST["nome_func"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cod_status = $_POST['cod_status'];


if(insereFuncionario($conexao, $nome_func, $email, $senha, $cod_status)) { ?>
    <p class="text-success">O funcionario <?= $nome_func; ?>, adicionado no sistema!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O funcionário <?= $nome; ?> não foi adicionado no sistema: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
