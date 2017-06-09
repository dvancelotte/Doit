<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");
    

verificaUsuario();

$nome_func = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$tipo_usuario = $_POST['tipo_usuario'];

if($nome_func == "" || $email == "" || $senha == "" || $tipo_usuario =="-1"){?>
    <p class="text-danger">Campos obrigatórios não foram inseridos corretamente !</p>
    
    <?php header('Location:/funcionario-formulario.php');
    ?>
<?php
    }

else{
    if(verificaFuncionarioExistente($conexao, $email) == false){
        if(insereFuncionario($conexao, $nome_func, $email, $senha, $tipo_usuario)) { ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                O funcionário <strong><?= $nome_func; ?></strong> , foi adicionado no sistema!
            </div>
            <?php include("funcionario-consulta.php"); ?>
    <?php } 

        else {
            $msg = mysqli_error($conexao);
        ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                O funcionário <?= $nome; ?> não foi adicionado no sistema: <?= $msg ?>. Entre em contato com o administrador.
            </div>
            <?php include("funcionario-consulta.php"); ?>
            <p class="text-danger"></p>
        <?php
        }
    }
    else{ ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                Não foi possível completar a operação. Funcionário existente no sistema.
            </div>
            <?php include("funcionario-consulta.php"); ?>
    <?php }
}
?>


<?php require_once("rodape.php"); ?>
