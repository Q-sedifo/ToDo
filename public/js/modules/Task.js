
class Task {
    constructor() {
        this.taskCount = $('#tasks-count')
        this.addTaskModal = $('.add-task-window')
        this.addTaskModalWidget = this.addTaskModal.find('.widget')
        this.addTaskModalWindowInputs = $('.widget input, textarea')
        this.newTaskNameField = this.addTaskModalWidget.find('textarea')
        this.addNewTaskBtn = this.addTaskModalWidget.find('button#add-task-btn')
        this.newTaskHours = this.addTaskModalWidget.find('#task-hours')
        this.newTaskMinutes = this.addTaskModalWidget.find('#task-minutes')
        this.events()
    }

    events() {
        $('.task-list').on('click', '.complete-task-btn', this.completeTask.bind(this)) 
        $('.task-list').on('click', '.delete-task-btn', this.deleteTask.bind(this)) 
        $('.add-new-task-btn, .add-new-task-btn-mobile').on('click', this.openAddTaskModalWindow.bind(this))
        this.addTaskModal.on('click', this.closeAddTaskModalWindow.bind(this))
        this.addTaskModalWidget.on('click', (e) => e.stopPropagation())
        this.newTaskNameField.on('input', this.verifyAddTaskModalWidget.bind(this))
        this.addNewTaskBtn.on('click', this.addNewTask.bind(this)) 
        this.newTaskHours.on('input', this.validateTaskHours.bind(this))
        this.newTaskMinutes.on('input', this.validateTaskMinutes.bind(this))
    }

    completeTask(e) {
        e.preventDefault()
    
        const thisTask = $(e.target).parents('.task')
        const thisTaskId = thisTask.data('id')
        
        if ($('.task-list .task').length > 1) {
            if (!thisTask.hasClass('done')) {
                thisTask.appendTo('.task-list').hide().fadeIn()
            } 
            else {
                thisTask.prependTo('.task-list').hide().fadeIn()
            }
        }

        thisTask.toggleClass('done')

        $.ajax({
            url: `${location.origin}/task/complete/${thisTaskId}`,
            type: 'POST',
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            error: (error) => {
                thisTask.toggleClass('done')
            }
        })
    }

    deleteTask(e) { 
        e.preventDefault()

        const thisTask = $(e.target).parents('.task');
        const thisTaskId = thisTask.data('id')

        thisTask.find('.delete-task-btn').attr('disabled', 'disabled') // Blocking delete btn
        thisTask.fadeOut(300)
        
        $.ajax({
            url: `${location.origin}/task/delete/${thisTaskId}`,
            type: 'POST',
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: () => {
                thisTask.remove()
                this.decreaseTaskCount()

                // If no tasks show then assign class "empty" to tasklist and show message
                if ($('.task-list .task').length == 0) {
                    $('.task-list').addClass('empty')
                }
            },
            error: (error) => {
                thisTask.show()
                thisTask.find('.delete-task-btn').removeAttribute('disabled')
                $('.task-list').removeClass('empty')
                this.increaseTaskCount()
            }
        })
    }

    increaseTaskCount() {
        this.taskCount.text(Number(this.taskCount.text()) + 1)
    }

    decreaseTaskCount() {
        this.taskCount.text(Number(this.taskCount.text()) - 1)
    }

    openAddTaskModalWindow() {
        this.addTaskModal.fadeIn(200).css('display', 'flex')
        this.newTaskNameField.focus()

        // Forbid scroll
        $('body').addClass('scroll-off')
        
        // Lock device orientation
        screen.orientation.lock('portrait') 
    }

    closeAddTaskModalWindow() {
        this.addTaskModal.fadeOut(200)

        setTimeout(() => {
            // Clear fields
            this.addTaskModalWindowInputs.each(function() {
                $(this).val('')
            })
            // Add disabled attribute to widget button
            this.addNewTaskBtn.attr('disabled', 'disabled')
        }, 200)

        // Allow scroll
        $('body').removeClass('scroll-off')

        // Unlock device orientation
        screen.orientation.unlock()
    }

    verifyAddTaskModalWidget() {
        const newTaskNameLength = this.newTaskNameField.val().length

        if (newTaskNameLength <= 0 || newTaskNameLength > 200) {
            this.addNewTaskBtn.attr('disabled', 'disabled')
            return
        }

        this.addNewTaskBtn.removeAttr('disabled')
    }

    addNewTask() {
        const taskName = this.newTaskNameField.val()
        const taskList = $('.task-list').data('id')
        let taskTime = ''

        if (this.newTaskHours.val().length > 0 && this.newTaskMinutes.val().length > 0) {
            taskTime = this.newTaskHours.val() + ':' + this.newTaskMinutes.val()
        }
        
        $.ajax({
            url: `${location.origin}/task/create`,
            type: 'POST',
            data: {
                name: taskName,
                time: taskTime,
                tasklist: taskList
            },
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: (data) => {
                console.log(data)
                this.closeAddTaskModalWindow()
                this.addTaskHTML(data) 
                this.increaseTaskCount()
                $('.task-list').removeClass('empty')
            },
            error: (error) => {
                console.log(error)
            }
        })
    }

    validateTaskHours() {
        const value = this.newTaskHours.val()
        
        if (!parseInt(value[value.length - 1], 10)) {
            this.newTaskHours.val(value.slice(0, -1))
        }
        if (value >= 24) {
            this.newTaskHours.val(23)
        }
        if (value.length > 2) {
            this.newTaskHours.val(value.slice(0, -1))
        }
        if (value.length == 2) this.newTaskMinutes.focus()
    }

    validateTaskMinutes() {
        const value = this.newTaskMinutes.val()
        
        if (!parseInt(value[value.length - 1], 10)) {
            this.newTaskMinutes.val(value.slice(0, -1))
        }
        if (value > 59) {
            this.newTaskMinutes.val('00')
        }
        if (value.length > 2) {
            this.newTaskMinutes.val(value.slice(0, -1))
        }
    }

    addTaskHTML(task) {
        $(`
            <div class="task" data-id="${task.id}">
                <form class="completeForm" action="" method="POST">
                    <button class="complete-task-btn btn-icon" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
                    </button>
                </form>
                <div class="wrap-task-content">
                    <div class="content">${task.content}</div>
                    <div class="time">${task.time ? task.time : ''}</div>
                </div>
                <form class="deleteForm" action="" method="POST">
                    <button class="delete-task-btn btn-icon" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/></svg>
                    </button>
                </form>
            </div>
        `).prependTo('.task-list').hide().fadeIn()
    }
}

export default Task
