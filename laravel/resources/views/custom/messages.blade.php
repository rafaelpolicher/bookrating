@if(session('error'))
    <div class="error">
        <p class="center">{{ session('error') }}</p>
    </div>
@endif

@if(session('success'))
    <div class="success">
        <p class="center">{{ session('success') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p class="center">{{$error}}</p>
        @endforeach
    </div>
@endif   