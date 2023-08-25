<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    //funciones de comments
    
    public function ObtenerComentario(Request $request)
    {
        

        $post = Post::find(1); 
        $comments = $post->comments;

        return view('comentarios', ['post' => $post, 'comments' => $comments]);


    }
    public function ActualizarComentario(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);
    
        if ($comment) {
            $comment->comment = $request->input('edited_comment');
            $comment->save();
    
            return redirect()->back()->with('success', 'Comentario actualizado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'El comentario no pudo ser encontrado.');
        }
    }
    

    public function ObtenerPost(Request $request)
    {
        $post = Comment::find(1)->post;
  
        dd($post);
    }

    public function ModificarComentario(Request $request)
    {
        $post = Post::find(1);
   
        $comment = new Comment;
        $comment->comment = "Hi ItSolutionStuff.com";
           
        $post = $post->comments()->save($comment);
    }

    
    public function Asociar(Request $request)
    {
        $comment = Comment::find(1);
        $post = Post::find(2);
           
        $comment->post()->associate($post)->save();
    }

}
