{include file="header.tpl"}
<article class="contenedor_cerrarSesion">
    <p class="cerrarSesion">cerrar sesión</p>
    <button class="btn_logout" type="button"><a href="logout">Logout</a></button>
</article>

<section class="contenedor_table">
    <table class="table_productos">
        <caption class="titulo_table">{$titulo}</caption>
        <thead>
            <tr>
                <th>producto</th>
                <th>descripción</th>
                <th>material</th>
                <th>precio</th>
                <th>stock</th>
            </tr>
        </thead>
        <tbody id="tabla">
            {foreach from=$productos item=producto}
                <tr>
                    <td>{$producto->nombre_producto}</td>
                    <td>{$producto->descripcion}</td>
                    <td>{$producto->material}</td>
                    <td>{$producto->precio}</td>
                    <td>{$producto->stock}</td>
                    <td class="excepcion"><button type="button"><a href="edit/{$producto->id_producto}">editar</a></button></td>
                    <td class="excepcion"><button id="btn_borrar" type="button"><a href="delete/{$producto->id_producto}">eliminar</a></button></td>
                </tr>   
            {/foreach}
        </tbody>
    </table>
</section> 

<!--FORMULARIO PARA INSERTAR PRODUCTO-->
{include file="createProduct.tpl"}

<!--TABLA DE CATEGORIAS-->
<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">tabla de categorías</caption>
        <caption id="alert">si se elimina una categoría los productos asociados a la misma también serán eliminados
            <button id="btn_alert" type="button" class="sowAlert">
                <span>&times;</span>
            </button>
        </caption>
        <thead> 
            <tr>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody id="tabla">
            {foreach from=$categorys item=category}
                <tr>
                    <td>{$category->nombre_categoria}</td>
                    <td class="excepcion"><button  type="button"><a href="editCategory/{$category->id_categoria}">editar</a></button></td>
                    <td class="excepcion"><button  type="button"><a href="deleteCategory/{$category->id_categoria}">eliminar</a></button></td>
                </tr>   
            {/foreach}
        </tbody>
    </table>
</section> 

<!--FORMULARIO PARA INSERTAR UNA CATEGORIA-->
{include file="createCategory.tpl"}

{include file="footer.tpl"}