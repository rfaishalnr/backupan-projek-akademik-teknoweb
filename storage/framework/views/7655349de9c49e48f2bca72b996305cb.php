
<?php $__env->startSection('content'); ?>
    <h1>Dashboard Mahasiswa</h1>
    <p>Selamat datang, <?php echo e(Auth::user()->name); ?>!</p>
    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit">Logout</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\1 Semester 6\Teknologi Web\Tugas Kelompok Project\Akademik Prototype Laravel\resources\views/dashboard/dashboard-mahasiswa.blade.php ENDPATH**/ ?>