

<?php $__env->startSection('title', 'Мій день'); ?>

<?php $__env->startSection('header-title'); ?>
    <div class="header-title">мій день</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="space-between section">
            <div class="small-title">Tasks - <span id="tasks-count"><?php echo e($tasks->count()); ?></span></div>
            <div class="date"><?php echo e($date->translatedFormat('l, j F')); ?></div>
        </div>
        <div class="add-new-task-btn"></div>
        <div data-id="0" class="task-list <?php echo e($tasks->count() ? '' : 'empty'); ?>">
            <?php if($tasks->count() > 0): ?>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.task', compact('task'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="empty-message">
                <div class="text">
                    <div>Привіт, <span><?php echo e(auth()->user()->name); ?>.</span></div>
                    Поки немає завдань на сьогодні
                </div>
                <img src="<?php echo e(asset('icons/meteorites.svg')); ?>">
            </div>
        </div>
        <div class="add-new-task-btn-mobile"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('components.addTaskModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/index/myday.blade.php ENDPATH**/ ?>