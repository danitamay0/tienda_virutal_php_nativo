<section class='sec_table'>
<h2 class='sec_titulo'>Gestor de Productos</h2>
<?php 
        if(isset($_SESSION['producto_fallido'])):?>
        <section class="login">
            <h3 style="background:lightcoral"><?=$_SESSION['producto_fallido'] ?></h3>
        </section>
   
        <?php endif; if(isset($_SESSION['producto_exitoso'])):?>
            <section class="login">
            <h3 style="background:lightblue"><?=$_SESSION['producto_exitoso'] ?></h3>
        </section>
            
        <?php endif ?> 
<table>
<tr>
    <th>ID</th>
    <th>Nombre </th>
    <th>Precio </th>
    <th>Stock </th>
    <th>Accion </th>
</tr>
<?php 
 if($res):
   while($producto = $res->fetch_object()):  ?>
    <tr>
    <td><?=$producto->id ?></td>
    <td><?=$producto->nombre ?> </td>
    <td><?=$producto->precio ?> </td>
    <td><?=$producto->stock ?> </td>
    <td class="editar"> <a href="<?= base_url?>producto/editar&id=<?= $producto->id?>" class="button_editar">Editar</a> 
    <a href="<?= base_url?>producto/eliminar&id=<?= $producto->id?>" class="button_eliminar">Eliminar</a></td>
    </tr>
<?php endwhile; 

   else:?>
<h2>no hay productos</h2>
   <?php endif; ?>
</table>
<a class="button_crear" href="<?=base_url?>producto/crear">Crear Producto</a>


</section>

<?php 
        isset($_SESSION['producto_exitoso']) ? Utils::deleteSesion('producto_exitoso') : '';
        isset($_SESSION['producto_fallido']) ? Utils::deleteSesion('producto_fallido') : '';
                
        ?>