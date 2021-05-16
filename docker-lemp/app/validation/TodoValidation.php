<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/controller/TodoController.php';

class BaseValidation {

    public $errors = array();

    public function getErrorMessages() {
        return $this->errors;
    }
}

class TodoValidation extends BaseValidation{

    public function check() {

        if($_POST['title'] === "") {
            $this->errors[] = "タスクが入力されていません。\n戻るボタンで戻り、タスクを入力してください。";
        }
        if( !is_string($_POST['title'])) {
            $this->errors[] = "戻るボタンで戻り、タスク名を入力してください。";
        }
        if( !is_string($_POST['detail'])) {
            $this->errors[] = "戻るボタンで戻り、詳細を入力してください。";
        }
        if(mb_strlen($_POST['detail']) > 50){
            $this->errors[] = "文字数の制限（50文字）を超えています。";
        }
        if($_POST['detail'] == "") {
            $this->errors[] = "詳細が入力されていません。\n戻るボタンで戻り、詳細を入力してください。";
        }
       if ($_POST['deadline_at'] == null) {
            $this->errors[] = "期限が入力されていません。\n戻るボタンで戻り、期限を入力してください。";
        }
        if ( !strptime($_POST['deadline_at'], '%Y-%m-%d')) {
            $this->errors[] = "日付の形式が正しくありません。\n戻るボタンで戻り、正しい日付を入力してください。";
        }
        if ( !empty($this->errors)) {
        return false;  
        }
        return true;
    }
}

?>