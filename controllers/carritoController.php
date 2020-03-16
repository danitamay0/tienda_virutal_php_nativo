<?php 
    include 'model/producto.php';
    class carritoController{

        public function index(){

            require_once 'views/carrito/carrito.php';

        }

        public function add(){
           
            if (isset($_GET['id'])) {
                
                if (isset($_SESSION['carrito'])) {
                    $producto_en_carrito=false;
                    foreach($_SESSION['carrito'] as $indice => $elemento ){
                        if ($elemento['id_producto']==$_GET['id']) {
                            $_SESSION['carrito'][$indice]['unidades']++;
                            $producto_en_carrito=true;
                        }

                    }


                }
                
                if(!isset($producto_en_carrito) || $producto_en_carrito==false){
                    $producto=new Producto($_GET['id']);
                   $producto= $producto->getOne();
                   $producto= $producto->fetch_object();

                   if (is_object($producto)) {
                    $_SESSION['carrito'][]=array(
                        "id_producto"=>$producto->id,
                        "precio"=>$producto->precio,
                        "unidades"=>1,
                        "producto"=>$producto
                    );
                    
                   }
                  

                } 
                header('Location:'. base_url .'carrito/index'); 

            }else{
                header('Location:'. base_url);
            }

        }
        
        public function deleteAll(){
            unset($_SESSION['carrito']);
        }

        public static function totalPago(){
            if (isset($_SESSION['carrito'])) {
                $precioFinal=0;

                foreach($_SESSION['carrito'] as $key => $valor ){
                    $precioFinal+= ($valor['precio'] * $valor['unidades']);

                }
                return $precioFinal;
            }

        }

    }


?>