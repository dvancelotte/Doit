<?php require_once("cabecalho.php");
	  require_once("projeto-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();

$nome = $_POST["nome"];
$gerente = $_POST["gerente"];
$descricao = $_POST["descricao"];
$colaborador = $_POST['colaborador'];


if($nome == "" || $descricao == "" || $nome == "" || $gerente =="-1"){?>
    <p class="text-danger">Campos obrigatórios não foram inseridos corretamente !</p>
    <?php include("projeto-formulario.php"); 
} else {
	if(verificaProjetoExistente($conexao, $nome) == false){

		if(insereProjeto($conexao, $nome, $descricao)){
			$message = "<p class=\"text-success\">O projeto [".$nome."] cadastrado com sucesso</p>";

			$id_projeto = mysqli_insert_id($conexao);

			//insercao do gerente
			insereEquipe($conexao, $id_projeto, $gerente);

			//insercao dos colaboradores
			foreach ($colaborador as $key => $value) {
				insereEquipe($conexao, $id_projeto, $value);
			}
			$sucesso = true;

		} else {
			$msg = mysqli_error($conexao);
			$message = "<p class=\"text-danger\">O projeto [".$nome."] não foi cadastrado: ".$msg."</p>";
			$sucesso = false;
		}

		echo $message;
		if($sucesso){
			include("projeto-consulta.php");
		}
	} else{ ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                Não foi possível completar a operação. Projeto existente no sistema.
            </div>
            <?php include("projeto-consulta.php"); ?>
    <?php }
}



?>

<?php require_once("rodape.php"); ?>