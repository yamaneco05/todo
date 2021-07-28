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

        //POSTパラメータ取得
        $mail = $_POST['mail'];
        $enterpassword = $_POST['password'];
        
        //バリデーションチェック用配列
        $data = array(
            "mail" => $mail,
            "password" => $enterpassword,
        );

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

        //バリデーションを通過した正常な値を定義
        $data = $validation->getData();
        $mail = $data['mail'];
        $enterPassword = $data['password'];

        $user = new User;
        $userInfo = $user->findByMail($mail);

        //もし$userInfoが空なら、入力画面にリダイレクトする
        if ( $userInfo == null ) {
            session_start();
                                
            $_SESSION['error'] = 'ユーザー情報を取得できませんでした';
            header( "Location: login.php" );
            exit();
        }
        $password = $userInfo['password'];

        if ( $password ==! $enterPassword ) {
            echo "パスワードが一致しません";
            header( "Location: login.php" );
            exit();
        }
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        var_dump(password_verify($password, $pass_hash));

        $userInfo['password'] = $pass_hash;
        print_r($userInfo);

        session_start();
        //$_SESSION['userInfo'] = array();  //セッションの内容削除
        $_SESSION['userInfo'] = $userInfo;
        return;
    }

}