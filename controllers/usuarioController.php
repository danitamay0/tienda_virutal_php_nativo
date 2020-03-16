<?php 
    require 'model/usuario.php';
    

    class usuarioController{
        function  index(){
            echo "index usuario";
        }

        function registro(){
            require 'views/usuario/registro.php';
     
        }

        function save(){
            if (isset($_POST['enviar'])) {
               
                $usuario=new Users(null,$_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password'],'usuario');
               $insert= $usuario->insert();
               
                if ($insert) {
                    $_SESSION['registro']="registro satisfactorio";
                }else {$_SESSION['error']['registro']="registro incorrecto";} 
                $base=base_url. 'usuario/registro';
                header("Location: $base ");
               
         } 
        }

        function logIn(){
            if(isset($_POST["email"]) && isset($_POST["password"]) ){
                $usuario=new Users();
                
               $results=$usuario->verifyLogIn($_POST["email"],$_POST["password"]);
               if ($results && is_object($results)) {
                  
               
                $_SESSION['login']=$results;
             
               
               }else{
                $_SESSION['error_login']="correo o contraseña incorrecta";
               }
              
               header("Location:".base_url);
               
                

            }
          
        }

        function logout(){
            if (isset($_SESSION['login'])) {
             
                session_destroy();
                  "echo";
               
                }
                header("Location:".base_url);
                  
        }

    }

?>