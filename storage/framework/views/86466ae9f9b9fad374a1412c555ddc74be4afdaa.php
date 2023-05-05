<div class="modal add-task-window">
    <div class="widget" mobile-keyboard>
        <div>
            <textarea type="text" placeholder="Нове завдання"></textarea>
        </div>
        <div class="row">
            <input id="task-hours" type="text" placeholder="Год" class="time">:<input id="task-minutes" type="text" placeholder="Хв" class="time">
        </div>
        <div class="section right">
            <button id="add-task-btn" task-add-path="<?php echo e(route('task-create')); ?>" type="button" disabled>Додати</button>
        </div>
    </div>
</div><?php /**PATH C:\MAMP\htdocs\ToDoApp\resources\views/components/addTaskModal.blade.php ENDPATH**/ ?>