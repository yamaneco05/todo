<?php
require_once '/var/www/html/app/model/Todo.php';
require_once '/var/www/html/app/model/User.php';
require_once '/var/www/html/app/validation/LoginValidation.php';

class LoginController {

    public $mail;
    public $password;
    public $user;
    public $userInfo;
    public $enterPassword;
    public $data;

    public function login() {

        //POSTメッセージでなければ入力画面へリダイレクトする
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header( "Location: login.php" );
            exit();
        }

        //配列とID取得
        $data = $this->loginCreateArray();

        //ここでバリデーションクラスのcheckメソッドを呼ぶ
        $validation = new LoginValidation;
        $validation->setData($data); 
        $check = $validation->check();
        
        //もしチェックがNGなら、再度、入力画面にリダイレクトする
        if ( $check === false ) {
            session_start();
                        
            $_SESSION['error'] = $validation->getErrorMessages(); 
            header( "Location: login.php" );
            exit();
        }

        $mail = $data['mail'];
        $enterPassword = $data['password'];

        $user = new User;
        $userInfo = $user->findByMail($mail);

        $password = $userInfo['password'];

        if ( $password == $enterPassword ) {
            
                session_start();
                //$_SESSION['userInfo'] = array();  //セッションの内容削除
       
                $_SESSION['userInfo'] = $user->findByMail($mail); 
                return;
        }
        return true;
    }

    public function loginCreateArray() {

        //POSTパラメータ取得
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        //バリデーションチェック用配列
        //$data = array();
        $data = array(
            "mail" => $mail,
            "password" => $password,
            );
        return $data;
    }
}