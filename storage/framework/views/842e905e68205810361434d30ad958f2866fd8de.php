<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>LARAVEL LOGIN ROLES</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo url('assets/css/app.css'); ?>" rel="stylesheet">
</head>
<body>



<?php echo $__env->make('layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br><br>
        <div class="bg-light p-5 rounded">
        <?php if(auth()->guard()->guest()): ?>
        <h1>You are not logged in!</h1>
        <p class="lead">You must login or register to view the restricted data.</p>
        <?php endif; ?>
        </div>
<?php if(auth()->guard()->check()): ?>

 
<?php $__env->startSection('content'); ?>
    <div class="row">
    <br><br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Embedded Application</h2>
            </div>
            <?php if(auth()->check() && auth()->user()->is_admin): ?>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create New Product</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->detail); ?></td>
            <td>
                <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('products.show',$product->id)); ?>">Show</a>
                    <?php if(auth()->check() && auth()->user()->is_admin): ?>
                    <a class="btn btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <?php endif; ?>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $products->links(); ?>

      
<?php $__env->stopSection(); ?>

 <script src="<?php echo url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<?php endif; ?>    
  </body>
</html>

<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\login3\resources\views/products/index.blade.php ENDPATH**/ ?>