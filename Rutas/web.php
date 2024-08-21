<?php


use Lib\Route;
use App\Controller\HomeController;
use App\Controller\PerfilController;
use App\Controller\PublicarController;

/* home */
Route::get('/',[HomeController::class,'index']);
Route::get('/login',[HomeController::class,'login']);
Route::get('/registrate',[HomeController::class,'registro']);
Route::post('/loginP', [HomeController::class, 'loginP']);
Route::post('/registrate', [HomeController::class, 'registroP']);
Route::get('/busca_tu_anuncio',[PublicarController::class, 'index']); 
Route::post('/busca_tu_anuncio',[PublicarController::class, 'indexp']); 

/* perfil de usuario*/ 
Route::get('/perfil',[PerfilController::class, 'perfil']);
Route::post('/perfilP',[PerfilController::class, 'perfilP']);
Route::get('/perfil/nuevo_usuario', [PerfilController::class, 'publicar']);
Route::post('/perfil', [PerfilController::class, 'formp']);
Route::get('/perfil/:id', [PerfilController::class, 'show2']); 
Route::get('/perfil/:id/edit', [PerfilController::class, 'edit']);
Route::post('/perfil/:id/actualizar',[PerfilController::class,'update']);
Route::post('/perfil/:id/delete',[PerfilController::class,'destroy']);

/* todas la publicaciones */
Route::get('/publicaciones',[PublicarController::class, 'index']);
Route::get('/publicar/crear', [PublicarController::class, 'crearG']);
Route::get('/publicaciones/:id', [PublicarController::class, 'showG']);
Route::post('/publicar', [PublicarController::class, 'formpG']);

/* publicaciones desde el usuario*/ 
Route::get('/perfil/:id/crear_anuncio', [PublicarController::class, 'formplusid']);
Route::get('/perfil/:id/crear_anuncio/pt2', [PublicarController::class, 'formplusid2']);
Route::post('/perfil/:id/crear_anuncio/post', [PublicarController::class, 'formp']);
Route::post('/perfil/:id/post2/:id', [PublicarController::class, 'formp2']);

Route::get('/perfil/:id/anuncio/:id', [PublicarController::class, 'showG']);
Route::get('/publicacion/:id/edit', [PublicarController::class, 'edit']);  
Route::post('/pubicacion/:id/actualizar', [PublicarController::class, 'update']); 
Route::post('/perfil/ubicacion/:id/delete', [PublicarController::class, 'destroy']); 



//parametros
/* Route::Get('/habitaciones/:slug',function($slug){
    return 'busque su habitacion en: '.$slug;

}); */
Lib\Route::dispatch();
?>