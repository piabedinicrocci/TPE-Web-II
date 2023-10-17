<h1>filtrá los productos por categoría</h1>
<form action="filterCategory" method="post">
  <p>Seleciona una categoría:
    <select name="select_category">
        {foreach from=$categorys item=category}
          <option value="{$category->id_categoria}">{$category->nombre_categoria}</option>
        {/foreach}
    </select>
    <button class="btn" type="submit">filtrar</button>
    <button  type="button"><a href="home">ver todo</a></button>
  </p>
</form>