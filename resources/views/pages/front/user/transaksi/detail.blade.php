@extends('layouts.user')

@section('title')
    Detail Transaksi
@endsection

@push('addStyle')
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
    <div class="card">
        <!-- begin::Body-->
        <div class="card-body py-20">
            <!-- begin::Wrapper-->
            <div class="mw-lg-950px mx-auto w-100">
                <!-- begin::Header-->
                <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                    <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">INVOICE</h4>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="pb-12">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column gap-7 gap-md-10">
                        <!--begin::Message-->
                        <div class="fw-bold fs-2">
                            {{ $transaksi->user->first_name . ' ' . $transaksi->user->last_name }} <span
                                class="fs-6">({{ $transaksi->user->email }})</span>,<br>

                        </div>
                        <!--begin::Message-->

                        <!--begin::Separator-->
                        <div class="separator"></div>
                        <!--begin::Separator-->

                        <!--begin::Order details-->
                        <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">


                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Tanggal</span>
                                <span class="fs-5">{{ $transaksi->created_at }}</span>
                            </div>

                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">No. Invoice</span>
                                <span class="fs-5">#{{ $transaksi->kode }}</span>
                            </div>

                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Metode Pembayaran</span>
                                <span class="fs-5">{{ $transaksi->bank->nama }} ({{ $transaksi->bank->nomor }})</span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Status Transaksi</span>
                                <span class="fs-5">{{ strtoupper($transaksi->status) }}</span>
                            </div>
                        </div>
                        <!--end::Order details-->

                        <!--begin::Billing & shipping-->
                        <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">
                                    Alamat
                                </span>
                                <span class="fs-6">
                                    {{ $transaksi->alamat_lengkap }}
                                </span>
                            </div>

                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Provinsi</span>
                                <span class="fs-6">
                                    {{ $transaksi->provinsi }}
                                </span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Kota</span>
                                <span class="fs-6">
                                    {{ $transaksi->kota }}
                                </span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">Kecamatan</span>
                                <span class="fs-6">
                                    {{ $transaksi->kecamatan }}
                                </span>
                            </div>
                            @if ($transaksi->bukti_bayar)
                                <div class="flex-root d-flex flex-column">
                                    <span class="text-muted">Bukti Bayar</span>

                                    <!--begin::Overlay-->
                                    <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                        href="{{ asset("storage/$transaksi->bukti_bayar") }}"
                                        style="width: 60px; height: 60px;">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded "
                                            style="background-image:url('{{ asset("storage/$transaksi->bukti_bayar") }}'); width: 60px; height: 60px;">
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                            <i class="bi bi-eye-fill text-white fs-2x"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Overlay-->
                                </div>
                            @endif
                        </div>
                        <!--end::Billing & shipping-->

                        <!--begin:Order summary-->
                        <div class="d-flex justify-content-between flex-column">
                            <!--begin::Table-->
                            <div class="table-responsive border-bottom mb-9">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                            <th class="min-w-175px pb-2">Produk</th>
                                            <th class="min-w-70px text-end pb-2">Kategori</th>
                                            <th class="min-w-80px text-end pb-2">QTY</th>
                                            <th class="min-w-100px text-end pb-2">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($transaksi->detail as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Thumbnail-->
                                                        <span class="symbol symbol-50px">
                                                            <span class="symbol-label"
                                                                style="background-image:url({{ asset('storage/' . $item->produk->imageThumbnail->image) }});"></span>
                                                        </span>
                                                        <!--end::Thumbnail-->

                                                        <!--begin::Title-->
                                                        <div class="ms-5">
                                                            <div class="fw-bold">{{ $item->produk->nama }}</div>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    {{ $item->produk->kategori->nama }}
                                                </td>
                                                <td class="text-end">
                                                    {{ $item->qty }}
                                                </td>
                                                <td class="text-end">
                                                    Rp. {{ number_format($item->harga * $item->qty) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td colspan="3" class="fs-3 text-gray-900 fw-bold text-end">
                                                Grand Total
                                            </td>
                                            <td class="text-gray-900 fs-3 fw-bolder text-end">
                                                Rp. {{ number_format($grandTotal) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end:Order summary-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Body-->
                @if ($transaksi->status === 'dalam proses')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modal__pembayaran">
                        Lakukan Pembayaran
                    </button>
                @endif
            </div>
            <!-- end::Wrapper-->

        </div>
        <!-- end::Body-->
    </div>


    <div class="modal fade" tabindex="-1" id="modal__pembayaran">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pembayaran</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">


                    <!--begin::Form-->
                    <form class="form form__bayar" action="{{ route('transaksi.update', $transaksi->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="file" name="bukti_bayar" class="image_file" hidden>
                        <div
                            class="rounded card_upload_pembayaran w-100 d-flex justify-content-center align-items-center p-3">
                            <div class="bg-secondary file_data w-100 rounded flex-column d-flex justify-content-center align-items-center"
                                style="height: 150px;">
                                <div class="">
                                    <i class="bi bi-file-earmark-arrow-up fs-3x"></i>
                                </div>
                                <div class="fw-bold mt-2">
                                    Upload Pembayaran
                                </div>

                            </div>
                        </div>
                    </form>
                    <!--end::Form-->

                    <div class="h3 mt-4">
                        Cara Melakukan Pembayaran
                    </div>
                    {!! $transaksi->bank->cara_bayar !!}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn_bayar">Kirim Bukti Bayar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addScript')
    <script src="{{ asset('be/dist/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        $(".card_upload_pembayaran").on("click", function() {
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

        $(".btn_bayar").on("click", function() {
            $(".form__bayar").submit();
        });
    </script>
@endpush
