<?php
require_once("conecta.php");

function listaFuncionario($conexao) {
    $funcionarios = array();
    $resultado = mysqli_query($conexao, "select f.*, s.tipo as cod_status from funcionarios as p join status_func as s on f.cod_status = s.cod_status");
    $resultado = mysqli_query($conexao, "select * from funcionarios");
    
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($funcionarios, $funcionario);
    }

    return $funcionarios;
}

function insereFuncionario($conexao, $nome_func, $email, $senha, $cod_status) {
    $senhaMd5 = md5($senha);
    $query = "insert into funcionarios (nome_func, email, senha, cod_status)
        values ('{$nome_func}', '{$email}', '{$senhaMD5}', {$cod_status})";
    return mysqli_query($conexao, $query);
}
/*
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}*/
