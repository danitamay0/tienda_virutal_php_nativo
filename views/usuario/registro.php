<section class="contenido">
    <?php 
        if(isset($_SESSION['registro'])):?>
        <section class="login">
            <h3 style="background:lightblue">Registro satisfactorio</h3>
        </section>
   
        <?php endif; if(isset($_SESSION['error']['registro'])):?>
            <section class="login">
            <h3 style="background:lightblue">Registro incorrecto</h3>
        </section>
            
        <?php endif ?> 
    <section class="login">
        <h3>Registrate</h3>
        <form action="<?=base_url?>usuario/save" method="post">
            <input type="text" required pattern="[A-Za-z]+" placeholder="nombre" name="nombre">
            <input type="text" required pattern="[A-Za-z]+" placeholder="apellido" name="apellido">
            
            <input type="email" placeholder="email" name="email" required>
            <input type="password" name="password" placeholder="password" id="" required>
            <button type="submit" name="enviar">Registrarse</button>
        </form>
        
    </section>
</section>

<?php 
        isset($_SESSION['registro']) ? Utils::deleteSesion('registro') : '';
        isset($_SESSION['error']) ? Utils::deleteSesion('error') : '';
                
        ?>