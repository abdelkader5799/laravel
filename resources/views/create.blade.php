@if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form action="{{ url('Store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputName">title</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
            value="{{ old('title') }} " placeholder="Enter title">
    </div>

    @csrf

    <div class="form-group">
        <label>content</label>
        <input type="content" class="form-control" id="" name="content" value="{{ old('content') }}">
    </div>










    <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
