@extends('layouts.template')

@section('title')
    Sua Conta
@endsection

@section('content')
<div class="container">
    
<div class="row">
    <div class="col-md-8 col-md-offset-2 " style="background-color: #a9d3ff">
        <h1>Sua Conta</h1>
        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            <p>
                <strong>Nome: </strong> 
                <input type='text' name="name" value="{{ $user->name }}" class="form-control"><br>
                <strong>Email: </strong>  
                <input type='text' name="email" value="{{ $user->email }}" class="form-control"><br>            
                <input type="file" name="file" id="file" class="form-control">
            </p>
        
        @if( Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg') )
        <div class='row'>
            <div class="col-md-8 col-md-offset-2 " style="background-color: #a9d3ff">
                <img  src ="{{ route('user.image', ['filename' => $user->name . '-' . $user->id . '.jpg' ]) }} " alt="Foto Perfil" style="max-width: 200px; max-height: 120px">
            </div>
        </div>
        @endif
        {{ csrf_field() }}
        {!! method_field('PUT') !!}
        <button type='submit' > Atualizar </button>
        </form>
    </div>
<div>
</div>
@endsection

