<?php

require_once '/var/www/html/app/validation/TodoValidation.php';

class LoginValidation extends BaseValidation{

    private $data;
    
    public function check() {

        if( $this->data['mail'] === "") {
            $this->errors[] = "メールアドレスが入力されていません。\n戻るボタンで戻り、メールアドレスを入力してください。";
        }
        if ( !filter_var($this->data['mail'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] =  "メールアドレスの形式が不正です。\n戻るボタンで戻り、正しいメールアドレスを入力してください。";
        }
        if( !is_string($this->data['password'])) {
            $this->errors[] = "戻るボタンで戻り、詳細を入力してください。";
        }
        if( mb_strlen($this->data['password']) > 30){
            $this->errors[] = "文字数の制限（30文字）を超えています。";
        }
        if( $this->data['password'] === "") {
            $this->errors[] = "パスワードが入力されていません。\n戻るボタンで戻り、パスワードを入力してください。";
        }
        if ( count($this->errors) > 0) {
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