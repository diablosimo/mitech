@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}} </div>
@elseif(session()->has('failed'))
    <div class="alert alert-danger">{{session()->get('failed')}} </div>
@endif