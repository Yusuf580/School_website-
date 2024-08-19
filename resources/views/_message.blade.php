@if(!empty(session('success')))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        {{ session('success')}}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-success" role="alert">
        {{ session('error')}}
    </div>
@endif
