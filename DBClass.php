<?php

/*
 * Соединение с базой данных
 */

class DBClass {
    
    
 public function __construct($host, $user, $pass, $base) { 
 $this->conn = mysql_connect($host, $user, $pass) or die(mysql_error()); 
 mysql_select_db($base, $this->conn); 
 mysql_query("SET NAMES 'utf8'", $this->conn); 
 }
 public function query($request, $data = array()) { 
 $request = $this->query_process($request, $data); 
 $query = mysql_query($request, $this->conn) or die("Cannot execute request to the database '{$request}'");
 }
 
 public function select($request, $data = array()) { 
 $request = $this->query_process($request, $data); 
 $query = false; 
 $query = mysql_query($request, $this->conn) or die("Cannot execute request to the database '{$request}'"); 
 return $this->result2array($query);
 }
 private function query_process($query, $data){ 
 $this->data = $data; 
// $query = preg_replace_callback("#('?){([^}]+)}(\\1)#sUi", array($this, 'holders_replace'), $query); 
 return $query; 
 } 

 private function result2array(&$query){ 
 $result = array(); 
 $i = 0; 

 if($query === false) { return $result; } 
 while($row = mysql_fetch_array($query)) { 
 $result[$i] = array(); 
 foreach($row as $key=>$value) { 
 if(!is_numeric($key)) { $result[$i][strtolower($key)] = $value; } 
 } 
 $i++; 
 } 
 return $result; 
 }
}


?>
