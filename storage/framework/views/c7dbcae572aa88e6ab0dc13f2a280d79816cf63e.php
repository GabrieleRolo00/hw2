<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <?php echo $__env->yieldContent('css'); ?>

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <?php echo $__env->yieldContent('script'); ?>
        

        <title><?php echo $__env->yieldContent('title'); ?></title>  

    </head>
    <body> 
        

        <div class="container">

           
            <?php echo $__env->yieldContent('alert'); ?>

            <?php echo $__env->yieldContent('form'); ?>
            
        </div>

        
    </body>
</html><?php /**PATH C:\Users\Giuseppe\Desktop\web programming\hw2\resources\views/layouts/layoutForm.blade.php ENDPATH**/ ?>