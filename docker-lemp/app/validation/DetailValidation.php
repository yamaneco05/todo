<?php
class DetailValid extends BaseValidation{

    public function check() {

        if($_POST['detail'] == "") {
            $this->errors[] = "詳細が入力されていません。\n戻るボタンで戻り、詳細を入力してください。";
            return false;
        }
        if( !is_string($_POST['detail'])) {
            $this->errors[] = "戻るボタンで戻り、詳細を入力してください。";
            return false;
        }
        if(mb_strlen($_POST['detail']) > 50){ 
            $this->errors[] = "文字数の制限（50文字）を超えています。";
            return false;
        }
        return true;
    }
}