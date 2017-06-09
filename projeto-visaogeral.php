<?php require_once("cabecalho.php");
      require_once("funcionario-banco.php");
      require_once("logica-usuario.php");

$id_projeto = $_GET['id_projeto'];
$nome = $_GET['nome'];
verificaUsuario();

?>

<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 projeto-div" id="projeto-div">
        <h1 id="h1_consulta"><?php echo htmlspecialchars($_GET['nome']) ?></h1>
        <div>
            <button type="button" class="btn btn-success group-btn" onclick="incluirTarefa(<?=$id_projeto?>)">Criar Tarefa</button>
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

echo "<script>               
                function incluirTarefa(id_projeto){
                    var currentLocation = window.location.href;

                    currentLocation = currentLocation.replace('projeto-visaogeral.php','tarefa-formulario.php');
                    
                    window.open(currentLocation,'_self');
                }
         

</script>";?>
