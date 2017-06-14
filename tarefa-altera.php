<?php

require_once("logica-usuario.php");
if($_SESSION["usuario_tipo"]!=3){
    require_once("cabecalho.php");
} else{
    require_once("cabecalho-colaborador.php");
}

require_once("funcionario-banco.php");
require_once("tarefa-banco.php");


$id_tarefa = $_POST["id_tarefa"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$id_status = $_POST["status"];
$id_funcionario = $_POST['colaborador'];

if(alteraTarefa($conexao, $id_tarefa, $titulo, $descricao, $id_funcionario, $id_status)) { ?>

<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  	O cadastro da tarefa <?= $titulo; ?> foi alterado com sucesso!
</div>
            
<?php } else {
    $msg = mysqli_error($conexao);
?>
<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    O cadastro do tarefa <?= $titulo; ?> não foi alterado: <?= $msg ?>
</div>
    
<?php
}
?>

<?php require_once("rodape.php"); ?>