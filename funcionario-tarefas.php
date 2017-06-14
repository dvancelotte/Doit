<?php
require_once("logica-usuario.php");

if($_SESSION["usuario_tipo"]!=3)
    require_once("cabecalho.php");
else
    require_once("cabecalho-colaborador.php");

require_once("funcionario-banco.php");


verificaUsuario();

$email = $_SESSION["usuario_logado"];

if(!$funcionario) {
    $funcionario = listaFuncionario($conexao, "funcionario");
}

$tarefas = funcionarioTarefa($conexao, $email); 

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-consulta-div" id="funcionario-consulta-div">
        <h1 id="h1_consulta">Minhas Tarefas</h1>
        <div id="funcionario-consulta">
            <table class="table table-striped" id="tableConsulta" >
              <thead>
                <tr>
                    <th>Título</th>
                    <th>Projeto</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                    <th>Alterar</th>
                </tr>
              </thead>
              <tbody id="tabela-consulta">
              </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once("rodape.php"); 


echo "<script>consulta = $tarefas ;
               var tabela = document.getElementById('tabela-consulta');
               console.log(consulta);
               $.each(consulta, function (i, item) {
                  
                    
                    var linha = tabela.insertRow(0);
                    var titulo = linha.insertCell(0);
                    var projeto = linha.insertCell(1);
                    var status = linha.insertCell(2);
                    var botaoVisualizar =  linha.insertCell(3);
                    var botaoAlterar = linha.insertCell(4);
                    
                    titulo.innerHTML = item.TITULO;
                    projeto.innerHTML = item.PROJETO;
                    status.innerHTML = item.STATUS;
                    botaoVisualizar.innerHTML = '<button id=item.ID_TAREFA onclick=\"visualizarTarefa('+item.ID_TAREFA+');\">  <span class=\"glyphicon glyphicon-eye-open\"></span><i class=\"fa fa-edit\"></i></button>';
                    botaoAlterar.innerHTML = '<button id=item.ID_TAREFA onclick=\"alterarTarefa('+item.ID_TAREFA+', '+item.ID_PROJETO+', '+item.ID_FUNCIONARIO+',  '+item.ID_STATUS+');\">  <span class=\"glyphicon glyphicon-edit\"></span><i class=\"fa fa-edit\"></i></button>';
                }); 
                
                function alterarTarefa(idTarefa, idProjeto, idFuncionario, idStatus){
                    var currentLocation = window.location.href;
                    
                    currentLocation = currentLocation.replace('funcionario-tarefas.php','tarefa-altera-formulario.php?');
                    
                    var url = 'id_tarefa=' + idTarefa + '&id_projeto=' + idProjeto + '&id_funcionario=' +idFuncionario + '&id_status=' + idStatus; 
    
                    currentLocation += url;
                    window.open(currentLocation,'_self');
                }
                
                function visualizarTarefa(idTarefa){
                    var currentLocation = window.location.href;
                    
                    currentLocation = currentLocation.replace('funcionario-tarefas.php','tarefa-informacao.php?');
                    
                    var url = 'id_tarefa=' + idTarefa; 
    
                    currentLocation += url;
                    window.open(currentLocation,'_self');
                }

</script>";?>

?>
