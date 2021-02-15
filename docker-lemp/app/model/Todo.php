<?php
require_once '/var/www/html/app/config/database.php';

class Todo {

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
}

?>