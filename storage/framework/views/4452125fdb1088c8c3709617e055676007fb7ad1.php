<div class="task <?php if($task->completed): ?> done <?php endif; ?>" data-id="<?php echo e($task->id); ?>">
    <form class="completeForm" action="<?php echo e(route('task-complete', $task->id)); ?>" method="POST">
        <button class="complete-task-btn btn-icon" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
        </button>
    </form>
    <div class="wrap-task-content">
        <div class="content"><?php echo e($task->content); ?></div>
        <div class="time"><?php echo e($task->time); ?></div>
    </div>
    <form class="deleteForm" action="<?php echo e(route('task-delete', $task->id)); ?>" method="POST">
        <button class="delete-task-btn btn-icon" type="submit">
            <img src="<?php echo e(asset('icons/cancelFilled.svg')); ?>">
        </button>
    </form>
</div>
<?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/components/task.blade.php ENDPATH**/ ?>