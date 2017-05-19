<tr>
    <td>Nome</td>
    <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>" /></td>
</tr>
<tr>
    <td>Descrição</td>
    <td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
</tr>
<tr>
    <td>Gerente</td>
    <td>
        <select class="form-control" name="categoria_id">
            <?php foreach($categorias as $categoria) :
                $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
            ?>
                <option value="<?=$categoria['id']?>" <?=$selecao?>>
                    <?=$categoria['nome']?>
                </option>
            <?php endforeach ?>
        </select>
    </td>
</tr>
