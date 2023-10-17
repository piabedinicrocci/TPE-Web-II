{include file="header.tpl"}

<!--SELECTOR DE CATEGORIA PARA FILTRAR-->
{include file="select-category.tpl"}

<!--TABLA CON TODOS LOS PRODUCTOS-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">{$titulo}</caption>
        <thead>
            <tr>
                <th>producto</th>
                <th>descripción</th>
                <!--<th>material</th>-->
                <th>precio</th>
                <th>stock</th>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody id="tabla">
            {foreach from=$productos item=producto}
                <tr>
                    <td>{$producto->nombre_producto}</td>
                    <td>{$producto->descripcion}</td>
                    <!--<td>{$producto->material}</td>-->
                    <td>{$producto->precio}</td>
                    <td>{$producto->stock}</td>
                    {foreach from=$categorys item=category}
                        {if $category->id_categoria == $producto->id_categoria}
                            <td>{$category->nombre_categoria}</td>
                        {/if}
                    {/foreach}
                    <td class="excepcion"><button type="button"><a href="itemDetail/{$producto->id}">ver más</a></button></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section> 
{include file="footer.tpl"}