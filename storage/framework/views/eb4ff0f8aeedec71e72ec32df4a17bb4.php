<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Pendaftaran Sistem Akademik">
    <title>Daftar - Sistem Akademik</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@0.263.1/dist/umd/lucide.min.js"></script>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <!-- Left Side - Form -->
            <div class="login-form-container">
                <div class="login-form-wrapper">
                    <a href="<?php echo e(url('/')); ?>" class="login-logo">
                        <i data-lucide="graduation-cap"></i>
                        <span>Sistem Akademik</span>
                    </a>
                    
                    <h1>Buat Akun Baru</h1>
                    <p class="login-subtitle">
                        Silakan isi data sesuai dengan peran Anda
                    </p>
            
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
            
                    <!-- Pilihan Peran -->
                    <div class="user-type-selector">
                        <button type="button" class="role-btn active" data-role="mahasiswa">Mahasiswa</button>
                        <button type="button" class="role-btn" data-role="dosen">Dosen</button>
                        <button type="button" class="role-btn" data-role="admin">Admin</button>
                    </div>
            
                    <!-- Form -->
                    <form action="<?php echo e(route('register.submit')); ?>" method="POST" class="login-form" id="registerForm">
                        <?php echo csrf_field(); ?>
            
                        <!-- Input untuk role (hidden) -->
                        <input type="hidden" name="role" id="user-role" value="mahasiswa">
            
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="user" class="input-icon"></i>
                                <input id="name" name="name" type="text" required 
                                    placeholder="Masukkan Nama Lengkap" value="<?php echo e(old('name')); ?>" 
                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
            
                        <!-- Input Identity (NPM, NIDN, Username) -->
                        <div class="form-group">
                            <label for="identity">NPM / NIDN / Username</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="id-card" class="input-icon"></i>
                                <input id="identity" name="identity" type="text" required 
                                    placeholder="Masukkan Identitas" value="<?php echo e(old('identity')); ?>" 
                                    class="form-control <?php $__errorArgs = ['identity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            </div>
                            <?php $__errorArgs = ['identity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
            
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon-wrapper">
                                <i data-lucide="lock" class="input-icon"></i>
                                <input id="password" name="password" type="password" required 
                                    placeholder="Buat Password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <button type="button" id="togglePassword" class="password-toggle">
                                    <i data-lucide="eye" class="toggle-icon"></i>
                                </button>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        <a href="<?php echo e(route('login')); ?>" class="register-link">Masuk</a>
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
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
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
<?php /**PATH D:\1 Semester 6\Teknologi Web\Tugas Kelompok Project\Akademik Prototype Laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>