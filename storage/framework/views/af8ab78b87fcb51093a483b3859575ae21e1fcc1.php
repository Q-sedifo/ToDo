

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="title">Мій список</div>
        <div class="list">
            <div class="list-item add" task-list-add-path="<?php echo e(route('tasklist-create')); ?>"></div>

            <?php $__currentLoopData = $tasklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('task-list', $tasklist->id)); ?>">
                    <div class="list-item">
                        <?php echo e($tasklist->name); ?>

                        <div class="count"><?php echo e($tasklist->tasks->count()); ?></div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <div class="modal add-taskList-window">
        <div class="widget" mobile-keyboard>
            <div>
                <textarea type="text" placeholder="Створити новий список"></textarea>
            </div>
            <div class="section right">
                <button id="add-taskList-btn" type="button" disabled>Зберегти</button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/index/home.blade.php ENDPATH**/ ?>