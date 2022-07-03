

<?php $__env->startSection('css'); ?>

        <link rel= "stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
        <link rel= "stylesheet" href="<?php echo e(asset('css/styles_post.css')); ?>">
        <link rel= "stylesheet" href="<?php echo e(asset('css/styles_search.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src= "<?php echo e(asset('js/pref.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Preferiti
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <section class="main">

            <h1 id="title">
                Le tue preferenze
            </h1>
    
            <div class="search_container section" id="search_container">
    
                
    
            </div>

        </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Giuseppe\Desktop\web programming\hw2\resources\views/preferiti.blade.php ENDPATH**/ ?>