<?php require_once("cabecalho.php");
	  require_once("projeto-banco.php");
      require_once("logica-usuario.php");

verificaUsuario();

$nome = $_POST["nome"];
$gerente = $_POST["gerente"];
$descricao = $_POST["descricao"];
$colaborador = $_POST['colaborador'];


if(insereProjeto($conexao, $nome, $descricao)){
	$message = "<p class=\"text-success\">O projeto [".$nome."] cadastrado com sucesso</p>";
} else {
	$msg = mysqli_error($conexao);
	$message = "<p class=\"text-danger\">O projeto [".$nome."] não foi cadastrado: ".$msg."</p>";
}

//$id_projeto = buscarProjeto($conexao, $nome);
$id_projeto = mysqli_insert_id($conexao);

//insercao do gerente
insereEquipe($conexao, $id_projeto, $gerente);
//insercao dos colaboradores
foreach ($colaborador as $key => $value) {
	insereEquipe($conexao, $id_projeto, $value);
}

echo $message;

?>

<?php require_once("rodape.php"); ?>