 <section class='sec_table'>

<?php 
$pago=carritoController::totalPago();
    if(isset($_SESSION['carrito'])):?>


    <h2 class='sec_titulo'>Carrito</h2>
    <table class="carrito">
    <tr>
        <th>Foto</th>
        <th>Nombre </th>
        <th>Precio </th>
        <th>Unidades </th>
    </tr>
    <?php 

    foreach ($_SESSION['carrito'] as $key => $value) :?>
        <tr>
        <td> <img src="<?=base_url?>uploads/images/<?=$value['producto']->image ?>" class="producto_img_carrito" alt=""></td>
        <td><a href="<?=base_url?>producto/detalle&id=<?=$value['producto']->id ?>"><?=$value['producto']->nombre ?>  </a>  </td>
        <td><?=$value['precio'] ?> </td>
        <td><?=$value['unidades'] ?> </td>
        </tr>
        
    <?php endforeach; ?>

    
    </table>
    <section class="pago">
        
        <h3>Total a pagar: <?=$pago?>$ </h3>
        <a class="comprar_carrito" href="<?=base_url?>pedido/hacer">hacer pedido</a>
    </section>



 <?php endif ?>   




</section>
 