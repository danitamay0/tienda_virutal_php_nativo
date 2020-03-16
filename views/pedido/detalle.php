<section class='contenido'>
<?php
if (  isset($_SESSION['login'])):?>
 


      <section class="info_pedido">
        <?php if(Utils::isAdmin()):?>
            <form action="<?= base_url ?>pedido/estado" class="form_crear" method="post">
                <select name="estado" id="sel">
                    <option value="pendiente">pendiente</option>
                    <option value="preparacion">en preparacion</option>
                    <option value="preparado">preparado para enviar</option>
                    <option value="enviado">enviado</option>
                </select>
                <button type="submit"  name="id" id="sel" value="<?=$info_pedido->id?>"> Cambiar Estado </button>
        
            </form>
        <?php endif?>



      <h3 class="sec_titulo">Datos del pedido</h3>
         <h2 class="sub_titulo">Direccion de envio</h2>
        <h4>Provincia: <?=$info_pedido->provincia?> </h4>
        
        <h4>Ciudad: <?=$info_pedido->localidad?> </h4>
        
        <h4>Direccion: <?=$info_pedido->direccion?> </h4>
        
        <h2 class="sub_titulo"> Datos de Pedido</h2>
        <h4>N°: <?=$info_pedido->id?> </h4>
        <h4>Coste: <?=$info_pedido->coste?> </h4>
        <h4>Estado: <?=$info_pedido->estado?> </h4>
        
      </section> 
    

        <section>
     

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
   



<?php else: ?>
    
    <p> Verifica tu carrito o ponte en contacto con nosotros</p>
    
<?php endif; ?>   

</section>