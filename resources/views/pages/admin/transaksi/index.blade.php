@extends('layouts.admin')

@section('title')
    Transaksi
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
                                Nama
                            </th>
                            <th>
                                Email
                            </th>

                            <th>
                                Total Transaksi
                            </th>
                            <th>
                                Total Item
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
                                    {{ $item->user->first_name }} {{ $item->user->last_name }}
                                </td>
                                <td>
                                    {{ $item->user->email }}
                                </td>

                                <td>
                                    Rp. {{ number_format($item->amount) }}
                                </td>

                                <td>
                                    {{ $item->detail->sum('qty') }}
                                </td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.transaksi.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Detail
                                        </a>
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
