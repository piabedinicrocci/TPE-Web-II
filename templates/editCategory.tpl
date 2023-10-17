{include file="header.tpl"}

<h1>editar categoria</h1>
<form action="updateCategory/{$category->id_categoria}" method="post">
    <input class="input" type="text" name="edit_category" placeholder="categoria" value="{$category->nombre_categoria}" required>

    <button class="btn" type="submit">actualizar</button>
</form>

{include file="footer.tpl"}