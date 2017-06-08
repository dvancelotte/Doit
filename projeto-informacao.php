<?php require_once("cabecalho.php"); 
      require_once("conecta");
      require_once("projeto_banco");

$id_projeto = $_GET['id_projeto']
$projeto = todaInformacaoProjeto($id_projeto);

?>

<tr>
    <td class="col-md-3">Nome: </td>
    <td class="col-md-10"><input class="form-control" type="text" name="nome" onblur="validaNome()"  value="<?=$projeto['nome']?>" /></td>
</tr>
<tr>
    <td class="col-md-3">Descrição:</td>
    <td class="col-md-10"><textarea class="form-control" name="descricao"><?=$projeto['descricao']?></textarea></td>
</tr>

<tr>
    <td class="col-md-3">Gerente do Projeto:</td>
    <td class="col-md-10"><input class="form-control" type="text" name="gerente" value="<?=$gerente['gerete']?>" /></td>
                
</tr>
<tr>
    <td>Colaboradores:</td>
    <td>
        <select class="form-control" name="colaborador[]" id="colaborador" value="<?=$colaborador['colaborador']?>" multiple>
        <?php
                echo "<script>combo_colaborador = $colaboradores;
                               $.each(combo_colaborador, function (i, item) {
                                    console.log(item.ID_FUNCIONARIO);
                                    $('#colaborador').append($('<option>', { 
                                        value: item.ID_FUNCIONARIO,
                                        text : item.NOME 
                                    }));
                                }); 
                              
               </script>";
            ?>
</select>       
    </td>
</tr>
<?php require_once("rodape.php"); ?>