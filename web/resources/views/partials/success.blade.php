@if(Session::has('alert'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('alert') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
    </div>

    <hr>
@endif