<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function getPublicacion(Request $request)
    {

        $posts = Post::all()->take(10);
        return response()->json($posts);
    }
    public function CommentId(Request $request, $postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return response()->json($comments);
    }

    public function crearPost(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $post = Post::create($data);
        dd($data);

        return response()->json($post);
    }
    public function buscarPublicacionPorNombre(Request $request, $nombre)
    {
        $publicacion = Post::where('name', $nombre)->first();

        if ($publicacion) {
            return response()->json($publicacion, 200);
        } else {
            return response()->json(['message' => 'Publicación no encontrada'], 404);
        }
    }

    public function contarComentariosPrimeraPublicacion()
    {
        $primeraPublicacion = Post::first();
        
        if ($primeraPublicacion) {
            $cantidadComentarios = $primeraPublicacion->comments()->count();
            return response()->json(['cantidad_comentarios' => $cantidadComentarios]);
        } else {
            return response()->json(['message' => 'No hay publicaciones'],404);
        }
    }

    public function obtenerPublicacionPorIdComentario($comentarioId)
    {
        $comentario = Comment::findOrFail($comentarioId);
        $publicacion = $comentario->post;

        return response()->json($publicacion);
    }

}
