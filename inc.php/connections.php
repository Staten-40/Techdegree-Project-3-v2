<?php
//Establish database connection with PDO statement
//remove before flight
ini_set('display_errors', 'On');

try {
$db = new PDO ("sqlite:".__DIR__."inc/journal.db"); $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
   echo ($e->getMessage);
   exit;
}
?>