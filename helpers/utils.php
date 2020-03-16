<?php 
    class Utils{
        public static function deleteSesion($name){
           if(isset( $_SESSION[$name])){
            $_SESSION[$name]=null;
            unset($_SESSION[$name]);
           }

    
        }
        public static function isAdmin(){
            if(isset($_SESSION['login'])){
                if ( $_SESSION['login']->rol=='admin'){ 
                     return true;    
                }else return false;
               
            }else {
                return false;
            }
        }
        public static function getAllCategorias(){
            include_once 'model/categoria.php';
            
             $categ=new Categoria();
               $categs=$categ->getAlls();
               return $categs;

        }
    }


?>