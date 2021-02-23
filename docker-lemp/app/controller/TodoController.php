<?php
require_once '/var/www/html/app/model/Todo.php';
$todoId = $_GET['todo_id']; 

class TodoController {

    public function index() {

        $todos = Todo::findAll();

        return $todos;
    }

    public function detail($todoId) {

        $todo = Todo::findById($todoId);

        return $todo;
    }
}

$todos = TodoController::index();
$todo = Todo::findById($todoId);

?>