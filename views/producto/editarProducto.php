<section class="contenido">
  
    <section class="login">
        <h3>Crear Producto</h3>
        <form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
            <input type="text" required placeholder="nombre" name="nombre">
            <input type="text" required  placeholder="descripcion" name="descripcion">
            <input type="texto" required  placeholder="precio" name="precio">
            <input type="number" required pattern="[0-9]+"  placeholder="stock" name="stock">
            <textarea name="oferta" id="" cols="30" rows="10"></textarea>
            <input type="file" placeholder="image" name="imagen">
            <select name="categoria" >
                    
           
            <?php 
               $cats= Utils::getAllCategorias();
                while($cat=$cats->fetch_object()): ?>
                    <option value="<?= $cat->id?>"><?= $cat->nombre?> - <?= $cat->id?> </option>

                <?php endwhile; ?>
           
            </select>
            <button type="submit" name="crear">Crear Producto</button>
        </form>
        
    </section>
</section>

