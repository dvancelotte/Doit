<?php require_once("cabecalho.php");
      require_once("projeto-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();
if(!$projeto)
    $projeto = listaProjeto($conexao, "projeto");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-consulta-div" id="projeto-consulta-div">
        <h1 id="h1_consulta">Consulta Funcionários</h1>
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
               $.each(consulta, function (i, item) {
                  
                    
                    var linha = tabela.insertRow(0);
                    var nome = linha.insertCell(0);
                    var descricao = linha.insertCell(1);
                    var botaoRemover = linha.insertCell(2);
                    
                    
                    nome.innerHTML = item.nome;
                    descricao.innerHTML = item.descricao;
                        
                    botaoRemover.innerHTML = '<button id=item.id_funcionario onclick=\"removerFuncionario('+item.id_funcionario+');\"><span class=\"glyphicon glyphicon-erase\"></span><i class=\"fa fa-edit\"></i></button>';
                }); 
                
                
                function removerFuncionario(idfuncionario){
                    var currentLocation = window.location.href;
                    currentLocation = currentLocation.replace('funcionario-consulta.php','funcionario-remove.php?id_funcionario=');
                    currentLocation += idfuncionario;
                    
                    window.open(currentLocation,'_self');
                }

</script>";?>
