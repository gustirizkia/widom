@extends('layouts.admin')

@section('title')
    Detail Transaksi
@endsection

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
            </div>
            <!-- end::Wrapper-->
        </div>
        <!-- end::Body-->
    </div>
@endsection
