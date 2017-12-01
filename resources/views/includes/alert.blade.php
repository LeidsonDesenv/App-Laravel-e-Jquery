 @if($errors->any() )
    <div name="geral" class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('message') )
    <div name="geral" class="alert alert-success ">        
        {{ Session::get('message') }}
    </div>
@endif
