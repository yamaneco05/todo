<?php
require_once '/var/www/html/app/config/database.php';
require_once '/var/www/html/app/controller/TodoController.php';

class User{

    public $mail;
    public $password;
    public $user;
    public $userInfo;
    public $enterPassword;
    public $data;
    
    public function findByMail($mail) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM users WHERE mail = '$mail'";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $user;
    }

    public function hashPass(){

        //パスワードの暗号化
        $hash_pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        try {
            // データベースへの接続開始
            $db = new PDO(DSH, USER, PASSWORD);

            // bindParamを利用したSQL文の実行
            $sql = 'INSERT INTO users (id, pass) 
                    VALUES(:id, :pass);';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->bindParam(':pass', $hash_pass);
            $stmt->execute();

            // データベースへの接続に失敗した場合
        } catch (PDOException $e) {
            print('接続失敗:' . $e->getMessage());
            die();
        }# code...
    }

}