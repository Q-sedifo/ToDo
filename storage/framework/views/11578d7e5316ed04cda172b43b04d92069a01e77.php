

<?php $__env->startSection('title', $tasklist->name); ?>

<?php $__env->startSection('header-title'); ?>
    <div class="header-title"><?php echo e($tasklist->name); ?></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="small-title section">Tasks - <span id="tasks-count"><?php echo e($tasklist->tasks->count()); ?></span></div>
    <div class="space-between">
        <div class="add-new-task-btn"></div>
    </div>
    <div data-id="<?php echo e($tasklist->id); ?>" class="task-list <?php echo e($tasklist->tasks->count() ? '' : 'empty'); ?>">
        <?php if($tasklist->tasks->count() > 0): ?>
            <?php $__currentLoopData = $tasklist->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('components.task', compact('task'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="empty-message">
            <div class="text"><span>В цьому списку поки немає завдань</span></div>
            <img src="<?php echo e(asset('icons/meteorites.svg')); ?>">
        </div>
    </div>
    <div class="add-new-task-btn-mobile"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('components.addTaskModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/index/taskList.blade.php ENDPATH**/ ?>