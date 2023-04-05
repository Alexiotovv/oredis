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
use App\Http\Controllers\AsociacionesController;
use App\Http\Controllers\AsociacionessociosController;
use App\Http\Controllers\ContactosController;
// use App\Http\Controllers\UserController;
Route::get('/storage-link', function () {
    $targetFolder = storage_path('/app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder,$linkFolder);
    echo('listo!');
});

Route::get('/',[paginasController::class, 'home'])->name('local.home');

Route::get('/login',function(){
    return view('paneladmin');
})->name('login')->middleware('guest');

// Route::get('home',function(){
//     return view('home');
// })->middleware('auth')->name('home');

Route::get('register',function(){
    return view('register');
})->name('register');



//Paginas
Route::get('/nosotros',[paginasController::class, 'nosotros'])->name('nosotros');
Route::get('/home',[paginasController::class, 'home'])->name('home');
Route::get('/direcciones',[paginasController::class, 'direcciones'])->name('direcciones');
// Route::get('/misionvision',[paginasController::class, 'misionvision'])->name('misionvision');
// Route::get('pagpublicaciones',[paginasController::class, 'pagpublicaciones'])->name('pagpublicaciones');
Route::get('/paneladmin',[paginasController::class, 'paneladmin'])->middleware(['auth'])->name('paneladmin');
//Apps
// Route::get('/appPublicaciones',[PublicacionesController::class, 'index'])->name('appPublicaciones');

Route::get('/obtenerdistritos',[UbigeosController::class, 'show'])->name('obtener.distritos');

Route::get('/contacto/show',[ContactosController::class, 'show'])->name('contacto.show');
Route::get('/contacto/create',[ContactosController::class, 'create'])->name('contacto.create');
Route::post('/contacto/store',[ContactosController::class,'store'])->name('contacto.store');
Route::get('/contacto/index',[ContactosController::class, 'index'])->name('contacto.index');

//asociaciones
Route::get('/asociaciones/index',[AsociacionesController::class, 'index'])->middleware(['auth'])->name('asociaciones.index');
Route::get('/asociaciones/show',[AsociacionesController::class, 'show'])->middleware(['auth'])->name('asociaciones.show');
Route::post('/asociaciones/store',[AsociacionesController::class, 'store'])->middleware(['auth'])->name('asociaciones.store');
Route::post('/asociaciones/update',[AsociacionesController::class, 'update'])->middleware(['auth'])->name('asociaciones.update');
Route::get('/asociaciones/destroy/{id}',[AsociacionesController::class, 'destroy'])->middleware(['auth'])->name('asociaciones.destroy');
Route::get('/asociaciones/edit/{id}',[AsociacionesController::class, 'edit'])->middleware(['auth'])->name('asociaciones.edit');
//end asociaciones

//socios
Route::post('/socios/store',[AsociacionessociosController::class, 'store'])->middleware(['auth'])->name('socios.store');
Route::get('/socios/show/{id}',[AsociacionessociosController::class, 'show'])->middleware(['auth'])->name('socios.show');
Route::get('/socios/edit/{id}',[AsociacionessociosController::class, 'edit'])->middleware(['auth'])->name('socios.edit');
Route::post('/socios/update',[AsociacionessociosController::class, 'update'])->middleware(['auth'])->name('socios.update');
Route::get('/socios/destroy/{id}',[AsociacionessociosController::class, 'destroy'])->middleware(['auth'])->name('socios.destroy');
//end socios

//Discapacitado
Route::get('/CreateDiscapacitados',[DiscapacitadosController::class, 'create'])->middleware(['auth'])->name('Create.Discapacitados');
Route::post('/guardardiscapacitado',[DiscapacitadosController::class, 'store'])->middleware(['auth'])->name('guardar.discapacitado');
Route::post('/actualizardiscapacitado',[DiscapacitadosController::class, 'update'])->middleware(['auth'])->name('actualizar.discapacitado');
Route::get('/msjeregistrodiscapacitados',[DiscapacitadosController::class, 'mensaje'])->middleware(['auth'])->name('msjeregistro.discapacitados');
Route::get('/consultadni/{dni}',[DiscapacitadosController::class, 'consultadni'])->middleware(['auth'])->name('consulta.dni');
Route::get('/editardiscapacitado/{id}',[DiscapacitadosController::class, 'edit'])->middleware(['auth'])->name('editar.discapacitado');
Route::get('/editarpersonas',[DiscapacitadosController::class, 'editarpersonas'])->middleware(['auth'])->name('editar.personas');

Route::get('/informacioncompleta/{id}',[DiscapacitadosController::class, 'show'])->middleware(['auth'])->name('informacion.completa');
//End Discapacitado

//direcciones
Route::post('/guardardireccion',[DireccionesController::class, 'store'])->middleware(['auth'])->name('guardar.direccion');
Route::post('/actualizardireccion',[DireccionesController::class, 'update'])->middleware(['auth'])->name('actualizar.direccion');
Route::get('/obtenerdirecciones/{idPersona}',[DireccionesController::class, 'show'])->middleware(['auth'])->name('obtener.direcciones');
Route::get('/editardireccion/{id}',[DireccionesController::class, 'edit'])->middleware(['auth'])->name('editar.direccion');


Route::get('/obtenerdistusuarios/{id}',[UserController::class, 'obtenerdistusuarios'])->middleware(['auth'])->name('obtenerdist.usuarios');
//end direcciones


//contenido portal
Route::get('/editarcontenido',[ContenidosController::class,'edit'])->middleware(['auth'])->name('editar.contenido');
Route::post('/actualizarcontenido',[ContenidosController::class,'update'])->middleware(['auth'])->name('actualizar.contenido');
//end contenido portal

//visitas
Route::get('/registrarvisita',[VisitasController::class, 'create'])->middleware(['auth'])->name('registrar.visita');
Route::get('/obtenerdireccion/{dni}',[VisitasController::class, 'show'])->middleware(['auth'])->name('obtener.direccion');
Route::post('/guardarvisita',[VisitasController::class, 'store'])->middleware(['auth'])->name('guardar.visita');

Route::get('/reportevisitas',[ReportesController::class, 'index'])->middleware(['auth'])->name('reporte.visitas');
Route::post('/obtenervisitas',[ReportesController::class, 'obtenervisitas'])->middleware(['auth'])->name('obtener.visitas');

Route::get('/reportebeneficiario',[ReportesController::class, 'indexbeneficiario'])->middleware(['auth'])->name('reporte.beneficiario');
Route::post('/obtenerbeneficiario',[ReportesController::class, 'obtenerbeneficiario'])->middleware(['auth'])->name('obtener.beneficiario');

Route::get('/visita/reporte/distritoindex',[ReportesController::class, 'indexVisitaDistrito'])->middleware(['auth'])->name('visita.reporte.distrito');
Route::post('/visita/reporte/distritoshow',[ReportesController::class, 'obtenerVisitaDistrito'])->middleware(['auth'])->name('visita.reporte.distrito.show');


//Noticias
Route::get('/noticias',[NoticiasController::class, 'index'])->name('noticias');
Route::get('/shownoticias',[NoticiasController::class, 'show'])->name('show.noticias');
Route::get('/editnoticia/{id}',[NoticiasController::class, 'edit'])->middleware(['auth'])->name('edit.noticia');
Route::post('/updatenoticia',[NoticiasController::class, 'update'])->middleware(['auth'])->name('update.noticia');
Route::get('/noticia_independiente/{id}',[NoticiasController::class, 'noticia_independiente'])->name('noticia_independiente');
Route::get('/createnoticia',[NoticiasController::class, 'create'])->middleware(['auth'])->name('create.noticia');
Route::post('/storenoticia',[NoticiasController::class, 'store'])->middleware(['auth'])->name('store.noticia');
Route::get('/destroynoticia/{id}',[NoticiasController::class, 'destroy'])->middleware(['auth'])->name('destroy.noticia');

Route::get('/noticia/bannermodal/{id}/estado/{valor}',[NoticiasController::class, 'bannermodal'])->name('noticia.bannermodal');

Route::post('/CreatePublicaciones',[PublicacionesController::class, 'create'])->middleware(['auth'])->name('Create.Publicaciones');
Route::get('/CrearPublicaciones',[PublicacionesController::class, 'CrearPublicaciones'])->middleware(['auth'])->name('Crear.Publicaciones');
Route::post('/ActualizarPublicaciones',[PublicacionesController::class, 'ActualizarPublicaciones'])->middleware(['auth'])->name('Actualizar.Publicaciones');
Route::get('/EditarPublicaciones/{id}',[PublicacionesController::class, 'EditarPublicaciones'])->middleware(['auth'])->name('Editar.Publicaciones');
Route::get('/appListPublicaciones',[PublicacionesController::class, 'ListarPublicaciones'])->name('appList.Publicaciones');



//DescargandoArchivos
Route::get('descargarfile/{NombreArchivo}',[PublicacionesController::class, 'DevuelveArchivo'])->name('descargar.file');

//USUARIOS
Route::post("register",[UserController::class,'create'])->name('Registro');
Route::post("verificanombre",[UserController::class,'verificanombre'])->name('verificanombre');
Route::post("verificaemail",[UserController::class,'verificaemail'])->name('verificaemail');
Route::post("login",[LoginController::class, 'login']);
Route::put('login', [LoginController::class, 'logout']);
Route::get("Usuarios",[UserController::class, "Usuarios"])->middleware(['auth'])->name('Usuarios');
Route::post("ActualizaUsuario",[UserController::class, "ActualizaUsuario"])->middleware(['auth'])->name('Actualiza.Usuario');
Route::get("EditarUsuario/{id}",[UserController::class, "EditarUsuario"])->middleware(['auth'])->name('Editar.Usuario');
Route::get("ListarUsuarios",[UserController::class, "ListarUsuarios"])->middleware(['auth'])->name('Listar.Usuarios');
Route::post("ActualizaContrasena",[UserController::class, "ActualizaContrasena"])->middleware(['auth'])->name('Actualiza.Contrasena');
//END USUARIOS


/*Route::get('/cuadro', function () {
    return view('cuadro');
});*/
//Route::get('/cuadro',[casosController::class, 'casos_covid']);

