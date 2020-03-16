
<?php 

    class Producto{
        private $id;      
        private $categoria_id;   
        private $nombre;  
        private $descripcion;
        private  $precio;
        private  $stock;
        private  $oferta;    
        private $fecha; 
        private $image;
        public $db;




       public function __construct($id=null,$categoria_id=null,$nombre=null,$descripcion=null,$precio=null,
       $stock=null,$oferta=null,$image=null)
        {
            $this->db=Database::conect();
            $this->id=$id;
            $this->categoria_id=$categoria_id;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->precio=$precio;
            $this->stock=$stock;
            $this->oferta=$oferta;
            $this->image=$image;    
        
        }

        public function setImage($image){
           $this->image=$image;

        }


        public function getAll(){
            $query='select * from productos order by id desc';
           
            return  $this->db->query($query);

        }


        public function getAllXCategoria(){
            $query="select * from productos where categoria_id=$this->categoria_id";
            return $this->db->query($query);
        }


        function getOne(){
            $query="select * from productos WHERE id=$this->id";
            return $this->db->query($query);
            
        }

        function getOneDetalle(){
            $query="select p.*, c.nombre AS 'categoria' from productos p
            INNER JOIN categorias c ON c.id= p.categoria_id
            WHERE p.id=$this->id";
            return $this->db->query($query);
            
        }

        function getRand($limit){
            $query="select * from productos ORDER BY RAND() LIMIT $limit";
            return $this->db->query($query);
        }


        public function insert(){
           



            $query="insert into productos values(null,$this->categoria_id,'$this->nombre','$this->descripcion',
            $this->precio,$this->stock,'$this->oferta',CURDATE(),'$this->image')";


           
            return  $this->db->query($query);

        }


        function  delete(){
            $query="DELETE FROM productos where id=$this->id";
            return $this->db->query($query);
        
        }
        
        function uptdate(){
            $query="UPDATE  productos SET 
                
                categoria_id=$this->categoria_id,
                nombre='$this->nombre',
                descripcion= '$this->descripcion',
                precio=$this->precio,
                stock=$this->stock,
                oferta='$this->oferta'";
            
            if ($this->image != null) {
                $query .=", image='$this->image' ";
            }
            
            $query.=" where id=$this->id";
            var_dump($query);

         return   $this->db->query($query);

            
        }

}