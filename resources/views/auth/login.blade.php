@extends('layouts.app')
@section('title')
    تسجيل الدخول
@stop
@section('content')
    <!-- Page content -->
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="#"><img src="#.svg" class="mb-4" alt=""></a>
                            <h1 class="mb-1 fw-bold">تسجيل الدخول</h1>
                        </div>
                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label"><h5>البريدالإلكتـرونـي</h5></label>
                                <input id="email" type="text" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="col-md-6">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label"><h5>كلمـة المـرور</h5></label>
                                <input id="password" type="password" placeholder="******" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="col-md-6">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input hidden="hidden" class="form-check-input" type="checkbox" checked name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary "> تسجيل الدخول</button>
                                </div>
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
