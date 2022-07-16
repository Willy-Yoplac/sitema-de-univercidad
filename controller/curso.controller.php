<?php
require_once 'model/curso.model.php';
require_once 'entity/curso.entity.php';
require_once 'includes.controller.php';

class CursoController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new CursoModel();
    }
    /**==========================Vistas=======================================*/
    public function Index(){        
        require_once 'view/header.php';
        require_once 'view/administracion/curso/index.php';
        require_once 'view/footer.php';       
    }

    public function v_Actualizar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/curso/actualizar.php';
        require_once 'view/footer.php';       
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/curso/registrar.php';
        require_once 'view/footer.php';       
    }


    /**=======================================================================*/   
    public function Listar()
    {
        $cursos = $this->model->Listar();
        return $cursos;
    }



	public function Registrar(){
        
        $curso = new Curso();

        $curso->__SET('nombre',$_REQUEST['nombre']);
        $curso->__SET('profesor',$_REQUEST['profesor']);
        $curso->__SET('ingresado_por',$_SESSION['Usuario_Actual']);    
        /*Validar Documento / Si no existe Registrar / Mostrar un mensaje que indique que el dni ya fue registrado*/
        $registrar_curso = $this->model->Registrar($curso);  
         //echo $registrar_persona;
        if($registrar_curso=='error'){
            header('Location: index.php?c=Curso&a=v_Registrar');
            echo 'No se Ha Podido Registrar';
         }else{
            echo 'Registrado Correctamente';
            header('Location: index.php?c=Curso');
         }
    }

    public function Consultar($idCurso)
    {
        $curso = new Curso();
        $curso->__SET('idCurso',$idCurso);

        $consulta = $this->model->Consultar($curso);
        return $consulta;
    }
}