<?php

class DateValid extends BaseValidation{

    public function check() {

        if ($_POST['deadline_at'] == null) {
            $this->errors[] = "期限が入力されていません\n戻るボタンで戻り、期限を入力してください。";
            return false;
        }

        if ( !strptime($_POST['deadline_at'], '%Y.%m.%d')) {
            $this->errors[] = "日付の形式が正しくありません。\n戻るボタンで戻り、正しい日付を入力してください。";
            return false;
        }
        return true;
    }

}