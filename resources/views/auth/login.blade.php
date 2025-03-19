<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Akademik</title>
    <meta name="description" content="Login ke Platform Akademik Terpadu">
    <meta name="author" content="Akademik">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <!-- Left Side - Form -->
            <div class="login-form-container">
                <div class="login-form-wrapper">
                    <a href="{{ url('/') }}" class="login-logo">
                        <i data-lucide="graduation-cap"></i>
                        <span>Akademik</span>
                    </a>
                    <h1>Masuk ke Akun Anda</h1>
                    <p class="login-subtitle">
                        Masukkan kredensial untuk mengakses sistem akademik
                    </p>

                    <div class="user-type-selector">
                        <button type="button" class="active" data-user-type="student">Mahasiswa</button>
                        <button type="button" data-user-type="lecturer">Dosen</button>
                        <button type="button" data-user-type="admin">Admin</button>
                    </div>

                    <form action="{{ route('login.submit') }}" method="POST" class="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="identity" id="identity-label">NPM / NIDN / Username</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="user" class="input-icon"></i>
                                <input id="identity" name="identity" type="text" required 
                                    placeholder="Masukkan NPM / NIDN / Username" 
                                    value="{{ old('identity') }}" 
                                    class="form-control @error('identity') is-invalid @enderror">
                            </div>
                            @error('identity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="lock" class="input-icon"></i>
                                <input id="password" name="password" type="password" required 
                                    placeholder="Masukkan Password">
                                <button type="button" class="password-toggle">
                                    <i data-lucide="eye" class="show-password"></i>
                                    <i data-lucide="eye-off" class="hide-password hidden"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-options">
                            <div class="remember-me">
                                <input id="remember-me" name="remember" type="checkbox">
                                <label for="remember-me">Ingat saya</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </form>
                    

                    <p class="register-text">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="register-link">Daftar Sekarang</a>
                    </p>

                    {{-- <p class="help-text">
                        Mengalami masalah? <a href="#">Hubungi admin</a>
                    </p> --}}
                </div>
            </div>

            <!-- Right Side - Image/Decoration -->
            <div class="login-banner">
                <div class="login-banner-content">
                    <i data-lucide="graduation-cap" class="banner-icon"></i>
                    <h2>Sistem Akademik Terpadu</h2>
                    <p>Platform untuk mengelola seluruh kegiatan akademik dari KRS hingga pendaftaran Sidang Skripsi.</p>
                    <div class="stats-container">
                        <div class="stat-box">
                            <p class="stat-number">10k+</p>
                            <p class="stat-label">Mahasiswa</p>
                        </div>
                        <div class="stat-box">
                            <p class="stat-number">500+</p>
                            <p class="stat-label">Dosen</p>
                        </div>
                        <div class="stat-box">
                            <p class="stat-number">50+</p>
                            <p class="stat-label">Program</p>
                        </div>
                    </div>
                </div>
                <div class="banner-footer">
                    &copy; <span id="current-year"></span> Sistem Akademik. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>
</body>
</html>
