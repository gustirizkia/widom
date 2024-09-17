@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-2">
                    <a href="{{ route('admin.web-configblog.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.web-configblog.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('admin.web-configblog.destroy', $item->id) }}"
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
                                    <div class="text-center">
                                        Tidak ada data
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
