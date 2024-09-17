@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center" style="background-image: url('{{ asset('assets/media/misc/auth-bg.png') }}')">
        <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100" style="background: linear-gradient(#0470B8, #023252);">
            <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="{{ asset('dashboard/assets/media/logos/_ALLO-SERVICES-LOGO-BLANC 3.png') }}" alt="Logo"/>
            <h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">
                DEVENEZ VISIBLE
            </h1>
            <div class="d-none d-lg-block text-white fs-base text-center">
            </div>
        </div>
    </div>
    <!--end::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <div class="w-lg-500px p-10">
                <center><h1> <big>           Créez un compte et profitez de tous nos services</big>
                </h1></center>
                <!--begin::Form-->
                <form method="POST" action="{{ route('registers') }}" class="form w-100" novalidate="novalidate">
                    @csrf

                    <!-- Name -->
                    <div class="fv-row mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="fv-row mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control bg-transparent @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="fv-row mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="fv-row mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control bg-transparent" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!-- Role -->
                    <div class="fv-row mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control bg-transparent @error('roles') is-invalid @enderror" id="roles" name="roles" required>
                            <option value="client" {{ old('roles') == 'client' ? 'selected' : '' }}>Client</option>
                            <option value="entreprise" {{ old('roles') == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                            <option value="professionnel" {{ old('roles') == 'professionnel' ? 'selected' : '' }}>Professionnel</option>
                            <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary" style="background: #023252">
                            <span class="indicator-label">Confirmer</span>
                        </button>
                    </div>

                    <!-- Already have an account? -->
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Already have an account?
                        <a href="{{ route('login') }}" class="link-primary">
                            Sign in
                        </a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
@endsection
