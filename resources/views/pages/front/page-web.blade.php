@extends('layouts.front')

@section('content')
    <div class="container">
        <img src="{{ asset("storage/$data->image") }}" alt="Wisdom" class="img-fluid w-100">
        <h1 class="h2 my-3">
            {{ $data->nama }}
        </h1>
        {!! $data->body !!}
    </div>
@endsection
