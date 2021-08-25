@extends('backends.layouts.mater')
@section('content')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            {{--  @method('PUT')--}}
            <?php
            use App\Models\Status;$statuss= Status::all();
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $agency->name }}">
            </div>

            <div class="mb-3">
                <label  class="form-label">phone number</label>
                <input type="number" class="form-control" id="name" name="phone_number" value="{{ $agency->phone_number }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" class="form-control" id="name" name="email" value="{{ $agency->email }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control" id="name" name="address" value="{{ $agency->address }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">manager</label>
                <input type="text" class="form-control" id="name" name="manager" value="{{ $agency->manager }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">status</label>
                @if(isset($statuss) )
                    <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                        <option value="{{$agency->status->id}}">{{$agency->status->name}}</option>
                        @foreach($statuss as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <button type="submit" class="btn btn-success"> Update</button>

        </form>

    </div>
@endsection
