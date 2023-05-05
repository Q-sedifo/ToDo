

<?php $__env->startSection('title', 'Вхід'); ?>

<?php $__env->startSection('content'); ?>
    <div class="full-wrapper">
        <form action="<?php echo e(route('login-action')); ?>" method="POST" autocomplete="on" class="account-form">
            <div class="form-title">Вітаю, увійдіть щоб розпочати</div>
            <a href="<?php echo e(route('register')); ?>"><button type="button">Створити акаунт</button></a>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div style="color: red;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="email" name="email" placeholder="Логін">
        
            <input type="password" name="password" placeholder="Пароль">
        
            <button type="submit" class="blue">Увійти</button>
            <?php echo csrf_field(); ?>
        </form>
        <img src="<?php echo e(asset('./icons/people.svg')); ?>">
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/auth/login.blade.php ENDPATH**/ ?>