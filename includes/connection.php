<?php

$longitude= $_POST['longitude'];
global $database;

$sql = "SELECT * FROM users";
$result= $Database -> query($sql);

if ($result -> num_rows>0) {
    if($row= $result -> fetch_assoc());
}

?>