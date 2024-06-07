@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <li class="my-0">
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
</li>
</div>
@endif
