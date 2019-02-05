<?php

try {
$db = new PDO ("sqlite:".__DIR__."inc/journal.db");
var_dump($db)
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
   echo ($e->getMessage);
   exit;
}
?>