<tr>
    <td>Título: <span>*</span></td>
    <td><input class="form-control" type="text" name="titulo" value="<?=$projeto['titulo']?>" /></td>
</tr>
<tr>
    <td>Descrição:  <span>*</span></td>
    <td><textarea class="form-control" name="descricao"></textarea></td>
</tr>

<tr>
    <td>Responsável: <span>*</span></td>
    <td>
        <select class="form-control" name="colaborador" id="colaborador" value="<?=$colaborador['colaborador']?>">
        <option value="-1">Selecionar</option>
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
