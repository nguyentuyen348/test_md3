@extends('backends.layouts.mater')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE STATUS</h3>
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection

