<?php

namespace App\Controller;

use App\Modell\formulario;
use App\Modell\Usuarios;
use app\Modell\Media;


class PublicarController extends Controller{
    public function index(){
        $model = new Usuarios;
        $join = $model->getall();
        return $this->view('publicar.index', compact('join'));    
    }

   
    public function crear(){
        //se muestra el formulario
        return  $this->view('publicar.publicar');
    }

    public function crearG(){
        //se muestra el formulario
        return  $this->view('publicar.publicarG');
    }

    public function indexp() {
        //se procesa el formulario de busqueda por filto de precio de index.php
        $model = new formulario; 
    $join = $model;

    if (isset($_POST['tipo_inmueble']) && !empty($_POST['tipo_inmueble'])) {
        $join = $model->where2('tipo_inmueble', 'LIKE', '%'.$_POST['tipo_inmueble'].'%');
        
    }

    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $join = $model->where2('titulo', 'LIKE', '%'.$_POST['search'].'%');
        
    }

    if (isset($_POST['sector']) && !empty($_POST['sector'])) {
        $join = $model->where2('sector', 'LIKE', '%'.$_POST['sector'].'%');
       
    }

    return $this->view('publicar.index', compact('join')); 
    }

    public function formp($id){
        $datos=$_POST;
        $model= new formulario;
        $model->insert2($datos);  
        $this->redirect("/perfil/{$id}/crear_anuncio/pt2");   
    }
    
   /*  public function formp3($id) {
        if (isset($_FILES['file_data']) && is_array($_FILES['file_data']['name'])) {
            $ruta_destino = 'Assets/Image/';  
        
            for ($i = 0; $i < count($_FILES['file_data']['name']); $i++) {
                $nombre_archivo = $_FILES['file_data']['name'][$i];
                $archivo_temporal = $_FILES['file_data']['tmp_name'][$i];
                $ruta_completa = $ruta_destino . $nombre_archivo;
                
                // Obtener información sobre el archivo
                $file_type = $_FILES['file_data']['type'][$i];
                $file_size = $_FILES['file_data']['size'][$i];
                $upload_date = date("Y-m-d H:i:s");  // Puedes ajustar el formato de fecha si es necesario
    
                move_uploaded_file($archivo_temporal, $ruta_completa);
        
                $datos = [
                    'id_formulario' => $id,
                    'file_name' => $nombre_archivo,
                    'file_type' => $file_type,
                    'file_size' => $file_size,
                    'file_data' => file_get_contents($ruta_completa), 
                    'upload_date' => $upload_date,
                    'ruta_archivo' => $ruta_completa,
                ];
        
                $model = new Media;
                $model->insertImages($datos);
            }
        }
        
        $this->redirect("/perfil");
    } */


    public function formp2($id, $usuario_id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_formulario = $_POST['id_formulario'];
            $usuario_id = $_POST['usuario_id'];
            $files = $_FILES['file'];  
            $model = new Media;
            $media = $model->almacenarArchivos($id_formulario, $usuario_id, $files);
            $this->redirect("/perfil/{$usuario_id}");
        }
    }
           
    public function formpG(){
        /* se procesa el formulario de ubicaciones */
        $datos=$_POST;
        $model= new formulario;
        $model->insert($datos);  
        $this->redirect("/publicaciones");   
    }

    public function show($id,$id_formulario){
        $model2 = new Usuarios;
        $perfil=$model2->buscar($id);
        $model = new formulario;
        $all_data=$model->getDatosJoin2($id_formulario);
        return $this->view('publicar.show',compact('all_data','perfil'));
    }

    public function showG($id){
        $model = new formulario;
        $formulario=$model->getDatosJoin2($id);
        $model2 = new Usuarios;
        $perfil=$model2->buscar4($id);
        return $this->view('publicar.show_G',compact('formulario','perfil'));
    }

    public function formplusid($id){
        //se muestra el usuario especifico con el fomulario para crear el anuncio
        $model=new Usuarios;
        $perfil =$model->buscar($id);
        return $this->view('publicar.publicar', compact('perfil'));
   }

    public function formplusid2($id){
        //se muestra el usuario especifico con el fomulario para crear el anuncio parte 3
        $model=new formulario;
        $formulario =$model->buscar2($id);
        return $this->view('publicar.publicar_pt2', compact('formulario'));
        }


    public function misAnuncios($id){
        $model=new Usuarios;
        $perfil =$model->buscar($id);
    return $this->view('publicar.misAnuncios', compact('ubicacion'));    
}

    public function anuncios($id){
        //se muestra el ununcio especifico
        $model=new formulario;
        $ubicacion =$model->buscar($id);
    return $this->view('publicar.anuncio', compact('ubicacion'));    
}

    public function where($id) {
        //obtener los resultados de los anuncios por cada usuario
        $model = new formulario;
        $ubicacion=$model->where('usuario_id', '=', $id)->get();
        return $this->view('publicar.anuncio',compact('ubicacion')); 
}

    public function update($id) {
        /* actualizar informacion */
        $datos=$_POST;
        $model =new formulario;
        $model->update($id,$datos);
        $this->redirect("/perfil/ubicacion/{$id}");
    }

    public function edit($id){
        $model=new formulario;
        $formulario =$model->buscar3($id);
        return $this->view('publicar.edit',compact('formulario')); 
    }

    public function destroy ($id){ 
        $model = new formulario;
        $ubicacion= $model->delete($id); 
       /*  $model = new Usuarios;
        $perfil= $model->delete($id);  */
        $this->redirect("/perfil/{$id}");
    }

    
    public function show2($id){
        
        $usuario_id = $_SESSION['usuario_id'];
        $model= new Usuarios;
        $perfil =$model->buscar($id);
        $model2 =new Usuarios;
        $join = $model2->getDatosJoin($id);
        $model3 =new Usuarios;
        $imagen = $model3->getImagesById($id);
        return $this->view('usuario.show',compact('imagen','join','perfil'));  
    
} 


      

}



