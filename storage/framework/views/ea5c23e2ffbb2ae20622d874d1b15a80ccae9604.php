<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <main>
        <?php if(session()->has('success')): ?> 
            <div class="message"><?php echo e(session()->get('success')); ?></div>
        <?php endif; ?>

        <div class="content container">
            <noscript>No javascript</noscript>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php echo $__env->yieldContent('modal'); ?>

        <!-- Pop-up window for animation -->
        <div class="pop-up"></div>
    </main>

    <!-- PWA Service worker -->
    <script src="<?php echo e(asset('/sw.js')); ?>"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>
</html><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/layouts/default.blade.php ENDPATH**/ ?>