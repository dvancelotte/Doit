<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();

$nome_func = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$tipo_usuario = $_POST['tipo_usuario'];


if(insereFuncionario($conexao, $nome_func, $email, $senha, $tipo_usuario)) { ?>
    <p class="text-success">O funcionario <?= $nome_func; ?>, adicionado no sistema!</p>
    <?php include("funcionario-formulario-base.php"); ?>
<?php } 

else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O funcionário <?= $nome; ?> não foi adicionado no sistema: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
