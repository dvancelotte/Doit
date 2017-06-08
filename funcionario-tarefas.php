<?php
require_once("logica-usuario.php");

if($_SESSION["usuario_tipo"]!=3)
    require_once("cabecalho.php");
else
    require_once("cabecalho-colaborador.php");

require_once("funcionario-banco.php");


verificaUsuario();


if(!$funcionario)
    $funcionario = listaFuncionario($conexao, "funcionario");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-consulta-div" id="funcionario-consulta-div">
        <h1 id="h1_consulta">Minhas Tarefas</h1>
            <form action="" onclick="return validar()" method="post">
                <div class="col-md-11">
                    <input class="form-control" type="text" name="pesquisa" id="pesquisa" placeholder="Digite um nome para pesquisar"/>
                </div>
                <div class="col-md-1">
                    <button class="btn btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>
        <div id="funcionario-consulta">
            <table class="table table-striped" id="tableConsulta" >
              <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Projeto</th>
                    <th>Status</th>
                    <th>#</th>
                </tr>
              </thead>
              <tbody id="tabela-consulta">
              </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once("rodape.php"); 

?>
