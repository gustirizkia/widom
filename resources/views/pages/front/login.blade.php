@extends('layouts.front')

@section('title')
    Login Akun WISDOM
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <img src="{{ asset('image/wisdom_logo.png') }}" alt="Wisdom Logo" class="img-fluid logo"
                                style="width: 64px">
                            <h3 class="mb-0">Sign in</h3>
                        </div>
                        <form action="{{ route('prosesLogin') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">
                                    Email
                                </label>

                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    Password
                                </label>

                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn_primary w-100 mt-4">Register</button>

                            <div class="text-center mt-3">
                                New to Wisdom ?
                                <a href="/register" class="fw-bold text-dark">Create
                                    Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
