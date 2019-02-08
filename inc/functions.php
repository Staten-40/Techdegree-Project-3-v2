<?php

//Prep and execution for retrieving entries in descending order by date (latest entries first)...The "prepare statement".

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

//Add new entry: Created function to include all table elements to new entry

function add_that_entry($title, $date, $time_spent, $learned, $resources) {
    include ('connections.php');

    $sql = 'INSERT INTO entries(title, date, time_spent, learned, resources) VALUE(?,?,?,?,?)';

    try {
$results = $db->prepare($sql);
$results->bindValue(1, $title, PDO::PARAM_STR);
$results->bindValue(2, $date, PDO::PARAM_STR);
$results->bindValue(3, $time_spent, PDO::PARAM_STR);
$results->bindValue(4, $learned, PDO::PARAM_STR);
$results->bindValue(5, $resources, PDO::PARAM_STR);
$results->execute();
$entry = $results->fetch();
return $entry; 

    } catch(Exception $e) {          

   }
 } 

 //Calling the add entry function to add a new entry post to the list of entries
add_that_entry('title', 'date', 'time_spent', 'learned', 'resources' );

?>
 








     
 