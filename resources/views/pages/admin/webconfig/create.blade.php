@extends('layouts.admin')

@section('title')
    Content Website
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.web-configcontent.store') }}" method="post">
                @csrf
                <div class="row">
                    @forelse ($items as $index => $item)
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label required">
                                {{ ucfirst(str_replace('_', ' ', $item->flag)) }}
                            </label>
                            <input type="text" required class="form-control" value="{{ $item->content }}"
                                name="data[{{ $item->flag }}]">
                        </div>
                    @empty
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label required">
                                Title Header Home
                            </label>
                            <input type="text" required class="form-control" name="data[title_header_home]">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label required">
                                Subtitle Header Home
                            </label>
                            <input type="text" required class="form-control" name="data[subtitle_header_home]">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label required">
                                Title About
                            </label>
                            <input type="text" required class="form-control" name="data[title_about]">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label required">
                                Subtitle About
                            </label>
                            <input type="text" required class="form-control" name="data[subtitle_about]">
                        </div>
                    @endforelse

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary">
                            Simpan Data
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
