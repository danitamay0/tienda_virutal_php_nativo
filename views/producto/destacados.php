
    


      <section class='principal'>
      <h2>Productos destacados</h2>
      
        <section class='productos'>
       
        <?php  while($producto = $productos->fetch_object()): ?>
            <article class='producto'>
                <img class="imagen_producto" src="<?=base_url?>uploads/images/<?=  $producto->image ?>" alt="<?=  $producto->image ?>">
                <a class="nombre_producto" href="<?=base_url?>producto/detalle&id=<?=  $producto->id ?>"> <?=  $producto->nombre ?> </a>
                <p><?=  $producto->precio ?></p>
                <a class="button_comprar" href="<?=base_url?>producto/detalle&id=<?=  $producto->id ?>">Añadir al Carrito</a>
            </article>
         
        <?php endwhile;?>
            </section>
      </section>


 
