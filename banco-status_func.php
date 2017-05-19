<?php
require_once("conecta.php");

function listaTiposFuncs($conexao) {
    $tipo_funcs = array();
    $query = "select * from status_func";
    $resultado = mysqli_query($conexao, $query);
    while($tipo_func = mysqli_fetch_assoc($resultado)) {
        array_push($tipo_funcs, $tipo_func);
    }
    return $tipo_func;
}
