<?php require_once("cabecalho.php");
      require_once("projeto-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();
if(!$projeto)
    $projeto = listaProjeto($conexao);

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-consulta-div" id="projeto-consulta-div">
        <h1 id="h1_consulta">Consulta Projetos</h1>
            <form action="projeto-consulta-nome.php" onclick="return validar()" method="post">
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
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>#</th>
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

echo "<script>consulta = $projeto ;
               var tabela = document.getElementById('tabela-consulta');
               console.log(consulta);
               $.each(consulta, function (i, item) {
                  
                    
                    var linha = tabela.insertRow(0);
                    var nome = linha.insertCell(0);
                    var descricao = linha.insertCell(1);
                    var botaoVisualizar = linha.insertCell(2);
                    var botaoRemover = linha.insertCell(3);
                    
                    console.log('\"'+item.nome+'\"');
                    
                    nome.innerHTML = item.nome;
                    descricao.innerHTML = item.descricao;
                    botaoVisualizar.innerHTML = '<button id=item.id_projeto onclick=\"visualizarProjeto('+item.id_projeto+',\''+item.nome+'\');\">  <span class=\"glyphicon glyphicon-eye-open\"></span><i class=\"fa fa-edit\"></i></button>';
                    botaoRemover.innerHTML = '<button id=item.id_projeto onclick=\"removerFuncionario('+item.id_projeto+');\"><span class=\"glyphicon glyphicon-trash\"></span><i class=\"fa fa-edit\"></i></button>';
                }); 
                
                function visualizarProjeto(idprojeto,nome){
                     var currentLocation = window.location.href;

                    currentLocation = currentLocation.replace('projeto-cadastro.php','projeto-visaogeral.php?');
                    currentLocation = currentLocation.replace('projeto-consulta-nome.php','projeto-visaogeral.php?');
                    currentLocation = currentLocation.replace('projeto-consulta.php','projeto-visaogeral.php?');
                    currentLocation = currentLocation.replace('tarefa-cadastro.php','projeto-visaogeral.php?');
                    
                    var url = 'id_projeto=' + idprojeto + '&nome=' + nome; 

                    currentLocation += url;
                    window.open(currentLocation,'_self');
                }
                     
                function removerFuncionario(idprojeto){
                    var currentLocation = window.location.href;
                    currentLocation = currentLocation.replace('projeto-consulta.php','projeto-remove.php?id_projeto=');
                    currentLocation += idprojeto;
                    
                    window.open(currentLocation,'_self');
                }

</script>";?>
