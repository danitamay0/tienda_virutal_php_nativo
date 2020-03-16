<?php if (isset($producto) && is_object($producto)) : ?>
    <section class='principal'>
    <h2 class='sec_titulo'><?=$producto->nombre?></h2>

    <section class="detalle" >
        <section class="producto_img" >
            <img src="<?=base_url ?>uploads/images/<?=$producto->image ?>" alt="">
        </section>    

        <section class="descripcion">
        <h2 class="producto_nombre"><?=$producto->nombre?> </h2>
        <h2 class="producto_descripcion"><?=$producto->descripcion?> </h2>
       
        <h3 class="producto_precio"><?=$producto->precio?> $ </h3>

        <a class="comprar" href="<?=base_url?>carrito/add&id=<?=$producto->id ?>">Añadir Al Carrito</a>

        <p class="producto_oferta"><?=$producto->oferta?> </p>
        </section>

    </section>
    </section>

 <?php endif?>   