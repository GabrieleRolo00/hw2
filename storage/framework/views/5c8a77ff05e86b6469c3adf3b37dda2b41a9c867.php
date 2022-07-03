

<?php $__env->startSection('css'); ?>

        <link rel= "stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
        <link rel= "stylesheet" href="<?php echo e(asset('css/styles_post.css')); ?>">
        <link rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src= "<?php echo e(asset('js/post.js')); ?>" defer></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js" defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <section class="main">

            <div class="indietro">
            <i class='bx bx-chevron-left' ></i>
            <h2>Torna indietro</h2>
            </div>
            
            <div class="container container_post">
                <div class="img">
                    <img src="<?php echo e(asset($casa->img)); ?>" alt="">                                                              
                </div>  
                
                <div class="data" id=>  

                    <div class="title_like">
                        <h1 class="title" name = '<?php echo e($casa->id_casa); ?>'>
                                 <?php echo e($casa->nome); ?>                                      
                        </h1>
                        <?php if(Session::get('user')!==null): ?>
                            <?php if($like != null): ?>

                                <?php if($like): ?>
                                    <i class="bx bxs-heart" id="cuore" name = '<?php echo e($casa->id_casa); ?>'></i>
                                <?php else: ?>
                                    <i class="bx bx-heart" id="cuore" ></i>
                                <?php endif; ?>

                            <?php else: ?>
                                <i class="bx bx-heart" id="cuore" ></i>
        
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>                                                        
                    

                    <h2 class="prezzo">
                        € <?php echo e($casa->prezzo); ?>   
                    </h2> 

                    <h2 class="indirizzo">
                        <?php echo e($casa->indirizzo); ?>   
                    </h2> 

                     <h2 class="descrizione">
                        <?php echo e($casa->descrizione); ?>   
                     </h2>  
                     
                     <div class="mappa">


                    </div>
                   
                </div>

            </div>
        </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Giuseppe\Desktop\web programming\hw2\resources\views/post.blade.php ENDPATH**/ ?>