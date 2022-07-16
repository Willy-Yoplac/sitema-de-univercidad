<?php
include_once 'conexion.php';
class CursoModel 
{
	
 private $bd;

   
    public function Listar()
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM curso where eliminado=0 order by idCurso;" );
        $stmt->execute();

        if (!$stmt->execute()) {
            return 'error';
            //print_r($stmt->errorInfo());
        }else{            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }       

    }

    public function Registrar(Curso $curso)
    {
       
  
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("INSERT INTO curso(nombre,profesor,ingresado_por) VALUES(:nombre,:profesor,:ingresado_por)");

      
        $stmt->bindParam(':nombre',$curso->__GET('nombre'));
        $stmt->bindParam(':profesor',$curso->__GET('profesor'));
        $stmt->bindParam(':ingresado_por',$curso->__GET('ingresado_por')); 

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



    public function Consultar(Curso $curso)
    {
        $this->bd = new Conexion();
        $stmt = $this->bd->prepare("SELECT * FROM curso WHERE idCurso = :idCurso;");
        $stmt->bindParam(':idCurso', $curso->__GET('idCurso'));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);      
        $objCurso = new Curso(); 
        $objCurso->__SET('idCurso',$row->idCurso);
        $objCurso->__SET('nombre',$row->nombre);
        $objCurso->__SET('profesor',$row->profesor);
        
        $objCurso->__SET('activo',$row->activo);
   
        return $objCurso;
    }

 
}
?>