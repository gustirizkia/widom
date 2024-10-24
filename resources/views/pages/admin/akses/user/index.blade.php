@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-2 mb-3">
                    <a href="{{ route('admin.akses.user.create') }}" class="btn btn-primary">
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
                                Email
                            </th>
                            <th>
                                Tanggal Join
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $user)
                            <tr>
                                <td>
                                    {{ "$user->first_name $user->last_name" }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->created_at }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.akses.user.edit', $user->id) }}"
                                            class="btn btn-primary btn-sm me-3">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.akses.user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <span class="btn btn-danger btn-sm confirm_delete"
                                                data-message="{{ $user->first_name }}">
                                                Hapus
                                            </span>
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
