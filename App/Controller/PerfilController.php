<?php

namespace App\Controller;

use App\Modell\Media;
use App\Modell\Usuarios;



class PerfilController extends Controller{

    public function perfil(){
       //se muestra toda la lista de usuarios
        $model= new Usuarios;
        $perfil = $model->all();
        return $this->view('usuario.perfil', compact('perfil'));
    }

    public function perfilP(){
        //Filtro de busqueda por nombre, id
        $model= new Usuarios;
        if (isset($_POST['search'])) {
            $perfil=$model->where('nombre','LIKE', '%'.$_POST['search'].'%')->get();
        }else{
            $perfil = $model->all();
     }
        return $this->view('usuario.perfil', compact('perfil'));
    }
    

    public function publicar(){
        //se muestra el formulario
        return  $this->view('usuario.publicar');
    }

    public function formp (){
        //se procesa el formulario de enviar datos
        $datos=$_POST;
        $model= new Usuarios;
        $model->insert($datos);
        $this->redirect('/perfil');
    }

    public function show ($id){
        //se muestra el usuario especifico
        $model=new Usuarios;
        $perfil =$model->buscar($id);
        return $this->view('usuario.show', compact('perfil'));
    }

    public function edit ($id){
        $model=new Usuarios;
        $perfil =$model->buscar($id);
        return $this->view('usuario.edit',compact('perfil')); 
    }

    public function update ($id){
        $datos=$_POST;
        $model= new Usuarios;
        $model->update($id, $datos);
        $this->redirect("/perfil/{$id}");
    }

    public function destroy ($id){
        $model= new Usuarios;
        $model->delete($id);
        $this->redirect(("/perfil"));
        
    }
    public function show2($id){
     
        $model= new Usuarios;
        $perfil =$model->buscar($id);
        $model2 =new Usuarios;
        $join = $model2->getDatosJoin($id);
        return $this->view('usuario.show',compact('join','perfil'));
          
    }
}