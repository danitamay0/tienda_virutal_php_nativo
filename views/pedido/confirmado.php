<section class='contenido'>
<?php
if ( isset($_SESSION['carrito']) && isset($_SESSION['login'])):?>
   <?php $titulo = $_SESSION['pedido']="completado" ? "Pedido  Completado" :  "El Pedido No pudo ser procesado";?>


   <section class="login">
        <h3><?=$titulo?></h3>
        <p> Tu pedido se ha guardado con éxito , una vez realices el pago será procesado y enviado
            nuestra cuenta bancaria es 4008738763 Bancolombia 
        </p>

        <section>
        <h3>Datos del pedido</h3>

        <table class="carrito">
         <tr>
        <th>Foto</th>
        <th>Nombre </th>
        <th>Precio </th>
        <th>Unidades </th>
    </tr>
    <?php 
    if (isset($pedido)) :
        
        while($result = $pedido->fetch_object()):  ?>
 
        <td> <img src="<?=base_url?>uploads/images/<?=$result->image ?>" class="producto_img_carrito" alt=""></td>
        <td><a href="<?=base_url?>producto/detalle&id=<?=$result->id ?>"><?=$result->nombre ?>  </a>  </td>
        <td><?=$result->precio ?> </td>
        <td><?=$result->unidades ?> </td>
        </tr>
        
    <?php  endwhile; ?>
<?php endif; ?>
    </table>



        </section>
    </section>



<?php else: ?>
    
    <p> Verifica tu carrito o ponte en contacto con nosotros</p>
    
<?php endif; ?>   

</section>