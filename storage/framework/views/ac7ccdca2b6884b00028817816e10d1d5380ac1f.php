<?php $__env->startSection('content'); ?>

    <div class="bg-light p-5 rounded">
       
        <?php if(auth()->check() && auth()->user()->is_admin): ?>
        <h1>Admin Dashboard</h1>
        <p class="lead">Only Admin users can access this section.</p>
        <?php else: ?>
        <?php if(auth()->guard()->check()): ?>
        <h1>Users Dashboard</h1>
        <p class="lead">Regular users can access this section.</p>
        <?php endif; ?>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\login3\resources\views/home/index.blade.php ENDPATH**/ ?>