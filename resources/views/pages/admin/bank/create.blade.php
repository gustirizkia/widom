@extends('layouts.admin')

@section('title')
    Tambah Data Bank
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master-data.bank.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nama
                        </label>

                        <input type="text" class="form-control" name="nama" placeholder="Nama bank" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nomor
                        </label>

                        <input type="text" class="form-control" name="nomor" placeholder="Nomor akun bank" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label required">
                            Cara Bayar
                        </label>
                        <textarea name="cara_bayar" class="kt_docs_ckeditor_classic"></textarea>
                    </div>

                </div>

                <button class="btn btn-primary mt-4">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection


@push('addScript')
    <script src="{{ asset('be/dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('.kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
