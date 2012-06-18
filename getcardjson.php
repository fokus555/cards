<?php
        require "DBClass.php";
        
        $db = new DBClass('localhost', 'root', '', 'cards');
        $result = $db->select("SELECT * FROM cards LIMIT 10");
        print_r(json_encode($result));
?>
