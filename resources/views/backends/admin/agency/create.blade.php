@extends('backends.layouts.mater')
@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <h3>CREATE AGENCY</h3>
            <?php
            $statuss=\App\Models\Status::all();
            ?>
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">phone number</label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number">
                @error('phone_number')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                @error('address')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">manager</label>
                <input type="text" class="form-control @error('manager') is-invalid @enderror" name="manager">
                @error('manager')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">status</label>
                @if(isset($statuss) )
                    <select class="form-control @error('status') is-invalid @enderror" id="" name="status">
                        <option>select status</option>
                        @foreach($statuss as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                @endif
                @error('status')
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection
