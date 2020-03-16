<?php 
    require_once 'model/producto.php';
    class productoController{
        function  index(){
            //rederizar vista
            $productosRand= new Producto();
            $productos=$productosRand->getRand(6);
            
           


            require 'views/producto/destacados.php';
        }

        function gestion(){
            if (Utils::isAdmin()) {
                
                $producto=new Producto();
                $res=$producto->getAll();
             
                require 'views/producto/gestion.php';
            }else{
                header('Location:'.base_url);
            }
    
        }

        function crear(){
            if (Utils::isAdmin()) {
              
                    require 'views/producto/crearProducto.php';

               
                    
               
            }else{
                header('Location:'.base_url);
            }
        }

        function save(){
            
            if (isset($_POST['crear'])) {

                if (Utils::isAdmin()) {

                    
                if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio'])
                &&    isset($_POST['stock']) && isset($_POST['oferta']) && isset($_POST['categoria'])
                 /*&& isset($_FILES['image'])*/) {
                  
                  $producto=new Producto(null,$_POST['categoria'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],
                  $_POST['stock'], $_POST['oferta'] );
                  

                
                 
                    /*imagen */
                    $file=$_FILES['imagen'];
                    $fileName=$file['name'];
                    $mimtape=$file['type'];
                if ($mimtape=='image/jpg' || $mimtape=='image/jpeg' || $mimtape=='image/png' ||$mimtape=='image/gift') {
                                        
                  
                    //si no existe la carpeta la crea
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images',0777,true);

                      

                    }

                    move_uploaded_file($file['tmp_name'],'uploads/images/' . $fileName);
                                            $producto->setImage($fileName);
                }
                    

                    $insert= $producto->insert();

                    if ($insert) {
                        $_SESSION['producto_exitoso']='Producto Creado';
                    }else{
                       
                        $_SESSION['producto_fallido']='Fallo al crear Poducto';
                    }
                    header('Location:'. base_url . 'producto/gestion');
                }
             }else{  header('Location:'. base_url . 'producto/index');}
           }else{  header('Location:'. base_url . 'producto/index');}

        }


        function editar(){
            if (Utils::isAdmin()) {
             
                if(isset($_GET['id'])){
                    
                    $producto=new Producto($_GET['id']);
                    $resut=$producto->getOne();
                    if ($resut) {
                        $editar=true;
                        $pro=$resut->fetch_object();
                        require 'views/producto/crearProducto.php';
   
                    }

                }
           
                
           
            }else{
            header('Location:'.base_url);
            }
        }


        function guardarEditar(){
            if (Utils::isAdmin()) {
             
                if(isset($_GET['id'])){
                    
                    
               
                    
                      if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio'])
                          &&    isset($_POST['stock']) && isset($_POST['oferta']) && isset($_POST['categoria'])
                           /*&& isset($_FILES['image'])*/) {

                             $producto=new Producto($_GET['id'],$_POST['categoria'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],
                              $_POST['stock'], $_POST['oferta']);

                            if (isset($_FILES['imagen'])) {
                                $file=$_FILES['imagen'];
                                $fileName=$file['name'];
                                $mimtape=$file['type'];
                                if ($mimtape=='image/jpg' || $mimtape=='image/jpeg' || $mimtape=='image/png' ||$mimtape=='image/gift') {
                                          
                    
                                  //si no existe la carpeta la crea
                                  if (!is_dir('uploads/images')) {
                                      mkdir('uploads/images',0777,true);
              
                                    
              
                                  }
                                  
                                  move_uploaded_file($file['tmp_name'],'uploads/images/' . $fileName);
                                 $producto->setImage($fileName);
                              }
                            }
                           
                          
                            $res=$producto->uptdate();
                            var_dump($producto->db->error);
                            if ($res) {
                                echo 'producto editado';
                            }else{
                                echo 'producto no editado';
                            }
                             


                    }else{

                    }

                }
           
                
           
            }else{
            header('Location:'.base_url);
            }
        }

        
        function eliminar(){
            if(Utils::isAdmin()){

                if (isset($_GET['id'])) {
                    

                $producto= new Producto($_GET['id']);
                $producto->delete();
                header('Location:'. base_url . 'producto/gestion');

                }else{
                    header('Location:'. base_url . 'producto/index');
                }


            }else{
                header('Location:'. base_url . 'producto/index');
            }


        }

        function detalle(){
            if (isset ($_GET['id'])) {
                $producto=new Producto($_GET['id']);
               $producto= $producto->getOneDetalle();
                $producto=$producto->fetch_object();
            
                require_once 'views/producto/detalle.php';
                    
            }

        }

    }

?>