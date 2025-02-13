@extends('layouts.admin')


@section('title')
    Item Produk
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row mb-3 justify-content-between">
                    <div class="col-md-2">

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tambah Data
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.master-data.produk.item.create', ['type' => 'produk']) }}">Produk</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.master-data.produk.item.create', ['type' => 'mesin']) }}">Mesin</a>
                                </li>
                            </ul>
                        </div>
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
                                Kategori
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
                                    {{ $item->kategori->nama }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.master-data.produk.item.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.master-data.produk.item.destroy', $item->id) }}"
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
