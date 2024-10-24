@extends('layouts.admin')

@section('title')
    Edit Data Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.akses.admin.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Nama Depan
                        </label>
                        <input type="text" class="form-control" required name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Nama Belakang
                        </label>
                        <input type="text" class="form-control" required name="last_name" value="{{ $user->last_name }}">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Email
                        </label>
                        <input type="email" class="form-control" required name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Password
                        </label>
                        <input type="password" min="6" class="form-control" name="password">
                        <small>*Kosongkan jika tidak ingin diubah</small>
                    </div>
                </div>

                <button type="submit" class="mt-5 btn btn-primary">
                    Update Data
                </button>
            </form>
        </div>
    </div>
@endsection
