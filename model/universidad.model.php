<?php
include_once 'conexion.php';
class UniversidadModel 
{	
 private $bd;

   public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM universidad where eliminado=0 order by idUniversidad;" );
        $stmt->execute();
        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       
    }  
    public function Registrar(Universidad $universidad)
    {     
 
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO universidad(codigo,nombre,
        direccion,licenciado,cantidad_carreras, ingresado_por) 
        VALUES(:codigo,:nombre,:direccion,:licenciado,:cantidad_carreras,:ingresado_por)");
        
        $stmt->bindParam(':codigo',$universidad->__GET('codigo'));
        $stmt->bindParam(':nombre',$universidad->__GET('nombre'));
        $stmt->bindParam(':direccion',$universidad->__GET('direccion'));
        $stmt->bindParam(':licenciado',$universidad->__GET('licenciado'));
        $stmt->bindParam(':cantidad_carreras',$universidad->__GET('cantidad_carreras'));
        $stmt->bindParam(':ingresado_por',$universidad->__GET('ingresado_por'));
         

        if (!$stmt->execute()) {
            //$errors = $stmt->errorInfo();
             //echo($errors[2]);
           //return $errors[2];
           return 'error';          
            //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
    }
    public function Consultar(Universidad $universidad)
    {
        $this->bd = new Conexion();
// llamo a los datos del curso por la id
        $stmt = $this->bd->prepare("SELECT * FROM universidad WHERE idUniversidad = :idUniversidad;");
        $stmt->bindParam(':idUniversidad', $universidad->__GET('idUniversidad'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $objUniversidad = new Universidad(); 

        $objUniversidad->__SET('idUniversidad',$row->idUniversidad);
        $objUniversidad->__SET('codigo',$row->codigo);
        $objUniversidad->__SET('nombre',$row->nombre);
        $objUniversidad->__SET('direccion',$row->direccion);
        $objUniversidad->__SET('licenciado',$row->licenciado);
        $objUniversidad->__SET('cantidad_carreras',$row->cantidad_carreras); 
        
        $objUniversidad->__SET('activo',$row->activo);
   
        return $objUniversidad;
    }

    public function Actualizar(Universidad $universidad)
    {
      
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE universidad SET  codigo=:codigo,
        nombre=:nombre,
        direccion=:direccion, licenciado=:licenciado, cantidad_carreras=:cantidad_carreras,
        activo=:activo,modificado_por=:modificado_por WHERE idUniversidad=:idUniversidad;");

        $stmt->bindParam(':idUniversidad',$universidad->__GET('idUniversidad'));
        $stmt->bindParam(':codigo',$universidad->__GET('codigo'));   
        $stmt->bindParam(':nombre',$universidad->__GET('nombre'));
        $stmt->bindParam(':direccion',$universidad->__GET('direccion'));
        $stmt->bindParam(':licenciado',$universidad->__GET('licenciado'));
        $stmt->bindParam(':cantidad_carreras',$universidad->__GET('cantidad_carreras'));   
        
        $stmt->bindParam(':activo',$universidad->__GET('activo'));
        $stmt->bindParam(':modificado_por',$universidad->__GET('modificado_por'));

           
        if (!$stmt->execute()) {
          
           // $errors = $stmt->errorInfo();
            
             return 'error';
           //return $errors[2];  
        }else{
            
            return 'exito';
        }
    }  
    public function Eliminar(Universidad $universidad)
    {
       
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("UPDATE universidad SET  modificado_por=:modificado_por,
        eliminado=:eliminado WHERE idUniversidad = :idUniversidad");

        $stmt->bindParam(':idUniversidad',$universidad->__GET('idUniversidad'));         
        $stmt->bindParam(':modificado_por',$universidad->__GET('modificado_por'));
        $stmt->bindParam(':eliminado',$universidad->__GET('eliminado'));    
        if (!$stmt->execute()) {
            return 'error';
        //print_r($stmt->errorInfo());
        }else{
            
            return 'exito';
        }
         
    }  
}
?>