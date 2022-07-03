


<?php $__env->startSection('meta'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel= "stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel= "stylesheet" href="<?php echo e(asset('css/styles_search.css')); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/search.js')); ?>" defer ></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
Search
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="main">
    <h1 id="title">
        Case in vendita a : <?php echo e($case[0]->citta); ?>

    </h1>

    <h2 id="risultati">
        Trovati <?php echo e($totCase); ?> risultati
    </h2>

    <form action="" method="post" class="home__search" name="form_search">
        <?php echo csrf_field(); ?>
                <div class="search">
                    <i class='bx bxs-map'></i>
                    <input type="search" name="citta" placeholder="Search by location..."  class="search-input">
                </div>
                <input type="submit" value= "Search" class="button">
            </form>

    
    <div class="search_container section">

        <!-- carico la prima volta con php -->                                  
        <?php $__currentLoopData = $case; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
            <a href="<?php echo e(url('post/'.$casa->id_casa)); ?>">
                <div class="div_img">
                <img src= <?php echo e($casa->img); ?> alt="" class="card_img">
                </div>

                <div class="card_data">
                        
                        <h3 class="card_title">
                        <?php echo e($casa->nome); ?>                            
                        </h3>


                        <h2 class="card_price">
                            <span>€</span><?php echo e($casa->prezzo); ?>

                        </h2>


                        <p class="card_description">
                            <?php echo e($casa->descrizione); ?>

                        </p>
                </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        


    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Giuseppe\Desktop\web programming\hw2\resources\views/search.blade.php ENDPATH**/ ?>