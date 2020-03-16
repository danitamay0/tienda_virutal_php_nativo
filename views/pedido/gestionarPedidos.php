<section class='contenido'>
<?php
if ( isset($_SESSION['login'])):?>
   <?php $titulo = $_SESSION['pedido']="completado" ? "Pedido  Completado" :  "El Pedido No pudo ser procesado";?>


   <section class="login">
        <h3><?=$titulo?></h3>
      

        <section>
        <h3>Datos del pedido</h3>

        <table class="carrito">
         <tr>
        <th>N° Pedido</th>
        <th>Costo </th>
        <th>Fecha </th> 
        <th>Estado </th>   </tr>
    <?php 
    
    if (isset($info_pedido)) :
        
        while($result = $info_pedido->fetch_object()):  ?>
 
        <td><a href="<?=base_url?>pedido/detalle&id=<?=$result->id ?>"><?=$result->id ?>  </a>  </td>
        <td><?=$result->coste ?> </td>
        <td><?=$result->fecha ?> </td>
        <td><?=$result->estado ?> </td>
        </tr>
        
    <?php  endwhile; ?>
<?php endif; ?>
    </table>


    </section>
    </section>

<?php endif ?>  

</section>