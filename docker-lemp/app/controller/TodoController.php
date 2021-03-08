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
        $isExist = Todo::isExistById($todoId);
        if ( $isExist === false ) {
            header( "Location: ./404.php" );
            return;
        }
        $todo = Todo::findById($todoId);
        
        return $todo;
    }

    public function new() {
        //POSTパラメータ取得
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];

        //'todo_id'に該当するレコードの存在確認
        $newTodo = Todo::registerNewTodo($title, $detail, $deadline_at);
        if ( $newTodo === false ) {
            header( "Location: new.php" );
            return;
        }        
        return $todo;

    }
}

?>