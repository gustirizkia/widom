@extends('layouts.front')

@section('title')
    Ajukan Projek
@endsection

@push('addStyle')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
        .cart_image {
            width: 130px;
        }

        .card_upload_pembayaran {
            min-height: 150px;
            /* border-radius: 10px; */
            border: 2px dashed #484848;
        }

        .card_upload_pembayaran img {
            object-fit: contain;
            height: 150px;
        }
    </style>
@endpush


@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('projek.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">
                                        Nama Project
                                    </label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">
                                        Refrensi Image
                                    </label>
                                    <input type="file" name="image" class="image_file" hidden>

                                    <div
                                        class="rounded card_upload_pembayaran w-100 d-flex justify-content-center align-items-center p-3">
                                        <div class="bg-secondary file_data w-100 rounded flex-column d-flex justify-content-center align-items-center"
                                            style="height: 150px;">
                                            <div class="">
                                                <i class="bi bi-file-earmark-arrow-up"></i>
                                            </div>
                                            <div class="fw-bold mt-2">
                                                Upload Pembayaran
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">
                                        STEP, IGES, MESH, PARASOLID
                                    </label>
                                    <input type="file" class="form-control" name="file">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" rows="6" class="form-control" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">
                                        Waktu Estimasi Selesai
                                    </label>
                                    <input type="text" class="form-control" name="deadline" id="datepicker">
                                </div>

                                <button class="btn btn_primary mt-4 w-100">
                                    Ajukan Order
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addScript')
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
        $(".card_upload_pembayaran").on("click", function() {
            console.log("Hallo");

            $(".image_file").click();
        })

        $(".image_file").on("change", function() {
            let input = $(this)[0].files[0];
            if (input) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $(".file_data").html(`
                        <img src="${e.target.result}" class="img-fluid" />

                    `)

                }
                reader.readAsDataURL(input);
            }
        })
    </script>
@endpush
