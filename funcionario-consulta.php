<?php require_once("cabecalho.php");
      require_once("banco-consulta-sql.php");
      require_once("logica-usuario.php");

verificaUsuario();

$funcionario = array("nome" => "", "email" => "", "senha" => "", "cod_status" => "");

$tipo_funcionario = listaTipos($conexao, "tipo_funcionario");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        <h1>Funcionarios</h1>
        <form action="funcionario-consulta.php" onclick="return validar()" method="post">
            <div class="col-md-11">
                <input class="form-control" type="text" name="pesquisa" id="pesquisa" placeholder="Digite aqui a sua pesquisa"/>
            </div>
            <div class="col-md-1">
                <button class="btn btn btn-danger" type="submit">P</button>
            </div>
        </form>
    </div>
</div>
<?php require_once("rodape.php"); ?>
