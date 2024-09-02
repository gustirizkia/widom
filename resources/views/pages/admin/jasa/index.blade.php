@extends('layouts.admin')

@section('title')
    Jasa
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3">
                    <a href="{{ route('admin.jasa.create') }}" class="btn btn-primary">
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
                                Image
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
                                    {{ $item->image }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
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
