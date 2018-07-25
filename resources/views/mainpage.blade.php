@extends('layouts.template')

@section('title')
    Home Page - Rede Social
@endsection
<link href=" {{ url('css/custom.css') }}" rel="stylesheet"/>
@section('content')



<section class="row">
    <div class="col-md-8 col-md-offset-2">    
        <header> <h3 >Digite o que está pensando</h3> </header>
        <form action="{{ route('post.create') }}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" rows="5">

                </textarea>
            </div>
            <button class="btn btn-primary">Postar</button>
            {{ csrf_field() }}
        </form>
        
        @include('includes.alert')  
    </div>
</section>
<section>
    <div class="col-md-8 col-md-offset-2">
        <header> <h3 class="bg-primary">Comentários de outros usuários</h3> </header>
        
        <!-- data-set não aceita camelCase cuidado -->
        @foreach($posts as $post)
        <article  class="post" data-postid="{{ $post->id }}" >
            <p>
                {{ $post->body }}
            </p>
            <div class="info-user">
                <p><strong>Postado Por {{ $post->user->name }} </strong> </p>
            </div>
            
            <div class="interaction">
                <a class="like" href="#">    

                @if(  auth()->user()->likes->where('post_id', $post->id)->first() )
                    @if( Auth::user()->likes->where('post_id', $post->id)->first()->like == 1 )
                        You Liked
                    @else
                        Like
                    @endif                
                @else
                    Like
                @endif 
                <span class='badge '> {{ $post->likes()->where('like',1)->count() }}</span>
                </a> | 
                <a class="like" href="#">
                @if(  Auth::user()->likes()->where('post_id', $post->id)->first() )
                    @if( Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 )
                        You Desliked
                    @else
                        Deslike
                    @endif                
                @else
                    Deslike
                @endif        
                <span class='badge'>{{ $post->likes()->where('like',0)->count() }}</span>
                </a> 
                 @if(Auth::user()->id == $post->user->id) 
                |                
                <button id="edit" class="btn btn-link">Editar</button>|
                <a href="{{ route('post.delete', [ 'id' => $post->id ] ) }}" id="del" class="btn btn-link">Deletar</a>
                 @endif 
                
            </div>
            
        </article>
        
        @endforeach
        
        
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar o Post</h4>
      </div>
      <div class="modal-body">
          <form action="" method="">
              <div class="form-group">
              <label>Faça suas alterações:</label>
              <textarea class="form-control" id="textBody" name="textBody" rows="5">
                  
              </textarea>              
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="modal-save">Salvar Mudanças</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var token = '{{Session::token() }}';    
    var url = "{{ route('post.update') }}";
    var urlLike = "{{ route('like') }}";
</script>


@endsection