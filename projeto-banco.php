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
