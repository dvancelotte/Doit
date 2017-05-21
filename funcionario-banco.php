<?php
require_once("conecta.php");

function listaFuncionario($conexao) {
    $resultado = mysqli_query($conexao, "SELECT f.nome, f.email , TF.descricao FROM funcionario f, tipo_funcionario TF 
	WHERE TF.id_tipo_funcionario = f.fk_tipo_funcionario order by f.nome desc;");
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

function insereFuncionario($conexao, $nome_func, $email, $senha, $tipo_usuario) {
    $senhaMd5 = md5($senha);
    $query = "INSERT INTO funcionario (nome, email, senha, fk_tipo_funcionario)
            VALUE ('{$nome_func}', '{$email}', '{$senhaMd5}',{$tipo_usuario})";
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
*/
function verificaFuncionarioExistente($conexao, $email) {
    $query = "select count(ID_FUNCIONARIO) AS numeroRegistros from funcionario WHERE EMAIL = '{$email}';";
    $resultado = mysqli_query($conexao,$query);
    $numRegistros = mysqli_fetch_assoc($resultado);
    $count = $numRegistros['numeroRegistros'];
    
    echo($count);
    
    if($count > 0){
        return true; //existe funcionario
    }
    else
    {
        return false;
    }
}
