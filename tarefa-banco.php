    <?php
require_once("conecta.php");

function buscaStatusTarefa($conexao){

    $query = "SELECT ID_STATUS FROM STATUS WHERE  TIPO = 'NOVO'; ";

    $resultado = mysqli_query($conexao, $query);

    
    return mysqli_fetch_assoc($resultado);
}


function insereTarefa($conexao, $titulo, $descricao, $id_projeto, $id_status, $id_funcionario) {

    $query = "INSERT INTO TAREFA (TITULO, DESCRICAO, FK_STATUS, FK_PROJETO, FK_FUNCIONARIO)
            VALUE ('{$titulo}', '{$descricao}', {$id_status}, {$id_projeto}, {$id_funcionario});";

    echo $query;

    return mysqli_query($conexao, $query);
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