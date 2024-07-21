@extends('layouts.admin')

@section('title')
    Tambah Item Produk
@endsection

@push('addStyle')
    <style>
        .image-input-placeholder {
            background-image: url('{{ asset('be/src/media/svg/avatars/blank.svg') }}');
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url('{{ asset('be/src/media/svg/avatars/blank-dark.svg') }}');
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.produk.item.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Nama Produk
                        </label>

                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Harga
                        </label>

                        <input type="text" class="form-control money" name="harga" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Kategori Produk
                        </label>

                        <select class="form-select" data-control="select2" name="kategori_produk_id"
                            data-placeholder="Select an option" required>
                            <option></option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Panjang
                        </label>

                        <input type="text" class="form-control" name="panjang" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Lebar
                        </label>

                        <input type="text" class="form-control" name="lebar" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Tinggi
                        </label>

                        <input type="text" class="form-control" name="tinggi" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Warna
                        </label>

                        <input type="text" class="form-control" name="warna" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Material
                        </label>

                        <input type="text" class="form-control" name="material" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Minimal order
                        </label>

                        <input type="text" class="form-control" name="minimal_order" required>
                    </div>
                </div>

                <!--begin::Image input-->
                <div class="mt-3">
                    <label for="" class="form-label">
                        Image
                    </label>
                    <div class="img_list d-flex ">

                        @for ($i = 0; $i < 4; $i++)
                            <div class="me-5">

                                <div class="image-input image-input-empty image-input-placeholder "
                                    data-kt-image-input="true">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper w-125px h-125px"></div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                class="path2"></span></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="image[]" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Remove button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Remove avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Remove button-->

                                    <!--begin::Cancel button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Cancel avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Remove avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div>

                                <div class="is_thumbnail mt-2">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" value="{{ $i }}"
                                            name="thumbnail" id="flexRadioDefault{{ $i }}" />
                                        <label class="form-check-label" for="flexRadioDefault{{ $i }}">
                                            Thumbnail
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <!--end::Image input-->

                <div class="mt-5">
                    <label for="" class="form-label">
                        Kelengkapan
                    </label>
                    <textarea name="kelengkapan" class="kt_docs_ckeditor_classic"></textarea>
                </div>
                <div class="mt-5">
                    <label for="" class="form-label">
                        Fitur
                    </label>
                    <textarea name="fitur" class="kt_docs_ckeditor_classic_fiture"></textarea>
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
        Inputmask("Rp. 999.999.999", {
            "numericInput": true
        }).mask(".money");

        ClassicEditor
            .create(document.querySelector('.kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('.kt_docs_ckeditor_classic_fiture'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
