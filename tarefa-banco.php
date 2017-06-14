    <?php
require_once("conecta.php");


function alteraTarefa($conexao, $id_tarefa, $titulo, $descricao, $id_funcionario, $id_status){

    $query = "UPDATE TAREFA set TITULO = '{$titulo}', DESCRICAO = '{$descricao}', FK_FUNCIONARIO = {$id_funcionario}, FK_STATUS = {$id_status} where ID_TAREFA = {$id_tarefa}; ";
    
    return mysqli_query($conexao, $query);
}

function buscaStatusTarefa($conexao){

    $query = "SELECT ID_STATUS FROM STATUS WHERE  TIPO = 'NOVO'; ";

    $resultado = mysqli_query($conexao, $query);

    
    return mysqli_fetch_assoc($resultado);
}

function listaTarefas($conexao, $id_projeto){
    $query = "SELECT T.ID_TAREFA, T.TITULO, F.ID_FUNCIONARIO, F.NOME AS RESPONSAVEL, S.*, T.FK_PROJETO AS ID_PROJETO FROM TAREFA T, FUNCIONARIO F, STATUS S WHERE FK_PROJETO = '{$id_projeto}' AND F.ID_FUNCIONARIO = T.FK_FUNCIONARIO AND S.ID_STATUS = T.FK_STATUS;";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;   
        }
              
    }

    return json_encode($rows);
}

function listaStatus($conexao){

    $query = "SELECT * FROM STATUS";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;   
        }
              
    }

    return json_encode($rows);
}

function insereTarefa($conexao, $titulo, $descricao, $id_projeto, $id_status, $id_funcionario) {

    $query = "INSERT INTO TAREFA (TITULO, DESCRICAO, FK_STATUS, FK_PROJETO, FK_FUNCIONARIO)
            VALUE ('{$titulo}', '{$descricao}', {$id_status}, {$id_projeto}, {$id_funcionario});";

    echo $query;

    return mysqli_query($conexao, $query);
}

function buscaTarefa($conexao, $id_tarefa){
    $query = "select * from TAREFA T where T.ID_TAREFA = {$id_tarefa}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function verificaTarefaExistente($conexao, $titulo) {
    $query = "select count(ID_TAREFA) AS numeroRegistros from TAREFA WHERE TITULO = '{$titulo}';";
    $resultado = mysqli_query($conexao,$query);
    $numRegistros = mysqli_fetch_assoc($resultado);
    $count = $numRegistros['numeroRegistros'];
    
    echo($count);
    
    if($count > 0){
        return true;
    }
    else
    {
        return false;
    }
}