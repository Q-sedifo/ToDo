
// Our modules / classes
import Message from './modules/Message.js'
import Header from './modules/Header.js'
import Task from './modules/Task.js'
import TaskList from './modules/TaskList.js'
import Widget from './modules/Widget.js'


// Instantiate a new object using our modules/classes
window.onload = () => {
    const message = new Message()
    const header = new Header()
    const task = new Task()
    const taskList = new TaskList()
    const widget = new Widget()
}
