<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");
    

verificaUsuario();

$pesquisa = $_POST["pesquisa"];

if($pesquisa == ""){?>
    <?php include("projeto-consulta.php"); ?>
<?php
    }

else{
    if($funcionario = pesquisaNome($conexao, $pesquisa)){
        if ($projeto=="[]"){ ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            Nenhum resultado encontrado
        </div>
<?php
        $projeto = "";
        }
        include("projeto-consulta.php");
    }
    else{
        $msg = mysqli_error($conexao);?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           Não foi possível realizar a consulta: <?= $msg ?>. Entre em contato com o administrador.
        </div>
   <?php include("projeto-consulta.php");
    }
}
?>


<?php require_once("rodape.php"); ?>