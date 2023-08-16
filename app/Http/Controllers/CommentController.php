<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function ObtenerComentario(Request $request)
    {
        $comments = Post::find(1)->comments;
  
        dd($comments);
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

    public function AgregarComentario(Request $request)
    {
        $post = Post::find(1);
   
        $comment1 = new Comment;
        $comment1->comment = "Hi ItSolutionStuff.com Comment 1";
           
        $comment2 = new Comment;
        $comment2->comment = "Hi ItSolutionStuff.com Comment 2";
           
        $post = $post->comments()->saveMany([$comment1, $comment2]);
    }
    public function Asociar(Request $request)
    {
        $comment = Comment::find(1);
        $post = Post::find(2);
           
        $comment->post()->associate($post)->save();
    }
}
