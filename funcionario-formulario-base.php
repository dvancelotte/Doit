<tr>
    <td class="col-md-3">Nome: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="text" name="nome" onblur="validaNome()" value="<?=$funcionario['NOME']?>" /></td>
</tr>

<tr>
    <td class="col-md-3">E-mail: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="email" name="email" value="<?=$funcionario['EMAIL']?>">
    </td>
</tr>

<tr>
    <td class="col-md-3">Senha: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="password" name="senha" id ="senha" value="<?=$senha?>" /></td>
</tr>
<tr>
    <td class="col-md-3">Confirme a senha: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="password" name="Csenha" id="Csenha" onblur="validaSenha()" value="<?=$senha?>"/></td>
</tr>

<tr>
    <td class="col-md-3">Cargos: <span>*</span></td>
    <td class="col-md-10">

        <select class="form-control" name="tipo_usuario" id="tipo_usuario" value="<?=$funcionario['TIPO_USUARIO']?>">

            <option value="-1">Selecionar</option>
            <?php
                if($id_tipo_funcionario == NULL){
                    $id_tipo_funcionario = -1;
                }
                echo "<script>tipo_combo = $tipo_funcionario;
                        console.log($tipo_funcionario);
                        $.each(tipo_combo, function (i, item) {
                            console.log(item.ID_TIPO_FUNCIONARIO);
                            if (item.ID_TIPO_FUNCIONARIO == ". $id_tipo_funcionario .") {

                                $('#tipo_usuario').append($('<option>', { value: item.ID_TIPO_FUNCIONARIO,  text : item.DESCRICAO, selected: true }));
                            } else {
                                $('#tipo_usuario').append($('<option>', { value: item.ID_TIPO_FUNCIONARIO,  text : item.DESCRICAO }));
                            }
                        }); 
                        </script>"
            ?>

        </select>
    </td>
</tr>
          