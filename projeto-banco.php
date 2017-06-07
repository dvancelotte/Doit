<?php
require_once("conecta.php");

function insereProjeto($conexao, $nome_projeto, $descricao) {

    $query = "INSERT INTO projeto (nome, descricao)
            VALUE ('{$nome_projeto}', '{$descricao}');";

    return mysqli_query($conexao, $query);
}

function insereEquipe($conexao, $id_projeto, $id_funcionario){
    $query = "INSERT INTO funcionario_projeto (fk_projeto, fk_funcionario)
            VALUE ('{$id_projeto}', '{$id_funcionario}');";
    return mysqli_query($conexao, $query);    
}


function listaProjeto($conexao) {
    $query = "SELECT nome, descricao FROM PROJETO ORDER BY nome DESC;";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;   
        }
              
    }

    return json_encode($rows);
}

function removeFuncionario($conexao, $id_projeto) {
    $query = "delete from projeto where id_funcionario = {$id_projeto}";
    return mysqli_query($conexao, $query);
}