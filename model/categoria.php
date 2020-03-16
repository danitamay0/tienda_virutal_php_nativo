<?php 

    class Categoria{
        private $id;       
        private $nombre;  
      
        public $db;

       public function __construct($id=null,$nombre=null)
        {
            $this->db=Database::conect();
            $this->id=$id;
            $this->nombre=$nombre;
           
        
        }



        public function getNombre(){
            return $this->nombre;
        }
        public function getId(){
            return $this->id;
        }
     
        public function getAlls(){
            $query='select * from categorias order by id desc';
            $result = $this->db->query($query);
            if ($result) {
                return $result;
            }
           
        }

        
        public function getOne(){
            $query="select * from categorias WHERE id=$this->id";
            $result = $this->db->query($query);
            return $result->fetch_object();
           
        }


        public function insert(){
          $query="insert into categorias values(null,'$this->nombre') ";
           $result = $this->db->query($query);
           
               return $result;
           
            
           
        }
    
    }
?>