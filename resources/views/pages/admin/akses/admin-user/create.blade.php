@extends('layouts.admin')

@section('title')
    Tambah Data Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.akses.admin.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Nama Depan
                        </label>
                        <input type="text" class="form-control" required name="first_name">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Nama Belakang
                        </label>
                        <input type="text" class="form-control" required name="last_name">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Email
                        </label>
                        <input type="email" class="form-control" required name="email">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label required">
                            Password
                        </label>
                        <input type="password" min="6" class="form-control" required name="password">
                    </div>
                </div>

                <button type="submit" class="mt-5 btn btn-primary">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
