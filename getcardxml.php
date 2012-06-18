<?php
        require "DBClass.php";
        require "array2xml.php";
        header('Content-type: application/xml');
        
        $db = new DBClass('localhost', 'root', '', 'cards');
        $result = $db->select("SELECT * FROM cards LIMIT 10");
  //      print_r($result);
        $xml = new Array2XML;
        $xmlstr = $xml->convert($result);
        print_r($xmlstr);
?>
