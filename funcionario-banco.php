<?php
require_once("conecta.php");

function listaFuncionario($conexao) {
    $resultado = mysqli_query($conexao, "SELECT f.id_funcionario, f.nome, f.email , TF.descricao, TF.id_tipo_funcionario  FROM funcionario f, tipo_funcionario TF 
	WHERE TF.id_tipo_funcionario = f.fk_tipo_funcionario order by f.nome desc;");
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

function funcionarioTarefa($conexao, $email) {
    $query = "SELECT P.NOME AS PROJETO, P.ID_PROJETO, T.TITULO, T.ID_TAREFA, S.ID_STATUS, S.TIPO AS STATUS, F.ID_FUNCIONARIO FROM TAREFA T, PROJETO P, FUNCIONARIO F, STATUS S WHERE F.EMAIL = '{$email}' AND T.FK_STATUS = S.ID_STATUS AND T.FK_PROJETO = P.ID_PROJETO AND T.FK_FUNCIONARIO = F.ID_FUNCIONARIO;";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

function listaTipoUsuario($conexao){
    $resultado = mysqli_query($conexao, "SELECT ID_TIPO_FUNCIONARIO, DESCRICAO FROM tipo_funcionario TF;");
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

function pesquisaFuncionario($conexao, $nome) {
    $resultado = mysqli_query($conexao, "SELECT f.id_funcionario, f.nome, f.email , TF.descricao FROM funcionario f, tipo_funcionario TF 
	WHERE f.nome like '%{$nome}%' and TF.id_tipo_funcionario = f.fk_tipo_funcionario order by f.nome desc;");
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

function alteraFuncionario($conexao, $id_funcionario, $nome_func, $email, $senha, $tipo_usuario) {
    $senhaMD5 = md5($senha);
    $query = "UPDATE funcionario set NOME = '{$nome_func}', EMAIL = '{$email}', SENHA = '{$senhaMD5}', FK_TIPO_FUNCIONARIO = {$tipo_usuario} where ID_FUNCIONARIO = {$id_funcionario}";
    return mysqli_query($conexao, $query);
}


function buscaFuncionario($conexao, $id_funcionario) {
    $query = "select * from funcionario where id_funcionario = {$id_funcionario}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

/*
function removeFuncionario($conexao, $id_funcionario) {
    $query = "delete from funcionario where id_funcionario = {$id_funcionario}";
    return mysqli_query($conexao, $query);
}*/

function removeFuncionario($conexao, $id_funcionario){
    $query = "update funcionario set nome = 'desativado', email = 'desativado{$id_funcionario}@desativado.com' where id_funcionario = {$id_funcionario};";
    $resultado = mysqli_query($conexao,$query);
    return mysqli_fetch_assoc($resultado);
}

function verificaFuncionarioExistente($conexao, $email) {
    $query = "select count(ID_FUNCIONARIO) AS numeroRegistros from funcionario WHERE EMAIL = '{$email}';";
    $resultado = mysqli_query($conexao,$query);
    $numRegistros = mysqli_fetch_assoc($resultado);
    $count = $numRegistros['numeroRegistros'];
    
    if($count > 0){
        return true; //existe funcionario
    }
    else
    {
        return false;
    }
}


// Lista todos os gerentes sem projetos associados.
function listaFuncionarioSemProjeto($conexao, $tipo_funcionario) {
    $resultado = mysqli_query($conexao, "select F.ID_FUNCIONARIO, F.NOME from   funcionario f, tipo_funcionario tf where tf.id_tipo_funcionario = f.fk_tipo_funcionario
        and f.id_funcionario not in (Select FK_FUNCIONARIO from EQUIPE)
        and tf.descricao = '{$tipo_funcionario}' and F.nome != 'desativado';");
    $rows = array();

    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;
        }
              
    }

    return json_encode($rows);
}

function listaFuncionarioDoProjeto($conexao, $id_projeto, $tipo_funcionario) {
    $query = "select F.ID_FUNCIONARIO, F.NOME from funcionario f, tipo_funcionario tf, equipe e where tf.id_tipo_funcionario = f.fk_tipo_funcionario and e.fk_funcionario = f.id_funcionario and e.fk_projeto = '{$id_projeto}' and tf.descricao = '{$tipo_funcionario}' and F.nome != 'desativado';";

    $resultado = mysqli_query($conexao, $query);
    $rows = array();

    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;
        }
              
    }

    return json_encode($rows);
}

function pesquisaNome($conexao, $nome) {
    $resultado = mysqli_query($conexao, "SELECT f.id_funcionario, f.nome, f.email , TF.descricao FROM funcionario f, tipo_funcionario TF WHERE TF.id_tipo_funcionario = f.fk_tipo_funcionario and f.nome like '$nome%' order by f.nome desc;");
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

