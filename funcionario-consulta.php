<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();


if(!$funcionario)
    $funcionario = listaFuncionario($conexao, "funcionario");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-consulta-div" id="funcionario-consulta-div">
        <h1 id="h1_consulta">Consulta Funcionários</h1>
            <form action="funcionario-consulta-nome.php" onclick="return validar()" method="post">
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
                    <th>E-mail</th>
                    <th>Cargo</th>
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

echo "<script>consulta = $funcionario ;
               var tabela = document.getElementById('tabela-consulta');
               $.each(consulta, function (i, item) {
                    if(item.nome != 'desativado'){
                    
                    var linha = tabela.insertRow(0);
                    var nome = linha.insertCell(0);
                    var email = linha.insertCell(1);
                    var tipousuario = linha.insertCell(2);
                    var botaoAlterar = linha.insertCell(3);
                    var botaoRemover = linha.insertCell(4);
                    
                    
                    nome.innerHTML = item.nome;
                    email.innerHTML = item.email;
                    tipousuario.innerHTML  = item.descricao;
                    botaoAlterar.innerHTML = '<button id=item.id_funcionario onclick=\"alterarFuncionario('+item.id_funcionario+', '+item.id_tipo_funcionario+');\"><span class=\"glyphicon glyphicon-edit\"></span><i class=\"fa fa-edit\"></i></button>';
                    
                    botaoRemover.innerHTML = '<button id=item.id_funcionario onclick=\"removerFuncionario('+item.id_funcionario+');\"><span class=\"glyphicon glyphicon-erase\"></span><i class=\"fa fa-edit\"></i></button>';
                }}); 
                
                function alterarFuncionario(idfuncionario, id_tipo_funcionario){
                    var currentLocation = window.location.href;

                    currentLocation = currentLocation.replace('funcionario-consulta.php','funcionario-altera-formulario.php?');
                    currentLocation = currentLocation.replace('funcionario-consulta-nome.php','funcionario-altera-formulario.php?');
                    currentLocation = currentLocation.replace('funcionario-cadastro.php','funcionario-altera-formulario.php?');

                    
                    var url = 'id_funcionario=' + idfuncionario + '&id_tipo_funcionario=' + id_tipo_funcionario;

                    currentLocation += url;
                    window.open(currentLocation,'_self');
                }
                
                function removerFuncionario(idfuncionario){
                    var currentLocation = window.location.href;
                    currentLocation = currentLocation.replace('funcionario-consulta.php','funcionario-remove.php?id_funcionario=');
                    currentLocation += idfuncionario;
                    
                    window.open(currentLocation,'_self');
                }

</script>";?>
