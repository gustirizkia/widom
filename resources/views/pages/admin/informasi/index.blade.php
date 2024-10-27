@extends('layouts.admin')

@section('title')
    Informasi
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-md-3">
                    <a href="{{ route('admin.web-configinformasi.create') }}" class="btn btn-primary">
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
                                Tag
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
                                    {{ $item->tag }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
