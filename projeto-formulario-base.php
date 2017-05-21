<tr>
    <td>Nome</td>
    <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>" /></td>
</tr>
<tr>
    <td>Descrição</td>
    <td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
</tr>
<?php echo $colaboradores?>
<tr>
    <td>Gerente</td>
    <td>
        <select class="form-control" name="gerente" id="gerente" value="<?=$funcionario['gerente']?>">
            <option value="-1">Selecionar</option>
            <?php
                echo "<script>combo_gerente = $gerentes;
                               $.each(combo_gerente, function (i, item) {
                                    console.log(item.ID_FUNCIONARIO);
                                    $('#gerente').append($('<option>', { 
                                        value: item.ID_FUNCIONARIO,
                                        text : item.NOME 
                                    }));
                                }); 
                              
               </script>";
            ?>
        </select>        
    </td>
</tr>
<!--<tr>
    <td>Colaboradores</td>
    <td>
        <select class="form-control" name="colaborador" id="colaborador" value="<?=$funcionario['colaborador']?>">
            <option value="-1">Selecionar</option>
            <?php
                echo "<script>combo_colaborador = $colaboradores;
                               $.each(combo_colaborador, function (i, item) {
                                    console.log(item.ID_FUNCIONARIO);
                                    $('#gerente').append($('<option>', { 
                                        value: item.ID_FUNCIONARIO,
                                        text : item.NOME 
                                    }));
                                }); 
                              
               </script>";
            ?>
        </select>        
    </td>-->
</tr>
