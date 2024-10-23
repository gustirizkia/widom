@extends('layouts.admin')

@section('title')
    Edit Item Produk
@endsection

@push('addStyle')
    @livewireStyles

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
            <form action="{{ route('admin.master-data.produk.item.update', $produk->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Nama Produk
                        </label>

                        <input type="text" class="form-control" value="{{ $produk->nama }}" name="nama" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Harga
                        </label>

                        <input type="text" class="form-control money" value="{{ $produk->harga }}" name="harga"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Kategori Produk
                        </label>

                        <select class="form-select" data-control="select2" name="kategori_produk_id"
                            data-placeholder="Select an option" required>
                            <option></option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    {{ $produk->kategori_produk_id === $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Panjang
                        </label>

                        <input type="text" class="form-control" value="{{ $produk->panjang }}" name="panjang" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Lebar
                        </label>

                        <input type="text" class="form-control" name="lebar" value="{{ $produk->lebar }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Tinggi
                        </label>

                        <input type="text" class="form-control" name="tinggi" value="{{ $produk->tinggi }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Warna
                        </label>

                        <input type="text" class="form-control" name="warna" value="{{ $produk->warna }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Material
                        </label>

                        <input type="text" class="form-control" name="material" value="{{ $produk->material }}"
                            required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="" class="form-label required">
                            Minimal order
                        </label>

                        <input type="text" class="form-control" name="minimal_order"
                            value="{{ $produk->minimal_order }}" required>
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
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ isset($produk->image[$i]) ? asset('storage/' . $produk->image[$i]->image) : '' }})">
                                    </div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                class="path2"></span></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="image[]"
                                            value="{{ isset($produk->image[$i]) ? asset('storage/' . $produk->image[$i]->image) : '' }}"
                                            accept=".png, .jpg, .jpeg" />
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
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="ki-outline ki-cross fs-3"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div>

                                <div class="is_thumbnail mt-2">
                                    <div class="form-check form-check-custom form-check-solid">
                                        @if (isset($produk->image[$i]))
                                            <input class="form-check-input" type="radio" value="{{ $i }}"
                                                name="thumbnail" id="flexRadioDefault{{ $i }}"
                                                {{ $produk->image[$i]->is_thumbnail ? 'checked' : '' }} />
                                        @else
                                            <input class="form-check-input" type="radio" value="{{ $i }}"
                                                name="thumbnail" id="flexRadioDefault{{ $i }}" />
                                        @endif
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
                    <textarea name="kelengkapan" class="kt_docs_ckeditor_classic">{{ $produk->kelengkapan }}</textarea>
                </div>
                <div class="mt-5">
                    <label for="" class="form-label">
                        Fitur
                    </label>
                    <textarea name="fitur" class="kt_docs_ckeditor_classic_fiture">{{ $produk->fitur }}</textarea>
                </div>

                <div class="mt-5">
                    <div class="separator separator-content border-dark my-15">
                        <span class="h1">Pertanyaan</span>
                    </div>

                    <div class="my_list_pertanyaan">

                    </div>

                    <div
                        class="btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info w-100 add_pertanyaan">
                        + Pertanyaan
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
    @livewireScripts
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
        ClassicEditor
            .create(document.querySelector('.kt_docs_ckeditor_classic_fiture'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        function deletePertanyaan(idx) {

            $(`.pertanyaan_data_idx_${idx}`).remove()
        }

        let idx_pertanyaan = 0;

        $(".add_pertanyaan").on("click", function() {
            $(".my_list_pertanyaan").append(`
                <div class="row mb-3 pertanyaan_data_idx_${idx_pertanyaan}">
                    <div class="col-md-6">
                        <label for="" class="form-label">
                            Pertanyaan
                        </label>
                        <input type="text" class="form-control" required name="pertanyaan[]">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between position-relative">
                            <label for="" class="form-label">
                                Deskripsi
                            </label>
                            <div class="position-absolute " style="right: 0">
                                <div class="" onclick="deletePertanyaan(${idx_pertanyaan})">
                                    {{-- <i class="bi bi-trash3 text-danger"></i> --}}
                                    <i class="bi bi-x-circle-fill text-danger fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" name="deskripsi[]" required></textarea>
                    </div>
                </div>
            `)

            idx_pertanyaan++
        });
    </script>

    @foreach ($produk->pertanyaan as $item)
        <script>
            $(".my_list_pertanyaan").append(`
                <div class="row mb-3 pertanyaan_data_idx_${idx_pertanyaan}">
                    <div class="col-md-6">
                        <label for="" class="form-label">
                            Pertanyaan
                        </label>
                        <input type="text" class="form-control" required name="pertanyaan[]" value="{{ $item->title }}">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between position-relative">
                            <label for="" class="form-label">
                                Deskripsi
                            </label>
                            <div class="position-absolute " style="right: 0">
                                <div class="" onclick="deletePertanyaan(${idx_pertanyaan})">
                                    {{-- <i class="bi bi-trash3 text-danger"></i> --}}
                                    <i class="bi bi-x-circle-fill text-danger fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" name="deskripsi[]" required>{{ $item->deskripsi }}</textarea>
                    </div>
                </div>
            `);

            idx_pertanyaan++
        </script>
    @endforeach
@endpush
