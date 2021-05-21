<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';
require_once '/var/www/html/app/validation/TodoValidation.php';


class TodoController {
    public $data = array();

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
            header( "Location: ../error/404.php;" );
            return;
        }
        $todo = Todo::findById($todoId);
        
        return $todo;
    }

    public function createArray() {

        //POSTパラメータ取得
        $todoId = $_POST['id'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $deadline_at = $_POST['deadline_at'];
                
        //バリデーションチェック用配列
        $data = array();
        $data = array(
            "id" => $todoId,
            "title" => $title,
            "detail" => $detail,
            "deadline_at" => $deadline_at
            );
        return $data;
    }

    public function confirm() {
        //POSTメッセージでなければ入力画面へリダイレクトする
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header( "Location: new.php" );
            exit();
        }
        //配列とID取得
        $data = $this->createArray();
        $todoId = $_POST['id'];

        //ここでバリデーションクラスのcheckメソッドを呼ぶ
        $validation = new TodoValidation;
        $validation->setData($data); 
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
        $todo = new Todo;

        //配列とID取得
        $data = $this->createArray();
        $todoId = $_POST['id'];
        
        //セッターにデータをセットして新規登録
        $todo->setData($data);
        $newTodo = $todo->create();
 
        if ( $newTodo === false ) {
            header( "Location: new.php" );
            return;
        }        
        return $newTodo;
    }

    public function edit() {
        //GETパラメータ取得
        $todoId = $_GET['todo_id'];
        //'todo_id'に該当するレコードの取得
        $isExist = Todo::isExistById($todoId);
        if ( $isExist === false ) {
            header( "Location: ../view/error/404.php" );
            return;
        }
        $todo = Todo::findById($todoId);
        
        return $todo;
    }

    public function editConfirm() {

        //POSTメッセージでなければ入力画面へリダイレクトする
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header( "Location: detail.php" );
            exit();
        }

        //配列とID取得
        $data = $this->createArray();
        $todoId = $_POST['id'];

        //ここでバリデーションクラスのcheckメソッドを呼ぶ
        $validation = new TodoValidation;
        $validation->setData($data); 
        $check = $validation->check();
       
        //もしチェックがNGなら、再度、編集画面にリダイレクトする
        if ( $check == false ) {
            session_start();
                   
            $_SESSION['error'] = $validation->getErrorMessages(); 
            header( "Location: edit.php?todo_id=$todoId;" );
            exit();
        }
        return true;
    }

    public function editComplete() {
        $todo = new Todo;
        
        //配列とID取得
        $data = $this->createArray();
        $todoId = $_POST['id'];

        //セッターにデータをセットして更新
        $todo->setData($data);
        $editTodo = $todo->update();

        if ( $editTodo === false ) {
            header( "Location: edit.php?todo_id=$todoId;" );
            exit();
        }        
        return $editTodo;
    }
}

?>