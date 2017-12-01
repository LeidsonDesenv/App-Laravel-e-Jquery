@extends('layouts.template')

@section('title') 
    Bem Vindo a RedeSocial
@endsection

@section('content')
<div class="col-md-12">
    <h1>Bem Vindo a RedeSocial</h1>
</div>

<div class="col-md-4 col-md-offset-1">
    <h3>Login</h3>
    <form action="{{ route('logar') }}"  method="get">
        <div class="form-group">
            Email: <input type="text" class="form-control" name="email"/>
            Senha: <input type="password" class="form-control"  name="password"/>
        </div>
        <button class="btn btn-primary">Logar</button>
        {{ csrf_field()}}
    </form>
</div>


<div class="col-md-6">
    <h3>Faça seu cadastro </h3>
    <form action="{{ route("signup") }}" method="post" >
        <div class="form-group">
            <label>Nome:</label>
                <input  class="form-control" type="text" name="name" id="name"
                     value=""   required/>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label>Email:</label>
                    <input  class="form-control" type="email" name="email" id="email"
                           value="" required/>
            </div>    
            <label>Senha:</label>
                <input  class="form-control" type="password" name="password" id="password" required/>
            <label>Repetir Senha:</label>
                <input  class="form-control" type="password" name="password2" id="password2" required/>
        </div>        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        {{ csrf_field() }}        
    </form>
   
   
    @include('includes.alert')    
    
     
</div>

@endsection