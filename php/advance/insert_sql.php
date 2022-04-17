<?php
$data = array('field1' => 'data1', 'field2' => 'data2');

insertArr("test.orders", $data);

function insertArr($tableName, $insData){
require_once('db_connect.php');
$columns = implode(", ",array_keys($insData));
$escaped_values = array_map('mysql_real_escape_string', array_values($insData));
foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
$values = implode(", ", $escaped_values);
$query = "INSERT INTO $tableName ($columns) VALUES ($values)";
$mysqli->query($query);
$mysqli->close();
}
?>