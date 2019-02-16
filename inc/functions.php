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
//The if/else statement states that if an entry id doesn't already exit to create a new entry id
//The bindValue cements a value(identifyer, unique key) to the newly added entry

function add_that_entry($title, $date, $time_spent, $learned, $resources, $id=null) {
    include ('connections.php');
    if($id) {
        $sql = 'UPDATE entries SET title=?, date=?, time_spent=?, learned=?, resources=? WHERE id=?';
    } else {
   
        $sql = 'INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?,?,?,?,?)';
    }
    try {
$results = $db->prepare($sql);
$results->bindValue(1, $title, PDO::PARAM_STR);
$results->bindValue(2, $date, PDO::PARAM_STR);
$results->bindValue(3, $time_spent, PDO::PARAM_STR);
$results->bindValue(4, $learned, PDO::PARAM_STR);
$results->bindValue(5, $resources, PDO::PARAM_STR);
        if($id) {
            $results->bindValue(6, $id, PDO::PARAM_INT);
         }
$results->execute();
} catch(Exception $e) {  
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
   }
   return true;
 }  

 //show_that_entry($id) function created to display all entries for user retrieval and/or revision
 
function show_that_entry($id) {
    include ('connections.php');
try { 
   $sql =  'SELECT * FROM entries WHERE id=?';
   $results = $db->prepare($sql);
   $results->bindValue(1, $id, PDO::PARAM_STR);
   $results->execute();
} catch (Exception $e) {
    echo "Unable to get that entry. </br>";
    echo $e->getMessage();
}
$entry = $results->fetch(PDO::FETCH_ASSOC);
return $entry;
}

//Function created to delete an entry

function delete_entry($id) {
    include ('connections.php');
    
    $sql =  'DELETE  FROM entries WHERE id=?';

try {   
   $results = $db->prepare($sql);
   $results->bindValue(1, $id, PDO::PARAM_STR);
   $results->execute();
} catch (Exception $e) {
    echo $e->getMessage();
    return false;
}

}

?>
 