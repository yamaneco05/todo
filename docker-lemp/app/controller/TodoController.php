<?php
require_once '/var/www/html/app/model/Todo.php';

class TodoController {

    public function index() {

        $todos = Todo::findAll();

        return $todos;
    }
}

?>