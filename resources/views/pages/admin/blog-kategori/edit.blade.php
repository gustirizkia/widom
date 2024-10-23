@extends('layouts.admin')

@section('title')
    Edit Kategori Blog
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.web-configkategori-blog.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label required">
                            Nama Kategori
                        </label>
                        <input type="text" class="form-control" required placeholder="Nama Kategori" name="nama"
                            value="{{ $item->nama }}">
                        <button class="btn btn-primary mt-4">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
