<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paginasController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscapacitadosController;
use App\Http\Controllers\UbigeosController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\VisitasController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ContenidosController;

// use App\Http\Controllers\UserController;
Route::get('/storage-link', function () {
    $targetFolder = storage_path('/app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder,$linkFolder);
    echo('listo!');
});

Route::get('/',[paginasController::class, 'inicio'])->name('inicio');

Route::get('login',function(){
    return view('paneladmin');
})->name('login')->middleware('guest');

Route::get('home',function(){
    return view('home');
})->middleware('auth')->name('home');

Route::get('register',function(){
    return view('register');
})->name('register');


//Paginas
Route::get('/nosotros',[paginasController::class, 'nosotros'])->name('nosotros');
Route::get('/home',[paginasController::class, 'home'])->name('home');
Route::get('/direcciones',[paginasController::class, 'direcciones'])->name('direcciones');
// Route::get('/misionvision',[paginasController::class, 'misionvision'])->name('misionvision');
// Route::get('pagpublicaciones',[paginasController::class, 'pagpublicaciones'])->name('pagpublicaciones');
Route::get('/paneladmin',[paginasController::class, 'paneladmin'])->name('paneladmin');
//Apps
// Route::get('/appPublicaciones',[PublicacionesController::class, 'index'])->name('appPublicaciones');

Route::get('obtenerdistritos',[UbigeosController::class, 'show'])->name('obtener.distritos');

//Discapacitado
Route::get('CreateDiscapacitados',[DiscapacitadosController::class, 'create'])->name('Create.Discapacitados');
Route::post('guardardiscapacitado',[DiscapacitadosController::class, 'store'])->name('guardar.discapacitado');
Route::post('actualizardiscapacitado',[DiscapacitadosController::class, 'update'])->name('actualizar.discapacitado');
Route::get('msjeregistrodiscapacitados',[DiscapacitadosController::class, 'mensaje'])->name('msjeregistro.discapacitados');
Route::get('consultadni/{dni}',[DiscapacitadosController::class, 'consultadni'])->name('consulta.dni');
Route::get('editardiscapacitado/{id}',[DiscapacitadosController::class, 'edit'])->name('editar.discapacitado');
Route::get('editarpersonas',[DiscapacitadosController::class, 'editarpersonas'])->name('editar.personas');
//End Discapacitado

//direcciones
Route::post('guardardireccion',[DireccionesController::class, 'store'])->name('guardar.direccion');
Route::post('actualizardireccion',[DireccionesController::class, 'update'])->name('actualizar.direccion');
Route::get('obtenerdirecciones/{idPersona}',[DireccionesController::class, 'show'])->name('obtener.direcciones');
Route::get('editardireccion/{id}',[DireccionesController::class, 'edit'])->name('editar.direccion');


Route::get('obtenerdistusuarios/{id}',[UserController::class, 'obtenerdistusuarios'])->name('obtenerdist.usuarios');
//end direcciones


//contenido portal
Route::get('editarcontenido',[ContenidosController::class,'edit'])->name('editar.contenido');
Route::post('actualizarcontenido',[ContenidosController::class,'update'])->name('actualizar.contenido');
//end contenido portal

//visitas
Route::get('registrarvisita',[VisitasController::class, 'create'])->name('registrar.visita');
Route::get('obtenerdireccion/{dni}',[VisitasController::class, 'show'])->name('obtener.direccion');
Route::post('guardarvisita',[VisitasController::class, 'store'])->name('guardar.visita');

Route::get('reportevisitas',[ReportesController::class, 'index'])->name('reporte.visitas');
Route::post('obtenervisitas',[ReportesController::class, 'obtenervisitas'])->name('obtener.visitas');

Route::get('reportebeneficiario',[ReportesController::class, 'indexbeneficiario'])->name('reporte.beneficiario');
Route::post('obtenerbeneficiario',[ReportesController::class, 'obtenerbeneficiario'])->name('obtener.beneficiario');


//Noticias
Route::get('noticias',[NoticiasController::class, 'index'])->name('noticias');
Route::get('shownoticias',[NoticiasController::class, 'show'])->name('show.noticias');
Route::get('editnoticia/{id}',[NoticiasController::class, 'edit'])->name('edit.noticia');
Route::post('updatenoticia',[NoticiasController::class, 'update'])->name('update.noticia');
Route::get('noticia_independiente/{id}',[NoticiasController::class, 'noticia_independiente'])->name('noticia_independiente');
Route::get('createnoticia',[NoticiasController::class, 'create'])->name('create.noticia');
Route::post('storenoticia',[NoticiasController::class, 'store'])->name('store.noticia');
Route::get('destroynoticia/{id}',[NoticiasController::class, 'destroy'])->name('destroy.noticia');


Route::post('CreatePublicaciones',[PublicacionesController::class, 'create'])->name('Create.Publicaciones');
Route::get('CrearPublicaciones',[PublicacionesController::class, 'CrearPublicaciones'])->name('Crear.Publicaciones');
Route::post('ActualizarPublicaciones',[PublicacionesController::class, 'ActualizarPublicaciones'])->name('Actualizar.Publicaciones');
Route::get('EditarPublicaciones/{id}',[PublicacionesController::class, 'EditarPublicaciones'])->name('Editar.Publicaciones');
Route::get('appListPublicaciones',[PublicacionesController::class, 'ListarPublicaciones'])->name('appList.Publicaciones');

//DescargandoArchivos
Route::get('descargarfile/{NombreArchivo}',[PublicacionesController::class, 'DevuelveArchivo'])->name('descargar.file');

//USUARIOS
Route::post("register",[UserController::class,'create'])->name('Registro');
Route::post("verificanombre",[UserController::class,'verificanombre'])->name('verificanombre');
Route::post("verificaemail",[UserController::class,'verificaemail'])->name('verificaemail');
Route::post("login",[LoginController::class, 'login']);
Route::put('login', [LoginController::class, 'logout']);
Route::get("Usuarios",[UserController::class, "Usuarios"])->name('Usuarios');
Route::post("ActualizaUsuario",[UserController::class, "ActualizaUsuario"])->name('Actualiza.Usuario');
Route::get("EditarUsuario/{id}",[UserController::class, "EditarUsuario"])->name('Editar.Usuario');
Route::get("ListarUsuarios",[UserController::class, "ListarUsuarios"])->name('Listar.Usuarios');
Route::post("ActualizaContrasena",[UserController::class, "ActualizaContrasena"])->name('Actualiza.Contrasena');
//END USUARIOS


/*Route::get('/cuadro', function () {
    return view('cuadro');
});*/
//Route::get('/cuadro',[casosController::class, 'casos_covid']);

