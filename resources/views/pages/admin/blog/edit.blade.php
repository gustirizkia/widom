@extends('layouts.admin')

@section('title')
    Edit Blog
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.web-configblog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Image
                        </label>
                        <input type="file" class="form-control" name="image">
                        <small>*Kosongkan jika tidak ingin diubah</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nama
                        </label>
                        <input type="text" class="form-control" value="{{ $blog->nama }}" name="nama" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label required">
                            Deskripsi Singkat
                        </label>
                        <input type="text" class="form-control" name="deskripsi_singkat"
                            value="{{ $blog->deskripsi_singkat }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label required">
                            Body
                        </label>
                        <textarea name="body" class="kt_docs_ckeditor_classic">{!! $blog->body !!}</textarea>
                    </div>

                    <div class="col-md-12 mt-4">
                        <button class="btn btn-primary" type="submit">
                            Simpan Data
                        </button>
                    </div>
                </div>
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
