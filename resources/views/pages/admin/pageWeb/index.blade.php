@extends('layouts.admin')

@section('title')
    Page web
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                <a href="{{ route('admin.page-web.create') }}" class="btn btn-primary">
                    Tambah Data
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>
                                Title
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
                                        <a href="{{ route('admin.page-web.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.page-web.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <div class="confirm_delete btn btn-danger btn-sm ms-3"
                                                data-message="{{ $item->nama }}">
                                                Hapus
                                            </div>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" colspan="12">
                                    Tidak ada data
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
