@if($errors->any() )
    <div name="geral" class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif( Session::has('error') )
    <div name="geral" class="alert alert-danger">
        <ul>            
            <li>{{ Session::get('error')   }}</li>
            
        </ul>
    </div>
@endif
@if(Session::has('message') )
    <div name="geral" class="alert alert-success ">        
        {{ Session::get('message') }}
    </div>
@endif
