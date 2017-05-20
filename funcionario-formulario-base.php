<tr>
    <td class="col-md-3">Nome: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="text" name="nome" onblur="validaNome()" value="<?=$funcionario['nome']?>" /></td>
</tr>

<tr>
    <td class="col-md-3">E-mail: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="email" name="email" value="<?=$funcionario['email']?>">
    </td>
</tr>

<tr>
    <td class="col-md-3">Senha: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="password" name="senha" id ="senha" value="<?=$funcionario['senha']?>" /></td>
</tr>
<tr>
    <td class="col-md-3">Confirme a senha: <span>*</span></td>
    <td class="col-md-10"><input class="form-control" type="password" name="Csenha" id="Csenha" onblur="validaSenha()"/></td>
</tr>

<tr>
    <td class="col-md-3">Tipo Usuário: <span>*</span></td>
    <td class="col-md-10">
        <select class="form-control" name="tipo_usuario" id="tipo_usuario" value="<?=$funcionario['cod_status']?>">
            <option value="-1">Selecionar</option>
            <?php
                echo "<script>tipo_combo = $tipo_funcionario;
                               $.each(tipo_combo, function (i, item) {
                                    $('#tipo_usuario').append($('<option>', { 
                                        value: item.id_tipo_funcionario,
                                        text : item.descricao 
                                    }));
                                }); 
                              
               </script>";
            ?>

        </select>
    </td>
</tr>
          