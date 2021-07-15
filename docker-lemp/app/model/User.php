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


}