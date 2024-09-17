@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center" style="background-image: url('{{ asset('assets/media/misc/auth-bg.png') }}')">
        <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100" style="background: linear-gradient(#0470B8, #023252);">
            <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="{{ asset('dashboard/assets/media/logos/_ALLO-SERVICES-LOGO-BLANC 3.png') }}" alt="Logo"/>
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">
                Fast, Efficient and Productive
            </h1>
            <div class="d-none d-lg-block text-white fs-base text-center">
                Welcome back! Please login to your account.
            </div>
        </div>
    </div>
    <!--end::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <div class="w-lg-500px p-10">
                <!--begin::Form-->
                <form method="POST" action="{{ route('login') }}" class="form w-100" novalidate="novalidate">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            Sign In
                        </h1>
                        <div class="text-gray-500 fw-semibold fs-6">
                            Your Social Campaigns
                        </div>
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group--->
                    <div class="fv-row mb-8">
                        <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="fv-row mb-3">
                        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" required/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group--->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <a href="{{ route('password.request') }}" class="link-primary">
                            Forgot Password?
                        </a>
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Sign In</span>
                        </button>
                    </div>
                    <!--end::Submit button-->

                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Not a Member yet?
                        <a href="{{ route('register') }}" class="link-primary">
                            Sign up
                        </a>
                    </div>
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
@endsection
