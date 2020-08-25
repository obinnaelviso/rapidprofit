@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('failed'))
    <div class="alert alert-danger" role="alert">
    {{ session()->get('failed') }}
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning" role="alert">
    {{ session()->get('warning') }}
    </div>
@endif
