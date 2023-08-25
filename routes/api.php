<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/publicaciones',[PostController::class,'getPublicacion']);
Route::get('/Comment/{post_id}', [PostController::class, 'CommentId']);
Route::post('/posts', [PostController::class, 'crearPost']);
Route::get('/buscarPublicacion/{nombre}', [PostController::class, 'buscarPublicacionPorNombre']);
Route::get('/contarComentarios', [PostController::class, 'contarComentariosPrimeraPublicacion']);
Route::get('/obtenerPublicacion/{comentarioId}', [PostController::class, 'obtenerPublicacionPorIdComentario']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
