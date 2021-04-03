<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/validation/TodoValidation.php';

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

   //ここでバリデーションクラスのcheckメソッドを呼ぶ

        $validation = new TodoValidation; 
        $check = $validation->check();
        //もしチェックがNGなら、再度、入力画面にリダイレクトする
		if ($check === false) {
            session_start();
                
            $_SESSION['error'] = $validation->getErrorMessages(); 
            header( "Location: new.php" );
            exit();
        }
        $newTodo = Todo::create($title, $detail, $deadline_at);
        if ( $newTodo === false ) {
            header( "Location: new.php" );
            return;
        }        
        return $todo;

    }
}

?>