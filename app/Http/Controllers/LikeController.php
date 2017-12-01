<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;


class LikeController extends Controller
{
   
     public function like(Request $request)
     {
        
        $postId = $request['postId'];           
        $isLike = $request['isLike'] === 'true' ? true : false;   
        $user = Auth::user();
        //sempre usar o get ou o first nas relações entre tabelas do eloquent
        $oldLike = $user->likes()->where('post_id', $postId )->first();          
         if($oldLike){
             
            if($oldLike->like == $isLike){
                $oldLike->delete();
                return null;
            }
            else{
                $oldLike->user_id = $user->id;
                $oldLike->post_id = $postId;
                $oldLike->like =  $isLike;

                $oldLike->update();
                return 'Atualizado';
            } 
        } 
        $like = new Like();
        $like->create([
            'like' => $isLike,
            'post_id' =>$postId,
            'user_id' => $user->id
        ]);
        return 'Novo Like';
        
     }
    
    
    
    
}
