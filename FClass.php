<?php

require "DBClass.php";

class FClass  {
    public function getcard() {
        $db = new DBClass('localhost', 'root', '', 'cards');
        $result = $db->select("SELECT * FROM cards LIMIT 10");
        return $result; // возвращает массив объектов
}
}
?>
