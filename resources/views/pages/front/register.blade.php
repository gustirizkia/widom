@extends('layouts.front')

@section('title')
    Register Akun WISDOM
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('image/wisdom_logo.png') }}" alt="Register Wisdom" class="img-fluid"
                                style="width: 80px">
                            <h6 class="fw-bold">Create New Customer Account</h6>
                        </div>
                        <form action="{{ route('prosesRegister') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    First Name
                                </label>

                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    Last Name
                                </label>

                                <input type="text" class="form-control" name="last_name">
                            </div>
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
                            <div class="row justify-content-center mt-5 g-0">
                                <div class="col-md-8">
                                    <div class="w-100">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label ms-2" for="flexCheckDefault">
                                                I agree to the Wisdom Terms of Use and the Privacy
                                                Statement.
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn_primary w-100">Register</button>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
