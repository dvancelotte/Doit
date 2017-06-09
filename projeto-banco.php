<?php
require_once("conecta.php");

function insereProjeto($conexao, $nome_projeto, $descricao,$gerente) {

    $query = "INSERT INTO projeto (nome, descricao,gerente)
            VALUE ('{$nome_projeto}', '{$descricao}', {$gerente});";
    echo $query;
    return mysqli_query($conexao, $query);
}

function insereEquipe($conexao, $id_projeto, $id_funcionario){
    $query = "INSERT INTO funcionario_projeto (fk_projeto, fk_funcionario)
            VALUE ('{$id_projeto}', '{$id_funcionario}');";
    return mysqli_query($conexao, $query);    
}


function listaProjeto($conexao) {
    $query = "SELECT nome, descricao, id_projeto FROM PROJETO ORDER BY nome DESC;";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;   
        }
              
    }

    return json_encode($rows);
}

function verificaProjetoExistente($conexao, $nome_projeto){

    $query = "select count(ID_PROJETO) AS numeroRegistros from projeto WHERE nome = '{$nome_projeto}';";
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

function removeProjeto($conexao, $id_projeto) {
    $queryFuncionarioProjeto = "delete from funcionario_projeto where fk_projeto = {$id_projeto};";
    $resultado1= mysqli_query($conexao,$queryFuncionarioProjeto);
    echo $queryFuncionarioProjeto;
    if($resultado1){
        $queryProjeto = "delete from projeto where id_projeto = {$id_projeto};";
    }
    
    return mysqli_query($conexao, $queryProjeto);
}

function pesquisaNomeProjeto($conexao, $nome) {
    $resultado = mysqli_query($conexao, "SELECT nome, descricao, id_projeto FROM projeto  WHERE nome like '$nome%' order by nome desc;");
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}

function todaInformacaoProjeto($conexao, $id_projeto){
    $query = "select nome, descricao, gerente from projeto where id_projeto = {$id_projeto};";
    
    $resultado = mysqli_query($conexao, $query);
    $projeto = array();
    $projeto = mysqli_fetch_assoc($resultado);
    return $projeto;
}

function gerenteDoProjeto($conexao, $id_projeto){
    $query = "select f.nome from projeto p, funcionario f where id_projeto = {$id_projeto} and p.GERENTE = f.ID_FUNCIONARIO;";
    $resultado = mysqli_query($conexao, $query);

    return mysqli_fetch_assoc($resultado);
}

function colaboradoresPorProjeto($conexao, $id_projeto){
    $query = "select f.nome, f.id_funcionario from funcionario f, funcionario_projeto FP where FP.fk_projeto = $id_projeto and FP.fk_funcionario = f.id_funcionario;";
    $resultado = mysqli_query($conexao, $query);
    $colaboradores = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $colaboradores[] = $row;        
        }
              
    }
    return json_encode($colaboradores);
    
  
}
