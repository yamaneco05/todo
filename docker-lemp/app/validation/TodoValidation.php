<?php
class TodoValid extends BaseValidation{

    public function check() {

        if($_POST['title'] === "") {
            $this->errors[] = "タスクが入力されていません。\n戻るボタンで戻り、タスクを入力してください。";
            return false;
        }
        if( !is_string($_POST['title'])) {
            $this->errors[] = "戻るボタンで戻り、タスク名を入力してください。";
            return false;
        }
        return true;
    }
}
?>