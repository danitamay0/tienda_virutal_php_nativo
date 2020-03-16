<section class='principal'>
   

<?php if(isset($categoria)):?>
    <h2><?= $categoria->nombre?> </h2>
<?php else: ?> 
    <h2>La categoría no existe</h2>
<?php endif ?>   
 <section class='productos'>
    <?php if($productoCategoria->num_rows > 0):?>
        <?php  while($producto = $productoCategoria->fetch_object()): ?>
            <article class='producto'>
                <img class="imagen_producto" src="<?=base_url?>uploads/images/<?=  $producto->image ?>" alt="<?=  $producto->image ?>">
                
                <a class="nombre_producto" href="<?=base_url?>producto/detalle&id=<?=  $producto->id ?>"> <?=  $producto->nombre ?> </a>
                <p><?=  $producto->precio ?></p>
                <a class="button_comprar" href="<?=base_url?>producto/detalle&id=<?=  $producto->id ?>">Comprar</a>
            </article>
         
        <?php endwhile;?>
    <?php else: ?> 
    <h2>No hay productos en esta secccion</h2>
    <?php endif ?>   


</section>
</section>