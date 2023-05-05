<!DOCTYPE html>
<html lang="en">
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    
    <main>
        <?php if(session()->has('success')): ?> 
            <div style="background-color: green;"><?php echo e(session()->get('success')); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
</body>
</html><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/layouts/auth.blade.php ENDPATH**/ ?>