<section class='sec_table'>
<h2 class='sec_titulo'>Gestor de Categorias</h2>
<table>
<tr>
    <th>ID</th>
    <th>Nombre </th>
</tr>
<?php 

   while($category = $resultado->fetch_object()):  ?>
    <tr>
    <td><?=$category->id ?></td>
    <td><?=$category->nombre ?> </td>
    </tr>
<?php endwhile; ?>
</table>
<a class="button_crear" href="<?=base_url?>categoria/crear">Crear Categoria</a>

</section>