<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function showPosts()
    {
        $posts = Post::all();
        return view('mainpage',  compact('posts'));
    }

    public function createPost(Request $request)
    {
        //o campo verificado deve ter o mesmo nome que no eloquent

        $post = new Post();
        $this->validate($request,$post->rules);
        $post->body = $request['body'];        
        $message = "Não foi possível fazer o comentário, falha interna";
        if($request->user()->posts()->save($post)){
            $message = "Mensagem Enviada.";
        }
        return redirect()->route('home')->with(['message' => $message]);
    }

    public function update(Request $request)
    {
        $this->validate($request, ['body' => 'required|min:3|max:255']);
        $post = Post::find($request->postId);
        $post->body = $request->body;
        $post->update();
        return response()->json(['message' => 'Atualizado com Sucesso', 'new_body' => $post->body], 200);
    }

    public function postDestroy($id){
        $post = Post::find($id);
       // dd($post->user->id);
       //$usuarioId = Auth::user();
        
        if(Auth::user()->id != $post->user->id ){
           return redirect()->back();
        }
        $post->delete();
         return redirect()->route('home'); //->with(['message' => 'Item deletado']);
    }

}
