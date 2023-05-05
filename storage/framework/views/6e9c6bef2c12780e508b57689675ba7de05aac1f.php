<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <!-- Link the shortcut icon -->
    <link rel="shortcut icon" href="<?php echo e(asset('icons/icon.svg')); ?>">
    <title>ToDoApp - <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Link JS scripts -->
    <script type="module" src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- Link fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <!-- Link styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="<?php echo e(asset('pwaIcon.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('/manifest.json')); ?>">
</head><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/components/head.blade.php ENDPATH**/ ?>