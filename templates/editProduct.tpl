{include file="header.tpl"}

<h1>editar producto</h1>
<form action="update/{$producto->id_producto}" method="post">

    <input class="input" type="text" name="edit_product" placeholder="producto" value="{$producto->nombre_producto}" required>
    <input class="input" type="text" name="edit_description" placeholder="descripción" value="{$producto->descripcion}" required>
    <input class="input" type="text" name="edit_material" placeholder="material" value="{$producto->material}" required>
    <input class="input" type="number" name="edit_price" placeholder="precio" value="{$producto->precio}" required>
    <input class="input" type="number" name="edit_stock" placeholder="stock" value="{$producto->stock}" required>

    <select name="select_category">
        {foreach from=$categorys item=category}
            {if $category->id_categoria == $producto->id_categoria}
                <option selected="{$category->id_categoria}">{$category->nombre_categoria}</option>
            {else}
                <option value="{$category->id_categoria}">{$category->nombre_categoria}</option>
            {/if}
        {/foreach}
    </select>

    <button class="btn" type="submit">actualizar</button>
</form>

{include file="footer.tpl"}