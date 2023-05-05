<div class="modal add-task-window">
    <div class="widget" mobile-keyboard>
        <div>
            <textarea type="text" placeholder="Нове завдання"></textarea>
        </div>
        <div class="row">
            <input id="task-hours" type="text" placeholder="Год" class="time">:<input id="task-minutes" type="text" placeholder="Хв" class="time">
        </div>
        <div class="section right">
            <button id="add-task-btn" task-add-path="{{ route('task-create') }}" type="button" disabled>Додати</button>
        </div>
    </div>
</div>