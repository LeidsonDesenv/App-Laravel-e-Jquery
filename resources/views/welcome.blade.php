@extends('layouts.template')

@section('title') 
    Bem Vindo a RedeSocial
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h1 style="text-align:center;background-color:#fff; padding:15px">Bem Vindo a RedeSocial</h1>
</div>

<div class="col-md-6 col-md-offset-3">
    <ul class="nav nav-tabs"  id="tabAccess">        
        <li  role="presentation">
            <a href="#signin"  aria-controls="signin" role="tab" data-toggle="tab">
            Login
            </a>
        </li>
        <li  role="presentation">
            <a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">
            Registrar-se
            </a>
        </li>
    </ul> <!-- tabs labels -->
    <div class="tab-content" >
        <div role="tabpanel" class="tab-pane" id="signin">        
            <div style="background-color: #fff;margin:0 15% 10% 15%; padding-top:5px">
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
        
        </div> <!-- tab login --> 
        <div role="tabpanel" class="tab-pane" id="signup" style="padding:5px">
            
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
            
            
        </div> <!-- tab registrar-se -->
    </div> <!-- tab-content -->
    <div>
    @include('includes.alert')   
    </div>

    
</div> <!-- col-md-4 -->




@endsection