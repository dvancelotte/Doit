<tr>
    <td class="col-md-3">Nome: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="text" name="nome" onblur="validaNome()" value="<?=$nome_func?>" /></td>
</tr>

<tr>
    <td class="col-md-3">E-mail: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="email" name="email" value="<?=$email?>">
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

        <select class="form-control" name="tipo_usuario" id="tipo_usuario" value="<?=$funcionario['tipo_usuario']?>">

            <option value="-1">Selecionar</option>
            <?php
                echo "<script>tipo_combo = $tipo_funcionario;
                               $.each(tipo_combo, function (i, item) {
                                    console.log(item.ID_TIPO_FUNCIONARIO);
                                    $('#tipo_usuario').append($('<option>', { 
                                        value: item.ID_TIPO_FUNCIONARIO,
                                        text : item.DESCRICAO 
                                    }));
                                }); 
               </script>";
            ?>

        </select>
    </td>
</tr>
          