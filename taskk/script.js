const alertMessage = document.querySelector(".alert");
const noneInputsContainer = document.querySelector(".task-controls");

const addTask = document.getElementById("addTask");
const clearAllButton = document.querySelector(".clear-btn");

const dateInput = document.getElementById("taskdate");
const addTaskName = document.getElementById("taskName");
const taskPriority = document.getElementById("priority");

const allTasksButton = document.getElementById("allTasks");
const activeTasksButton = document.getElementById("activetasks");
const completedTasksButton = document.getElementById("completedtasks");

const taskList = document.getElementById("tasksTable");
const tableRows = taskList.getElementsByTagName("tr");


addTask.addEventListener("click", () => {
    if (validateTaskInput()) {
        addTaskToTable();
        noneInputsContainer.style.display = "block";
    } else {
        alertMessage.classList.remove("d-none");
        setTimeout(() => {
            alertMessage.classList.add("d-none");
        }, 2500);
    }
});

clearAllButton.addEventListener("click", () => {
    clearAllTasks();
});

function validateTaskInput() {
    const taskName = addTaskName.value;
    const dueDate = dateInput.value;
    const priority = taskPriority.value;
    return taskName.trim() !== "" && dueDate !== "" && priority !== "";
}


function addTaskToTable() {
    const taskName = addTaskName.value;
    const dueDate = dateInput.value;
    const priority = taskPriority.value;

    if (taskName) {
        const taskRow = createTaskRow(taskName, dueDate, priority);
        taskList.appendChild(taskRow);
        addTaskName.value = "";
        dateInput.value = "";
        taskPriority.value = "";

        const isEmpty = taskList.getElementsByTagName("tr").length <= 1;
        clearAllButton.classList.toggle("d-none", isEmpty);
        noneInputsContainer.style.display = isEmpty ? "none" : "block";
        allTasksButton.click();
    }
}