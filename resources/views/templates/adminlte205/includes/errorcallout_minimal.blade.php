@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            <h4>An Error has been encountered</h4>
            <p>{{$error}}</p>
        </div>
    @endforeach
@endif