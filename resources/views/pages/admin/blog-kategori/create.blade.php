@extends('layouts.admin')

@section('title')
    Tambah Kategori Blog
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.web-configkategori-blog.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label required">
                            Nama Kategori
                        </label>
                        <input type="text" class="form-control" required placeholder="Nama Kategori" name="nama">
                        <button class="btn btn-primary mt-4">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
