<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\User;

class UserController extends Controller
{
    /**
     * Cadastra Novo User no sistema
     * @param Request $request
     * @return type
     */
    public function postSignUp(Request $request)
    {
        $user = new User();
        //dd($user->rules);
        $this->validate($request, $user->rules);
        $name = $request['name'];
        $email = $request['email'];
        if($request['password'] != $request['password2']){
             
            return redirect()->route('welcome')
                ->withInput()
                ->with('error', 'As senhas devem ser iguais');
            //return 'O valor dos campos de senha não são iguais.';
        }
        $password =  bcrypt( $request['password'] );
        
        $user->create([
           'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        
        
        return redirect()->route('home');
        
    }
    /**
     * Verifica se os dados conferem
     * @param Request $request
     * @return type
     */
    public function logar(Request $request)
    {
        if(Auth::attempt(['email' => $request['email'] , 'password' => $request['password'] ]) ){     
            //dd( Auth::user()->likes );              
            return redirect()->route('home');
        }else{
            return redirect('/');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    /*
     * Recupera a imagem do user
     * @return file-path
     */
    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        
        return new Response($file, 200);
    }
    
    public function showAccount(){
        
        return view('account', ['user' => Auth::user() ]);
    }
    /*
     * @method Post
     * Atualiza o User recebendo dados da view('account')
     */    
    public function updateAccount(Request $request){
        
        $user = Auth::user();
        //dd($user);
        $this->validate($request, ['name' => 'required| min:4 | max:100']);
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('file');
        $filename = $request['name'] . '-'. $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file) );
        }
        return redirect()->route('user.account');
    }
   
}
