<?php
require_once '/var/www/html/app/config/database.php';

class Todo {
    public $todos;

    public function findAll() {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE user_id = 34";
          
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $todos;
    }

    public function findById($todoId) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE id = $todoId";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch (PDOException $e) {
            print ("Error:" .$e->getMessage());
            exit;
        }
        return $todo;
    }

    public function isExistById($todoId) {

        try {
            $db = new PDO(DSH, USER, PASSWORD);
            $sql = "SELECT * FROM todos WHERE id = $todoId";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
        
            } catch(PDOException $e) {
            print("Error:" .$e->getMessage());
            exit;
            }
        if( $todo == null ) {
            header( "Location: ./404.php" );
            return;
        }
        return $todoId;
    }
}

?>