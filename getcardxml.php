<?php
 //       require "DBClass.php";
        require "FClass.php";
        require "array2xml.php";
        header('Content-type: application/xml');
        
        $test = new FClass;
        $result = $test->getcard();

        $xml = new Array2XML;
        $xmlstr = $xml->convert($result);
        print_r($xmlstr);
?>
