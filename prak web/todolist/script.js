document.getElementById('add-btn').addEventListener('click', addTask);

function addTask() {
    const taskInput = document.getElementById('todo-input');
    const taskValue = taskInput.value.trim();

    if (taskValue !== '') {
        const taskList = document.getElementById('todo-list');
        const taskItem = document.createElement('li');

        taskItem.innerHTML = `
            <span class="task">${taskValue}</span>
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
        `;

        taskList.appendChild(taskItem);
        taskInput.value = '';

        taskItem.querySelector('.delete-btn').addEventListener('click', deleteTask);
        taskItem.querySelector('.edit-btn').addEventListener('click', editTask);
    }
}

function deleteTask() {
    const taskItem = this.parentNode;
    taskItem.remove();
}

function editTask() {
    const taskItem = this.parentNode;
    const taskText = taskItem.querySelector('.task').innerText;

    if (!taskItem.classList.contains('edit-mode')) {
        // taskItem.classList.add('edit-mode');
        const inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.value = taskText;
        taskItem.insertBefore(inputField, taskItem.firstChild);
        this.textContent = 'Save';
    } else {
        const inputField = taskItem.querySelector('input[type="text"]');
        taskItem.querySelector('.task').innerText = inputField.value;
        taskItem.removeChild(inputField);
        taskItem.classList.remove('edit-mode');
        this.textContent = 'Edit';
    }
}
