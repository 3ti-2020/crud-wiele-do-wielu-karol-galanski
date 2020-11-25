const todoList = document.querySelector("#todoList");
const todoForm = document.querySelector("#todoForm");
const todoSearch = document.querySelector("#todoSearch");
const todoTextarea = todoForm.querySelector('textarea');

function addTask(text) {
    console.log("Dodaję zadanie do listy")
}

todoForm.addEventListener("submit", e => {
    e.preventDefault();

    if (todoTextarea.value !== "") {
        addTask(todoTextarea.value);
        todoTextarea.value = "";
    }
});