<form action="insert" method="post">
    <input class="input" type="text" name="input_product" placeholder="producto" required>
    <input class="input" type="text" name="input_description" placeholder="descripción" required>
    <input class="input" type="text" name="input_material" placeholder="material" required>
    <input class="input" type="number" name="input_price" placeholder="precio" required>
    <input class="input" type="number" name="input_stock" placeholder="stock" required>

    <select name="select_category">
        {foreach from=$categorys item=category}
            <option value="{$category->id_categoria}">{$category->nombre_categoria}</option>
        {/foreach}
    </select>
    
    <button class="btn" type="submit">agregar</button>
</form>