<?php

require_once("conecta.php");

function listaTipos($conexao, $tabela) {
    
    $query = "SELECT * FROM $tabela";
    $resultado = mysqli_query($conexao, $query);
    $rows = array();
    
    if($resultado){
        while($row = mysqli_fetch_assoc($resultado)) {
            $rows[] = $row;        
        }
              
    }
    return json_encode($rows);
}
