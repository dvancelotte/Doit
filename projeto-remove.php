<?php   require_once("conecta.php");
        require_once("projeto-banco.php");?>
<?php
    $id_projeto = $_GET['id_projeto'];
    removeProjeto($conexao,$id_projeto);
    header('Location:http://localhost/doit/projeto-consulta.php');
?>