<?php   require_once("conecta.php");
        require_once("funcionario-banco.php");?>
<?php
    $id_funcionario = $_GET['id_funcionario'];
    removeFuncionario($conexao,$id_funcionario);
    header("Location:funcionario-consulta.php");
?>