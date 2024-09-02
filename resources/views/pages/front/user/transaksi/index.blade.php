@extends('layouts.user')

@section('title')
    Transaksi Saya
@endsection

@push('addStyle')
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Kode Invoice
                            </th>
                            <th>
                                Jumlah Transaksi
                            </th>
                            <th>
                                Jumlah Item
                            </th>
                            <th>
                                Status Transaksi
                            </th>
                            <th>
                                BANK
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('transaksi.show', $item->id) }}" class="fw-bold">
                                        {{ $item->kode }}
                                    </a>
                                </td>
                                <td>
                                    Rp. {{ number_format($item->amount) }}
                                </td>
                                <td>
                                    {{ $item->detail->sum('qty') }}
                                </td>
                                <td class="status">
                                    {{ strtoupper($item->status) }}
                                </td>
                                <td>
                                    {{ $item->bank->nama }}
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

            <div class=" mt-5">
                {{ $items->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
