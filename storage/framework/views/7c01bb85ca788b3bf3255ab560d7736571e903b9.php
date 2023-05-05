

<?php $__env->startSection('title', 'Акаунт'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="account-card">
            <div class="title">Обліковий запис <div class="account-ava"><img src="<?php echo e(asset('icons/user.svg')); ?>"></div></div>
            <div>#<?php echo e($user->id); ?></div>
            <div>Ім'я: <span><?php echo e($user->name); ?></span></div>
            <div>Логін: <span><?php echo e($user->email); ?></span></div>
            <div>Створено: <span><?php echo e($user->created_at); ?></span></div>
            <div>
                <a href="<?php echo e(route('logout')); ?>">
                    <div class="box-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/index/account.blade.php ENDPATH**/ ?>