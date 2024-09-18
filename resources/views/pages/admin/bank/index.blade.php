@extends('layouts.admin')


@section('title')
    Bank
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row mb-3 justify-content-between">
                    <div class="col-md-2">
                        <a href="{{ route('admin.master-data.produk.kategori.create') }}" class="btn btn-primary">
                            Tambah Data
                        </a>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-5">
                            <input type="text" class="form-control" placeholder="Cari data" name="q"
                                value="{{ request()->get('q') }}" />
                            <button class="btn btn-primary" id="basic-addon2">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Nomor Rekening
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index => $item)
                            <tr>
                                <td>
                                    {{ $items->firstItem() + $index }}
                                </td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    {{ $item->nomor }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.master-data.produk.kategori.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.master-data.bank.destroy', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn btn-light-danger confirm_delete  btn-sm ms-2"
                                                data-message="{{ $item->nama }}">
                                                Hapus
                                            </div>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">
                                    <div class="text-center fw-bold">
                                        Tidak ada data
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $items->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
