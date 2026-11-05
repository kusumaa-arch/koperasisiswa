@extends('layouts.admin')

@section('title', 'Login Admin | Kopsis Skansaba Syariah')

@section('content')
    <section class="admin-login-wrap">
        <div class="admin-login-card">
            <span class="admin-eyebrow">Area khusus pengelola</span>
            <h1>Login Admin</h1>
            <p>Masuk untuk mengelola katalog produk Kopsis.</p>

            @if ($errors->has('credentials'))
                <div class="admin-alert admin-alert-error" role="alert">{{ $errors->first('credentials') }}</div>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST" class="admin-form">
                @csrf
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" required autofocus>
                @error('username')
                    <span class="admin-field-error">{{ $message }}</span>
                @enderror

                <label for="password">Password</label>
                <div class="admin-password-field">
                    <input id="password" name="password" type="password" minlength="7" autocomplete="current-password" required>
                    <button type="button" class="admin-password-toggle" aria-label="Tampilkan password" aria-pressed="false">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="admin-field-error">{{ $message }}</span>
                @enderror

                <button class="admin-button admin-button-primary admin-login-submit" type="submit">Masuk</button>
            </form>
        </div>
    </section>
    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.admin-password-toggle');

        passwordToggle.addEventListener('click', () => {
            const isVisible = passwordInput.type === 'text';
            passwordInput.type = isVisible ? 'password' : 'text';
            passwordToggle.setAttribute('aria-pressed', String(!isVisible));
            passwordToggle.setAttribute('aria-label', isVisible ? 'Tampilkan password' : 'Sembunyikan password');
            passwordToggle.innerHTML = `<i class="fa-regular ${isVisible ? 'fa-eye' : 'fa-eye-slash'}"></i>`;
        });
    </script>
@endsection
