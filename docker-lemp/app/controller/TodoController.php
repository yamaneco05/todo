<?php
require_once '/var/www/html/app/model/Todo.php';

class TodoController {

    public function index() {

        $todos = Todo::findAll();

        return $todos;
    }

    public function detail() {
        //GETパラメータ取得
        $todoId = $_GET['todo_id'];
        
        //'todo_id'に該当するレコードの存在確認
        $todoId = Todo::isExistById($todoId);

        $todo = Todo::findById($todoId);

        return $todo;
    }
}

?>