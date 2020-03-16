<?php 
    
    class Pedido{
     private $id;	
     private $usuario_id;
     private $provincia;
     private $localidad;  
     private $direccion;
     private $coste;
     private $estado ;
     private $fecha;
     private $hora;

    private $db;

        public function __construct($id=null,$usuario_id=null,$provincia=null,$localidad=null,
        $direccion=null,$coste=null)
        {
            $this->id=$id;
            $this->usuario_id=$usuario_id;
            $this->provincia=$provincia;
            $this->localidad=$localidad;
            $this->direccion=$direccion;
            $this->coste=$coste;
            
            $this->db=Database::conect();
        }

        public function setEstado($estado){
            $this->estado=$estado;
        }

        public function save(){
            $query="insert into pedidos values(null,$this->usuario_id,'$this->provincia','$this->localidad',
            '$this->direccion','$this->coste','confirm',CURDATE(),CURTIME())";
            return $this->db->query($query);

        }

        public function saveLineasPedidos(){
            $sql="select LAST_INSERT_ID() as 'id_pedido' from pedidos";
            $query=$this->db->query($sql);
            $pedido_id=$query->fetch_object()->id_pedido;
           


            foreach($_SESSION['carrito'] as $key => $value){
                $producto=$value['producto'];
                $unidades=$value['unidades'];
              
                $query="insert into lineas_pedidos values(null,$pedido_id,$producto->id,$unidades)";

                $this->db->query($query);
                echo $this->db->error;
            }
          
        }

        function getPedidoUsuario($limit=null){
          
            $query="select p.id,p.coste,p.fecha from pedidos p where usuario_id=$this->usuario_id ORDER BY id DESC ";

            if (isset($limit)) {
                $query.=" LIMIT 1";
                
            $pedido=$this->db->query($query);
            
            return $pedido->fetch_object();
            }else{

                
              return    $this->db->query($query);
            
            
            }

        }

        function getProductosPedido($pedido_id){
            $query="select pro.*, linea.unidades from productos pro
            inner join lineas_pedidos linea on linea.producto_id=pro.id 
            where linea.pedido_id=$pedido_id";
            
            


            return $this->db->query($query);
            
        }

        
        function getPedido(){
  
            $query="select * from pedidos  where id=$this->id  ";

         
                
              return    $this->db->query($query);
            
            
            }

            function getAll(){
  
                $query="select * from pedidos  order by id desc ";
    
             
                    
                  return    $this->db->query($query);
                
                
                }  
                
             function updateEstado(){
           
                 $query="update pedidos set estado='$this->estado' where id=$this->id";
               
               return  $this->db->query($query);
               
               
             }   
    }

?>