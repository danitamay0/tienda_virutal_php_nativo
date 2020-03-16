<?php 

    class Users{
        private $id;       
        private $nombre;  
        private $apellido;
        private  $email;
        private  $password;
        private  $rol;     
        private  $image=null;
        public $db;

       public function __construct($id=null,$nombre=null,$apellido=null,$email=null,$password=null,$rol=null)
        {
            $this->db=Database::conect();
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->email=$email;
            $this->password=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]) ;
            $this->rol=$rol;
        
        }



        public function getNombre(){
            return $this->nombre;
        }
     
        
        public function getApellido(){
            return $this->apellido;
        }

        public function insert(){
            $query= "insert into usuarios(nombre, apellido, email, password, rol) values('{$this->nombre}','{$this->apellido}','{$this->email}','{$this->password}','{$this->rol}')";
            return $this->db->query($query);

            
        }

        public function verifyLogIn($email,$password){
            $query="select * from usuarios where email='$email'";
            $result=$this->db->query($query);

            if($result){
                //verificar password
                $usuario=$result->fetch_object();
                
                if (password_verify($password,$usuario->password)) {
                   return     $usuario;
                   
                   
                }else{
                   return null;
                }
              
                
            

            }else{
                return null;
            }
        
        }

      
        
    }

?>