<?php
    if (isset($editar)) {
        $titulo='Editar';
        $url_dir= base_url . "producto/guardarEditar&id=$pro->id";
     }else {
        $titulo='Crear';
        $url_dir=base_url . "producto/save";
     }

     ?>

<section class="contenido">
  
    <section class="login">
        <h3> <?=$titulo?> Producto</h3>
        <form action="<?=$url_dir?>" method="POST" enctype="multipart/form-data">
            <input type="text" required placeholder="nombre" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '' ?>">
            <input type="text" required  placeholder="descripcion" name="descripcion" value="<?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?>">
            <input type="texto" required  placeholder="precio" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : '' ?>">
            <input type="number" required pattern="[0-9]+"  placeholder="stock" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : '' ?>">
            <textarea name="oferta" id="" cols="30" rows="10" > <?= isset($pro) && is_object($pro) ? $pro->oferta : '' ?></textarea>

            
            <?php if (isset($pro) && is_object($pro) && !empty($pro->image)): ?>
                <img class="preview_image" src="<?=base_url?>uploads/images/<?=$pro->image?>" alt="<?=$pro->image?>">
            <?php endif;?>
        


            <?php if (isset($editar)): ?>
                <input type="file" placeholder="image" name="imagen" >
            <?php else:?>
            <input type="file" placeholder="image" name="imagen" required >
            <?php endif?>
            <select name="categoria" >
                    
           
            <?php 
               $cats= Utils::getAllCategorias();
                while($cat=$cats->fetch_object()): ?>
                    <option value="<?= $cat->id?>" <?= isset($pro) && is_object($pro) && $cat->id== $pro->categoria_id ? 'selected' : '';?>> <?= $cat->nombre?> - <?= $cat->id?></option>

                <?php endwhile; ?>
           
            </select>
            <button type="submit" name="crear">Crear Producto</button>
        </form>
        
    </section>
</section>

