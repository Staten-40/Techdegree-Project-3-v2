<?php
include ('inc/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $results = show_that_entry[$_POST];
    
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time_spent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
    var_dump($id);
 
    //Create add/entry page that appropritely receives data from the user in each field displyed
    //An error messsage pops up if user neglects to input title and date
    //Calling the add entry function to add a new entry post to the list of entries
    //User is redirected to index.php once the form is submitted
    if (empty($title) || empty($date)) {
        $error_msg = "Yo!   Heads up!  You at least needs the title and date!";
 
    } else {
        if(add_that_entry($title, $date, $time_spent, $learned, $resources, $id)) {
            header('Location: index.php');
            exit; 
 
        } else {
            $error_msg = "Sorry, dude.  Couldn't add that one.";
        }       
        
    } 
 } else {

    $results = show_that_entry($_GET['id']);
 }




/*if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

} */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MyJournal</title>
        <link href="https://fonts.googleapis.com/css?family=Cousine:400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>

      <!--Included header to index.php -->

        <?php include('inc/header.php'); ?>

        <!-- <header>
            <div class="container">
                <div class="site-header">
                    <a class="logo" href="index.html"><i class="material-icons">library_books</i></a>
                    <a class="button icon-right" href="new.html"><span>New Entry</span> <i class="material-icons">add</i></a>
                </div>
            </div>
        </header> -->
        <section>
            <div class="container">
                <div class="edit-entry">
                    <h2>Edit Entry</h2>

                 
                    <?php
                   /* $results = edit_that_entry($title, $date, $time_spent, $learned, $resources) {
                          ***sql statement here***
                          $sql */

                         

                          
                         
                         

                         //Edit entry: Created function to edit selected entry
                            /*function edit_that_entry($title, $date, $time_spent, $learned, $resources) {
                                include ('connections.php');
                            
                                $sql = 'UPDATE entries SET title=?, date=?, time_spent=?, learned=?, resources=? WHERE entry_id=?';

                                try {                               
                                
                                $results = $db->prepare($sql);
                                $results->bindValue(1, $title, PDO::PARAM_STR);
                                $results->bindValue(2, $date, PDO::PARAM_STR);
                                $results->bindValue(3, $time_spent, PDO::PARAM_STR);
                                $results->bindValue(4, $learned, PDO::PARAM_STR);
                                $results->bindValue(5, $resources, PDO::PARAM_STR);
                                $results->bindValue(6, $entry_id, PDO::PARAM_INT);
                                $results->execute();
                                } catch(Exception $e) {  
                                        echo "Error: " . $e->getMessage() . "<br />";
                                        return false;
                            }
                            return true;
                            }  */
                            
                         ?>                      
                    

            

                    <form method="post" action="edit.php">
                        <label for="title" >Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $results['title']; ?>"> <br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date" value="<?php echo $results['date']; ?>"><br>
                        <label for="time-spent"> Time Spent</label>
                        <input id="time-spent" type="text" name="timeSpent" value="<?php echo $results['time_spent']; ?>"> <br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" name="whatILearned"><?php echo $results['learned']; ?></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"><?php echo $results['resources']; ?></textarea>
                        <input hidden="id" name="id" value="<?php echo $results['id'];?>">
                        <input type="submit" value="Publish Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a><input type='submit' class='button--delete' value='Delete' />
                    </form>
                </div>
            </div>
        </section>
        <footer>
            <div>
                &copy; MyJournal
            </div>
        </footer>
    </body>
</html>