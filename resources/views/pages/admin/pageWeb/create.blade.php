@extends('layouts.admin')

@section('title')
    Tambah Data Page web
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('admin.page-web.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-lable required">
                            Image
                        </label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-lable required">
                            Nama
                        </label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-lable required">
                            Body
                        </label>
                        <textarea id="kt_docs_tinymce_basic" name="body" class="tox-target"></textarea>
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
