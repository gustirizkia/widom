@extends('layouts.admin')

@section('title')
    Edit Data Page web
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('admin.page-web.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-lable">
                            Image
                        </label>
                        <input type="file" class="form-control" name="image">
                        <small>*Kosongkan jika tidak ingin diubah</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-lable required">
                            Nama
                        </label>
                        <input type="text" class="form-control" name="nama" required value="{{ $data->nama }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-lable required">
                            Body
                        </label>
                        <textarea id="kt_docs_tinymce_basic" name="body" class="tox-target">{{ $data->body }}</textarea>
                    </div>
                </div>
                <button class="btn btn-primary">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection

@push('addScript')
    <script src="/be/dist/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script>
        var options = {
            selector: "#kt_docs_tinymce_basic",
            height: "480"
        };

        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
@endpush
