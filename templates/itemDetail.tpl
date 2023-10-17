{include file="header.tpl"}

<section class="contenedor_table">
    <table class="table">
        <caption class="titulo_table">tabla de producto</caption>
        <thead>
            <tr>
                <th>producto</th>
                <th>descripción</th>
                <th>precio</th>
                <th>stock</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{$producto->nombre_producto}</td>
                    <td>{$producto->descripcion}</td>
                    <td>{$producto->precio}</td>
                    <td>{$producto->stock}</td>
                </tr>
        </tbody>
    </table>

     <table class="table">
        <caption class="titulo_table">detalles acerca del producto</caption>
        <thead>
            <tr>
                <th>categoria</th>
                <th>material</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{$category->categoria}</td>
                    <td>{$producto->material}</td>
                </tr>   
        </tbody>
    </table>
</section> 
{include file="footer.tpl"}