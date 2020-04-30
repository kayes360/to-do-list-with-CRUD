<?php 
    $db = new Mysqli;

    $db->connect('localhost','root','','crud',null,null);
    if(!$db){
        echo "Connection is not successful";
    }
?>