<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();
if(!$funcionario)
    $funcionario = listaFuncionario($conexao, "funcionario");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-div" id="projeto-div">
        <h1 id="h1_consulta">#Nome Projeto#</h1>
        <div>
            <button type="button" class="btn btn-success group-btn">Criar tarefa</button>
            <button type="button" class="btn btn-info group-btn">Informações do projeto</button>
        </div>
        <div id="funcionario-consulta">
            <table class="table table-striped" id="tableConsulta" >
              <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Responsável</th>
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

