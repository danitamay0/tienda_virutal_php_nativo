<section class="contenido">

<?php  if(isset($_SESSION['categoriaCreada'])):?>
            <section class="login">
            <h3 style="background:lightblue">categoria Creada</h3>
        </section>

  <?php endif ?>    
  <?php  if(isset( $_SESSION['error']['categoria'])):?>
            <section class="login">
            <h3 style="background:lightblue"><?= $_SESSION['error']['categoria'] ?></h3>
        </section>

  <?php endif ?> 
  
    <section class="login">
    <form action="<?=base_url?>categoria/save" method="POST">
        <input class="input_crear" type="text"  required name="nombre"placeholder="Nombre categoria">
        <button type="submit" class="button_crear" c name="crear">CrearCategoria</button>
    </form>
    </section>
</section>

<?php 
        isset($_SESSION['categoriaCreada']) ? Utils::deleteSesion('categoriaCreada') : '';
        isset($_SESSION['error']) ? Utils::deleteSesion('error') : '';
                
        ?>