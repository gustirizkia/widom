@extends('layouts.admin')

@section('title')
    Tambah Data Jasa
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.jasa.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Image
                        </label>

                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nama
                        </label>

                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Deskripsi Singkat
                        </label>

                        <input type="text" class="form-control" name="deskripsi_singkat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Deskripsi Singkat
                        </label>

                        <select name="kategori_id" class="form-select" data-control="select2"
                            data-placeholder="Pilih Kategori" required>
                            <option value=""></option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-lable required">
                            Body
                        </label>
                        <textarea id="kt_docs_tinymce_basic" name="body" class="tox-target kt_docs_tinymce_basic"></textarea>
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
    <script src="/be/dist/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script>
        var options = {
            selector: ".kt_docs_tinymce_basic",
            height: "480"
        };

        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);
    </script>
@endpush
