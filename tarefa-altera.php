<?php require_once("cabecalho.php");
      require_once("tarefa-banco.php"); ?>

<?php

$id_tarefa = $_POST["id_tarefa"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$id_status = $_POST["status"];

$id_funcionario = $_POST['colaborador'];


if(alteraTarefa($conexao, $id_tarefa, $titulo, $descricao, $id_funcionario, $id_status)) { ?>
    <p class="text-success">O cadastro da tarefa <?= $titulo; ?> foi alterado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O cadastro do tarefa <?= $titulo; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>