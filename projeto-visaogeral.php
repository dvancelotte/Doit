<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("tarefa-banco.php");
      require_once("logica-usuario.php");

$id_projeto = $_GET['id_projeto'];
$nome = $_GET['nome'];
verificaUsuario();

if(!$tarefas)
    $tarefas = listaTarefas($conexao, $id_projeto);
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-div" id="projeto-div">
        <h1 id="h1_consulta"><?php echo htmlspecialchars($_GET['nome']) ?></h1>
        <div>
            <button type="button" class="btn btn-success group-btn" onclick="incluirTarefa(<?=$id_projeto?>)">Criar Tarefa</button>
            <button type="button" class="btn btn-info group-btn" onclick="getInformacao()">Informações do projeto</button>
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

echo "<script> consulta = $tarefas;
        var tabela = document.getElementById('tabela-consulta');
        console.log(consulta);
        $.each(consulta, function (i, item) {
          
            
            var linha = tabela.insertRow(0);
            var titulo = linha.insertCell(0);
            var responsavel = linha.insertCell(1);
            var status = linha.insertCell(2);
            var botaoAlterar = linha.insertCell(3);
            console.log('\"'+item.nome+'\"');
            
            titulo.innerHTML = item.TITULO;
            responsavel.innerHTML = item.RESPONSAVEL;

            status.innerHTML = item.TIPO;
            botaoAlterar.innerHTML = '<button id=item.ID_TAREFA onclick=\"alterarTarefa('+item.ID_TAREFA+', '+item.ID_PROJETO+', '+item.ID_FUNCIONARIO+', '+item.ID_STATUS+');\"><span class=\"glyphicon glyphicon-edit\"></span><i class=\"fa fa-edit\"></i></button>';
        });


         function alterarTarefa(id_tarefa, id_projeto, id_funcionario, id_status){
                    var currentLocation = window.location.href;

                    currentLocation = currentLocation.replace('projeto-visaogeral.php','tarefa-altera-formulario.php');

                    var url = '&id_tarefa=' + id_tarefa + '&id_funcionario=' + id_funcionario + '&id_status=' + id_status;

                    currentLocation += url;
                    window.open(currentLocation,'_self');
                }

        function incluirTarefa(id_projeto){

            var currentLocation = window.location.href;
            currentLocation = currentLocation.replace('projeto-visaogeral.php','tarefa-formulario.php');
            window.open(currentLocation,'_self');
            
        }
       
        function getInformacao(){
            var currentLocation = window.location.href;
            currentLocation = currentLocation.replace('projeto-visaogeral.php','projeto-informacao.php');
            window.open(currentLocation,'_self');
        }

    
         

</script>";?>
