<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();
$funcionario = array("nome" => "", "email" => "", "senha" => "", "cod_status" => "");
$funcionario = listaFuncionario($conexao, "funcionario");
?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        <h1>Consulta Funcionários</h1>
            <div class="col-md-11">
                <input class="form-control" type="text" name="pesquisa" id="pesquisa" placeholder="Digite um nome para pesquisar"/>
            </div>
            <div class="col-md-1">
                <button class="btn btn btn-danger" type="submit">P</button>
            </div>
        <div id="funcionario-consulta">
            <table class="table table-striped" id="tableConsulta" >
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Cargo</th>
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
               console.log($('#tabela-consulta'));
               $.each(consulta, function (i, item) {
                    var linha = tabela.insertRow(0);
                    
                    var nome = linha.insertCell(0);
                    var email = linha.insertCell(1);
                    var tipousuario = linha.insertCell(2);
                    var botaoAlterar = linha.insetCell(3);
                    
                    
                    nome.innerHTML = item.nome;
                    email.innerHTML = item.email;
                    tipousuario.innerHTML = item.descricao;
                    
   
                }); 

</script>";?>
