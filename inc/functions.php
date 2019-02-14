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
   
    $sql = 'INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?,?,?,?,?)';
    try {
$results = $db->prepare($sql);
$results->bindValue(1, $title, PDO::PARAM_STR);
$results->bindValue(2, $date, PDO::PARAM_STR);
$results->bindValue(3, $time_spent, PDO::PARAM_STR);
$results->bindValue(4, $learned, PDO::PARAM_STR);
$results->bindValue(5, $resources, PDO::PARAM_STR);
$results->execute();
} catch(Exception $e) {  
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
   }
   return true;
 }  
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

//Edit entry: Created function to edit existing blog entries
function edit_that_entry($title, $date, $time_spent, $learned, $resources) {

    if(SERVER['REQUEST METHOD'] == 'POST') {

    $sql = 'UPDATE entries SET title=?, date=?, time_spent=?, learned=?, resources=? WHERE entry_id=?';

    $entry_id = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_NUMBER_INT)); 
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time_spent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
    

    if (empty($title) || empty($date)) {
        $error_msg = "PSST!  Hey, you at least needs the title and date!";
 
    } else {
        if(edit_that_entry($title, $date, $time_spent, $learned, $resources, $entry_id)) {
            header('Location: detail.php');
            exit; 
 
        } else {
            $error_msg = "Bummer.  Couldn't edit that one.";
        }       
        
    }
}
 ?>  