<?php 
   require_once 'model/producto.php';
    class categoriaController{
        function  index(){
           
            if (Utils::isAdmin()) {
                $categorias=new Categoria();
                $resultado=$categorias->getAlls();

                require_once 'views/categoria/todasLasCategorias.php';
                      
            }else{
                header('location:'. base_url);
            }
           
        }

        public function crear(){
            if (Utils::isAdmin()) {
                require_once 'views/categoria/crearCategoria.php';
            }
        }

        public function save(){
            if (Utils::isAdmin()) {
                    
                if (isset($_POST['crear']) && isset($_POST['nombre'])) {
                    $name=$_POST['nombre'];
                    $categorias=new Categoria(null,$name);
                   $result= $categorias->insert();
                  if ($result) {
                      $_SESSION['categoriaCreada']='Categoria Creada';
                  }else{
                    $_SESSION['error']['categoria']='Categoria existente';
                  }
                  
                }
                header('Location:' . base_url . 'categoria/crear');
            }
        }

        public function ver(){
            if (isset($_GET['id'])) {
                
                $categoria=new Categoria($_GET['id']);
                $categoria=$categoria->getOne();

                if (isset($categoria)) {
                 
                    $productos=new Producto(null,$categoria->id);
    
                    $productoCategoria=$productos->getAllXCategoria();
                   
                }
               
                
            }

            require_once 'views/categoria/ver.php';
        }

    }

?>