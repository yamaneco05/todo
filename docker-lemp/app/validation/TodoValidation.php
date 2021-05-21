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
    private $todoId;
    private $title;
    private $detail;
    private $deadline_at;
    
    public function check() {

        if($this->getData()['title'] === "") {
            $this->errors[] = "タスクが入力されていません。\n戻るボタンで戻り、タスクを入力してください。";
        }
        if( !is_string($this->getData()['title'])) {
            $this->errors[] = "戻るボタンで戻り、タスク名を入力してください。";
        }
        if( !is_string($this->getData()['detail'])) {
            $this->errors[] = "戻るボタンで戻り、詳細を入力してください。";
        }
        if(mb_strlen($this->getData()['detail']) > 50){
            $this->errors[] = "文字数の制限（50文字）を超えています。";
        }
        if($this->getData()['detail'] === "") {
            $this->errors[] = "詳細が入力されていません。\n戻るボタンで戻り、詳細を入力してください。";
        }
       if ($this->getData()['deadline_at'] == null) {
            $this->errors[] = "期限が入力されていません。\n戻るボタンで戻り、期限を入力してください。";
        }
        if ( !strptime($this->getData()['deadline_at'], '%Y-%m-%d')) {
            $this->errors[] = "日付の形式が正しくありません。\n戻るボタンで戻り、正しい日付を入力してください。";
        }
        if ( !empty($this->errors)) {
        return false;  
        }
        return true;
    }
    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }
}

?>