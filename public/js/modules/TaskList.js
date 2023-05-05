
class TaskList {
    constructor() {
        this.addTaskListModalTrigger = $('.list-item.add')
        this.addTaskListModal = $('.add-taskList-window')
        this.addTaskListModalWidget = this.addTaskListModal.find('.widget')
        this.addTaskListModalField = this.addTaskListModalWidget.find('textarea')
        this.addNewTaskListBtn = this.addTaskListModalWidget.find('button#add-taskList-btn')
        this.events()
    }

    events() {
        this.addTaskListModalTrigger.on('click', this.openAddModalWindow.bind(this))
        this.addTaskListModal.on('click', this.closeAddModalWindow.bind(this))
        this.addTaskListModalWidget.on('click', e => e.stopPropagation())
        this.addNewTaskListBtn.on('click', this.addNewTaskList.bind(this))
        this.addTaskListModalField.on('input', this.verifyAddTaskListModalWidget.bind(this))
    }

    openAddModalWindow(e) {
        e.preventDefault()

        $(this.addTaskListModal).fadeIn(200).css('display', 'flex')
        $(this.addTaskListModalField).focus()

        // Forbid scroll
        $('body').addClass('scroll-off')
        
        // Lock device orientation
        screen.orientation.lock('portrait') 
    }

    closeAddModalWindow() {
        this.addTaskListModal.fadeOut(200)

        setTimeout(() => {
            // Clear field
            this.addTaskListModalField.val('')
            // Add disabled attribute to widget button
            this.addNewTaskListBtn.attr('disabled', 'disabled')
        }, 200)

        // Allow scroll
        $('body').removeClass('scroll-off')

        // Unlock device orientation
        screen.orientation.unlock()
    }

    addNewTaskList() {
        if (this.addNewTaskListBtn[0].hasAttribute('disabled')) return 

        const taskListName = this.addTaskListModalField.val()
       
        $.ajax({
            url: this.addTaskListModalTrigger.attr('task-list-add-path'),
            type: 'POST',
            data: {name: taskListName},
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: (data) => {
                this.addListItemHTML(data)
                // Closing modal window
                this.closeAddModalWindow()
            },
            error: (error) => {
                
            }
        })
    }

    verifyAddTaskListModalWidget() {
        const taskListNameLength = this.addTaskListModalField.val().length

        if (taskListNameLength <= 0 || taskListNameLength > 20) {
            this.addNewTaskListBtn.attr('disabled', 'disabled')
            return
        }

        this.addNewTaskListBtn.removeAttr('disabled')
    }

    addListItemHTML(newTaskList) {
        $(`
            <a href="${window.location.origin + '/tasklist/' + newTaskList.id}">
                <div class="list-item">
                    ${newTaskList.name}
                    <div class="count">0</div>
                </div>
            </a>
        `).appendTo('.list').hide().fadeIn()
    }
}

export default TaskList