<section class='contenido'>
<?php if(isset($_SESSION['login'])):?>


    <section class="login">
        <h3>Llena los datos de tu pedido</h3>
        <form action="<?=base_url?>pedido/add" method="post">
            <input type="text" required pattern="[A-Za-z]+" placeholder="Provincia" name="provincia">
            <input type="text" required pattern="[A-Za-z]+" placeholder="Localidad" name="localidad">
            <input type="text" required  placeholder="Direccion" name="direccion">
            
            <button type="submit" name="enviar">Confirmar Pedido</button>
        </form>
        
    </section>



<?php else: ?>
    
    <h2 class='sec_titulo'>Necesitas estar identificado</h2>
    <p> necesitas loguearte para continuar</p>
    
<?php endif; ?>   

</section>