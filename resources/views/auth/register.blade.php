<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Pendaftaran Sistem Akademik">
    <title>Daftar - Sistem Akademik</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@0.263.1/dist/umd/lucide.min.js"></script>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <!-- Left Side - Form -->
            <div class="login-form-container">
                <div class="login-form-wrapper">
                    <a href="{{ url('/') }}" class="login-logo">
                        <i data-lucide="graduation-cap"></i>
                        <span>Sistem Akademik</span>
                    </a>
                    
                    <h1>Buat Akun Baru</h1>
                    <p class="login-subtitle">
                        Silakan isi data sesuai dengan peran Anda
                    </p>
            
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <!-- Pilihan Peran -->
                    <div class="user-type-selector">
                        <button type="button" class="role-btn active" data-role="mahasiswa">Mahasiswa</button>
                        <button type="button" class="role-btn" data-role="dosen">Dosen</button>
                        <button type="button" class="role-btn" data-role="admin">Admin</button>
                    </div>
            
                    <!-- Form -->
                    <form action="{{ route('register.submit') }}" method="POST" class="login-form" id="registerForm">
                        @csrf
            
                        <!-- Input untuk role (hidden) -->
                        <input type="hidden" name="role" id="user-role" value="mahasiswa">
            
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="user" class="input-icon"></i>
                                <input id="name" name="name" type="text" required 
                                    placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" 
                                    class="form-control @error('name') is-invalid @enderror">
                            </div>
                            @error('name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <!-- Input Identity (NPM, NIDN, Username) -->
                        <div class="form-group">
                            <label for="identity">NPM / NIDN / Username</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="id-card" class="input-icon"></i>
                                <input id="identity" name="identity" type="text" required 
                                    placeholder="Masukkan Identitas" value="{{ old('identity') }}" 
                                    class="form-control @error('identity') is-invalid @enderror">
                            </div>
                            @error('identity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
            
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="lock" class="input-icon"></i>
                                <input id="password" name="password" type="password" required 
                                    placeholder="Buat Password" class="form-control @error('password') is-invalid @enderror">
                                <button type="button" id="togglePassword" class="password-toggle">
                                    <i data-lucide="eye" class="toggle-icon"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <!-- Konfirmasi Password -->
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="lock" class="input-icon"></i>
                                <input id="password_confirmation" name="password_confirmation" 
                                    type="password" required placeholder="Konfirmasi Password"
                                    class="form-control">
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
            
                    <p class="register-text">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="register-link">Masuk</a>
                    </p>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const roleButtons = document.querySelectorAll(".role-btn");
        const identityLabel = document.getElementById("identity-label");
        const identityInput = document.getElementById("identity");
        const userRoleInput = document.getElementById("user-role");

        roleButtons.forEach((button) => {
            button.addEventListener("click", function () {
                // Hapus kelas "active" dari semua tombol
                roleButtons.forEach((btn) => btn.classList.remove("active"));
                this.classList.add("active");

                // Ubah nilai role yang akan dikirim ke database
                const selectedRole = this.getAttribute("data-role");
                userRoleInput.value = selectedRole;

                // Ubah label dan placeholder sesuai role
                if (selectedRole === "mahasiswa") {
                    identityLabel.textContent = "NPM";
                    identityInput.placeholder = "Masukkan NPM";
                } else if (selectedRole === "dosen") {
                    identityLabel.textContent = "NIDN";
                    identityInput.placeholder = "Masukkan NIDN";
                } else {
                    identityLabel.textContent = "Username";
                    identityInput.placeholder = "Masukkan Username";
                }
            });
        });
    });
</script>


</body>
</html>
