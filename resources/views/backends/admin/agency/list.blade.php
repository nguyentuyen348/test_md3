@extends('backends.layouts.mater')
@section('title','list agency')
@section('content')
    <div>
        <p><a class="btn btn-success btn-lg" href="{{route('agency.create')}}">add book</a></p>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">phone number</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">manager</th>
                <th scope="col">status</th>
                <th colspan="2" scope="col">action</th>
            </tr>
            </thead>
            <?php
            $agencies = \App\Models\Agency::all();
            $status = \App\Models\Status::all();

            ?>
            @foreach($agencies as $agency)
                <tbody>
                <tr>
                    <th scope="row">{{$agency->id}}</th>
                    <th> {{$agency->name}}</th>
                    <th> {{$agency->phone_number}}</th>
                    <th> {{$agency->email}}</th>
                    <th> {{$agency->address}}</th>
                    <th> {{$agency->manager}}</th>
                    @if(isset($agency->status))
                        <th> @if($agency->status == 1)
                                dang hoat dong
                            @else
                                ngung hoat dong
                            @endif</th>
                    @endif
                    <th><a href="{{route('agency.edit',$agency)}}" class="btn-warning edit">edit</a></th>
                    <th><a href="{{route('agency.destroy',$agency)}}" class="btn-danger destroy"
                           onclick="confirm('are you sure')">delete</a></th>
                </tr>
                </tbody>
            @endforeach
        </table>

    </div>
@endsection
