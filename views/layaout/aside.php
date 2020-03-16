<section class='wrap'>

    <aside>
        <section class="contenido">

            <section class="login">
            <h3 class="bienvenido" > MI Carrito </h3>

                <?php
                 $cantidadProductos=0;
                 $totalPago=0;
                    if (isset($_SESSION['carrito'])) {
                        $cantidadProductos=0;
                        $totalPago=carritoController::totalPago();

                        foreach ($_SESSION['carrito'] as $key => $value){
                           $cantidadProductos+= $value['unidades'];
                        }


                    }


                ?>

                <ul>
                    <li><a href="<?=base_url?>carrito/index"> Productos (<?=$cantidadProductos?>)</a> </li>
                    <li><a href="<?=base_url?>carrito/index"> Total: <?=$totalPago?>$</a> </li>
                    <li><a href="<?=base_url?>carrito/index"> Carrito</a> </li>
                    <li></li>

                </ul>

            </section>








            <section class="login">

                <?php if(isset( $_SESSION['login'])): ?>
                <h3 class='bienvenido'>Bienvenido <?=$_SESSION['login']->nombre ?> <?=$_SESSION['login']->apellido ?>
                </h3>
                <section>

                    <a href="<?= base_url?>pedido/misPedidos">Mis Pedidos</a>

                    <?php if(Utils::isAdmin()): ?>
                    <a href="<?=base_url?>pedido/gestionarPedidos">Gestion Pedidos</a>
                    <a href="<?=base_url?>producto/gestion">Gestion Productos</a>
                    <a href="<?=base_url?>categoria/index">Gestionar categoria</a>

                    <?php endif ?>
                    <a href="<?=base_url?>usuario/logout">Cerrar Sesion</a>
                </section>

                <?php else: ?>
                <h3 class="bienvenido">Inicia Sesion</h3>
                <form action="<?=base_url?>usuario/logIn" method="post">
                    <input type="email" placeholder="email" name="email">
                    <input type="password" name="password" placeholder="password" id="">
                    <button type="submit">SigIn</button>
                </form>
                <a href="<?=base_url?>usuario/registro">Regístrate</a>


                <?php endif; if(isset($_SESSION['error_login'])):?>
                <section class="login">
                    <h3 style="background:lightblue"><?=$_SESSION['error_login']?></h3>
                </section>
                <?php endif?>

            </section>

        </section>

    </aside>
    <?php
    isset($_SESSION['error_login']) ? Utils::deleteSesion('error_login') : ''; ?>