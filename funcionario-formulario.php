<?php require_once("cabecalho.php");
      require_once("banco-consulta-sql.php");
      require_once("logica-usuario.php");

verificaUsuario();

$funcionario = array("nome" => "", "email" => "", "senha" => "", "cod_status" => "");

$tipo_funcionario = listaTipos($conexao, "tipo_funcionario");
?>

 <script>
    function validaSenha(){
        
       //valida senha    
       CSenha = document.getElementById('Csenha');
       Senha = document.getElementById('senha');
       if (CSenha.value != Senha.value) {
           alert("Senhas diferentes. \n Por gentliza insira a senha novamente"); 
           Senha.value = null;
           CSenha.value = null;
           Senha.focus();
       }
    }
 </script>


<div class="contanier-fluid">
    <div class="col-md-9 col-md-offset-2 funcionario-div">
        <h1>Cadastro Funcionário</h1>
        <form action="funcionario-cadastro.php" onclick="return validar()" method="post">
            <table class="table funcionario">
                <?php include("funcionario-formulario-base.php"); ?>
                <tr>
                    <td></td>
                    <td align="right"><button class="btn btn btn-danger" type="submit">Cancelar</button> <button class="btn btn-primary" type="submit">Cadastrar</button></td>
                </tr>
            </table>
        </form>
        <span>* Campos obrigatórios</span>
    </div>
</div>
<?php require_once("rodape.php"); ?>
