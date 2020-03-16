<?php 
require_once 'model/pedido.php';
    class pedidoController{
        function  hacer(){
            
            
            require_once 'views/pedido/hacer.php';
        }

        function  add(){
            if (isset($_POST['enviar'])) {
                
                if (isset($_SESSION['login'])) {
                    $usuario_id= $_SESSION['login']->id;
                    $provincia= isset($_POST['provincia']) ?  $_POST['provincia'] : false;
                    $localidad= isset($_POST['localidad']) ?  $_POST['localidad'] : false;
                    $direccion= isset($_POST['direccion']) ?  $_POST['direccion'] : false;
                    $coste=carritoController::totalPago();
                   
                    if ($provincia && $localidad && $direccion) {
                        
                        $pedido=new Pedido(null,$usuario_id,$provincia,$localidad,$direccion,$coste);
                        
                       if ($pedido->save()) {
                           $pedido->saveLineasPedidos();
                          $_SESSION['pedido']="completado";
                       } else{
                        $_SESSION['pedido']="incompleto";
                       }
                       header('Location:' . base_url . 'pedido/confirmado');
                    }


                }

               
            }
        }

        function confirmado(){
            if (isset($_SESSION['login'])) {
                
              $pedido=  new Pedido(null,$_SESSION['login']->id);
            
              
              $id_pedido=$pedido->getPedidoUsuario(1);
              
              $pedido=$pedido->getProductosPedido($id_pedido->id);

            }

            require_once 'views/pedido/confirmado.php';

            Utils::deleteSesion('carrito');

        }

       function misPedidos(){

            if (isset($_SESSION['login'])) {
                $pedido=  new Pedido(null,$_SESSION['login']->id);
                $info_pedido=$pedido->getPedidoUsuario();


            }else{
                header('Location:' . base_url);
            }

            
            require_once 'views/pedido/misPedidos.php';

       } 

       function detalle(){

        if (isset($_SESSION['login']) && isset($_GET['id'])) {
                
            $pedido=  new Pedido($_GET['id']);
          
            
            $info_pedido=$pedido->getPedido();
            $info_pedido=$info_pedido->fetch_object();
            $pedido=$pedido->getProductosPedido($info_pedido->id);

          }

          require_once 'views/pedido/detalle.php';


       }

       function gestionarPedidos(){

        if (isset($_SESSION['login']) && Utils::isAdmin()) {
            $pedido=  new Pedido(null,$_SESSION['login']->id);
            $info_pedido=$pedido->getAll();


        }else{
            header('Location:' . base_url);
        }

        
        require_once 'views/pedido/gestionarPedidos.php';

   } 
    function estado(){
        if (isset($_POST['id']) && isset($_SESSION['login']) && Utils::isAdmin()) {

            $pedido=new Pedido($_POST['id']);
            $pedido->setEstado($_POST['estado']);
             $pedido->updateEstado();

            
        }
        header('Location:'. base_url . 'pedido/gestionarPedidos' );
    }

    }

?>