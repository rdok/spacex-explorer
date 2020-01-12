@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

@if(session()->has('alert-message'))
    <div class="alert alert-{{ session()->get('alert-class') }}">
        {{ session()->get('alert-message') }}
    </div>
@endif
