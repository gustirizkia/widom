@extends('layouts.admin')

@section('title')
    Page web
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.page-web.create') }}" class="btn btn-primary">
                Tambah Data
            </a>
        </div>
    </div>
@endsection
