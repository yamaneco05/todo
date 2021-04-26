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
            header( "Location: ../error/404.php" );
            return;
        }
        $todo = Todo::findById($todoId);
        
        return $todo;
    }

    public function confirm() {
        //POSTメッセージでなければ入力画面へリダイレクトする
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header( "Location: new.php" );
            exit();
        }
        //POSTパラメータ取得
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];

        //ここでバリデーションクラスのcheckメソッドを呼ぶ
        $validation = new TodoValidation; 
        $check = $validation->check();
        
        //もしチェックがNGなら、再度、入力画面にリダイレクトする
		if ( $check === false ) {
            session_start();
                
            $_SESSION['error'] = $validation->getErrorMessages(); 
            header( "Location: new.php" );
            exit();
        }
        return true;
    }

    public function register() {
        //POSTパラメータ取得
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];

        //データベースへ新規登録
        $newTodo = Todo::create($title, $detail, $deadline_at);
        if ( $newTodo === false ) {
            header( "Location: new.php" );
            return;
        }        
        return $newTodo;
    }

    public function edit() {
        //POSTパラメータ取得
        $todoId = $_POST['todoId'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];

        return true;
    }

    public function editConfirm() {
        // if($_SERVER["REQUEST_METHOD"] != "POST"){
        //     header( "Location: editConfirm.php" );
        //     exit();
        // }

        //POSTパラメータ取得
        $todoId = $_POST['todoId'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];

        //ここでバリデーションクラスのcheckメソッドを呼ぶ
        // $validation = new TodoValidation; 
        // $check = $validation->check();
        
        // //もしチェックがNGなら、再度、編集画面にリダイレクトする
		// if ( $check === false ) {
        //     session_start();
                
        //     $_SESSION['error'] = $validation->getErrorMessages(); 
        //     header( "Location: editConfirm.php" );
        //     exit();
        // }
        return true;
    }

    public function editComplete() {

        //POSTパラメータ取得
        $todoId = $_POST['todoId'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];
        //$updated_at = date("Y-m-d H:i:s");

        //データベースの編集
        $editTodo = Todo::change($todoId, $title, $detail, $deadline_at, $updated_at);
        if ( $editTodo === false ) {
            header( "Location: edit.php" );
            return;
        }        
        return $editTodo;
    }
}

?>