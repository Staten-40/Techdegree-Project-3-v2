<?php
//Prep and execution for retrieving entries in descending order by date (latest entries first)...The "prepare statement"

 function get_them_entries() {
     include ('connections.php');

 try { 
    $sql =  'SELECT * FROM entries ORDER BY date DESC';
    $results = $db->prepare($sql);
    $results->execute();
 } catch (Exception $e) {
     echo "Unable to get that entry. </br>";
     echo $e->getMessage();
 }

 
 $entries = $results->fetchAll();
 return $entries;
 

}

?>

     
 