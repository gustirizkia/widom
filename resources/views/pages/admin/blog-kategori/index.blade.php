@extends('layouts.admin')

@section('title')
    Kategori Blog
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4 justify-content-between">
                <div class="col-md-3">
                    <a href="{{ route('admin.web-configkategori-blog.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                URL
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $kategoriBlog)
                            <tr>
                                <td>
                                    {{ $kategoriBlog->nama }}
                                </td>
                                <td>
                                    {{ url('blog') . "?kategori=$kategoriBlog->slug" }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.web-configkategori-blog.edit', $kategoriBlog->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.web-configkategori-blog.destroy', $kategoriBlog->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn btn-light-danger confirm_delete  btn-sm ms-2"
                                                data-message="{{ $kategoriBlog->nama }}">
                                                Hapus
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="12" class="text-center">
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
