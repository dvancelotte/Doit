<?php require_once("cabecalho.php");
      require_once("tarefa-banco.php");
      require_once("logica-usuario.php");
    

verificaUsuario();

$titulo = $_POST["titulo"];
$descricao = $_POST['descricao'];
$id_projeto = $_POST['id_projeto'];
$id_colaborador = $_POST['colaborador'];
echo $id_colaborador;

$status = buscaStatusTarefa($conexao);

if($titulo == "" || $descricao == "" || $id_colaborador =="-1"){?>
    <p class="text-danger">Campos obrigatórios não foram inseridos corretamente !</p>
    <?php include("tarefa-formulario.php"); ?>
<?php
    }

else{
    if(verificaTarefaExistente($conexao, $titulo) == false){

        if(insereTarefa($conexao, $titulo, $descricao, $id_projeto, $status['ID_STATUS'], $id_colaborador)) { ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                A tarefa <strong><?= $titulo; ?></strong> , foi adicionada no sistema!
            </div>
            <?php include("projeto-visaogeral.php"); ?>
    <?php } 

        else {
            $msg = mysqli_error($conexao);
        ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                O Título <?= $titulo; ?> não foi adicionado no sistema: <?= $msg ?>. Entre em contato com o administrador.
            </div>
            <?php include("funcionario-consulta.php"); ?>
            <p class="text-danger"></p>
        <?php
        }
    }
    else{ ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                Não foi possível completar a operação. Tarefa existente no sistema.
            </div>
            <?php include("funcionario-consulta.php"); ?>
    <?php }
}
?>


<?php require_once("rodape.php"); ?>