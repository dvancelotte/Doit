<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();

$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria_id" => "1");
$usado = "";

$gerentes = listaFuncionarioSemProjeto($conexao, "GERENTE");
$colaboradores = listaFuncionarioSemProjeto($conexao, "COLABORADOR");

?>

<h1>Novo Projeto</h1>
<form action="adiciona-projeto.php" method="post">
    <table class="table">

        <?php include("projeto-formulario-base.php"); ?>
        
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>
