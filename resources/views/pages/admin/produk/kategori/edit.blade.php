@extends('layouts.admin')

@section('title')
    Edit Kategori Produk
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master-data.produk.kategori.update', $kategori->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nama
                        </label>

                        <input type="text" class="form-control" name="nama" placeholder="Nama Kategori"
                            value="{{ $kategori->nama }}" required>
                    </div>
                </div>

                <button class="btn btn-primary mt-4">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
