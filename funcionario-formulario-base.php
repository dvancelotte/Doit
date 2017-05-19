<tr>
    <td>Nome</td>
    <td><input class="form-control" type="text" name="nome" value="<?=$funcionario['nome_func']?>" /></td>
</tr>

<tr>
    <td>E-mail</td>
    <td><input class="form-control" type="email" name="email" value="<?=$funcionario['email']?>">
    </td>
</tr>

<tr>
    <td>Senha</td>
    <td><input class="form-control" type="password" name="senha" value="<?=$funcionario['senha']?>" /></td>
</tr>

<tr>
    <td>Usuário</td>
    <td>
        <select class="form-control" name="tipo_usuario">
            <?php foreach($tipo_funcs as $tipo_func) :
                $esseEhoTipo = $funcionario['cod_status'] == $tipo_func['cod_status'];
                $selecao = $esseEhoTipo ? "selected='selected'" : "";
            ?>
                <option value="<?=$tipo_func['cod_status']?>" <?=$selecao?>>
                    <?=$tipo_func['tipo']?>
                </option>
            <?php endforeach ?>
        </select>
    </td>
</tr>
