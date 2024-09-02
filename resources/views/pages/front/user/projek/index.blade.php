@extends('layouts.user')

@section('title')
    Projek Saya
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  table-striped table-sm">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama Projek
                            </th>
                            <th>
                                Deadline
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($items as $index => $item)
                            <tr>
                                <th>
                                    {{ $items->firstItem() + $index }}
                                </th>
                                <td>
                                    <a href="{{ route('projek.show', encodeHashIds($item->id)) }}" class="fw-bold text-dark">

                                        {{ $item->nama }}
                                    </a>

                                </td>
                                <td>
                                    {{ $item->deadline }}
                                </td>
                                <td>
                                    <a href="{{ route('projek.show', encodeHashIds($item->id)) }}"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center">
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
