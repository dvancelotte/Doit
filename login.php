<?php require_once("banco-usuario.php");
      require_once("logica-usuario.php");   

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);


if($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválido.";
    header("Location: index.php");
    
} else {
    
    logaUsuario($usuario["email"],$usuario["fk_tipo_funcionario"]);
    if($_SESSION["usuario_tipo"] != 3)
        header("Location: projeto-consulta.php");
    else
        header("Location: funcionario-tarefas.php");
}
die();
