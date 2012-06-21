<?php
//        require "DBClass.php";
        require "FClass.php";
        
        
//        $db = new DBClass('localhost', 'root', '', 'cards');
//        $result = $db->select("SELECT * FROM cards LIMIT 10");
        $test = new FClass;
        $my = $test->getcard();
        print_r(json_encode($my));
?>
