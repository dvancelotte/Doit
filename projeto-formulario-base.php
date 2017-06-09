<tr>
    <td class="col-md-3">Nome: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="text" name="nome" onblur="validaNome()"  value="<?=$projeto['nome']?>" /></td>
</tr>
<tr>
    <td class="col-md-3">Descrição:<span>*</span></td>
    <td class="col-md-10"><textarea class="form-control" name="descricao"><?=$projeto['descricao']?></textarea></td>
</tr>

<tr>
    <td class="col-md-3">Gerentes disponíveis:<span>*</span></td>
    <td class="col-md-10">
        <select class="form-control" name="gerente" id="gerente" value="<?=$gerente['gerente']?>">
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
<tr>
    <td>Colaboradores disponíveis:</td>
    <td>
        <select class="form-control" name="colaborador[]" id="colaborador" value="<?=$colaborador['colaborador']?>" multiple>
        <?php
                echo "<script>combo_colaborador = $colaboradores;
                                console.log(combo_colaborador);
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
    