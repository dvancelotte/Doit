<tr>
    <td>Título: <span>*</span></td>
    <td><input class="form-control" type="text" name="titulo" value="<?=$tarefas['TITULO']?>" /></td>
</tr>
<tr>
    <td>Descrição:  <span>*</span></td>
    <td><textarea class="form-control" name="descricao"><?=$tarefas['DESCRICAO']?></textarea></td>
</tr>
<tr>
    <td>Status: <span>*</span></td>
    <td>
        <?php
                if($id_status == NULL){
                    ?><b>NOVO</b>
            <?php
                } else {
                ?>
                <select class="form-control" name="status" id="status" value="<?=$status['TIPO']?>">
                <option value="-1">Selecionar</option>
            <?php
                echo "<script>combo_status = $status;
                        $.each(combo_status, function (i, item) {
                            console.log(item.ID_STATUS);
                            if (item.ID_STATUS == ". $id_status .") {

                                $('#status').append($('<option>', { value: item.ID_STATUS,  text : item.TIPO, selected: true }));
                            } else {
                                $('#status').append($('<option>', { value: item.ID_STATUS,  text : item.TIPO }));
                            }
                        }); 
                        </script>";
               ?></select>
             <?php
                }
            ?>
    </td>
</tr>

<tr>
    <td>Responsável: <span>*</span></td>
    <td>
        <select class="form-control" name="colaborador" id="colaborador">
        <option value="-1">Selecionar</option>
        <?php
                if($id_funcionario == NULL){
                    $id_funcionario = -1;
                }
                echo "<script>combo_colaborador = $colaboradores;
                        $.each(combo_colaborador, function (i, item) {
                            if (item.ID_FUNCIONARIO == ". $id_funcionario .") {

                                $('#colaborador').append($('<option>', { value: item.ID_FUNCIONARIO,  text : item.NOME, selected: true }));
                            } else {
                                $('#colaborador').append($('<option>', { value: item.ID_FUNCIONARIO,  text : item.NOME }));
                            }
                        }); 
                        </script>";
            ?>
</select>       
    </td>
</tr>