<?php
include ('inc/functions.php');

//The New Edit Page
//User data fields are sanaitized to prevent potentilly harmful data input
//Error messages created if fields title/date left blank or the post is unable to be edit 
//if(isset) cretaed so if the user chooses, the entry can be deleted

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $results = show_that_entry[$_POST];
    
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time_spent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));

       
    if(isset($_POST['delete'])) {
        delete_entry($id);
        header("Location: index.php");
    }
 
    //Created the Edit page that revises user requested entries.
    //An error messsage pops up if title and/or date fields are user oversight and left blank
    //User is redirected to index.php once the form is submitted if all required fields are not empty or the error message is displayed
    //show_that_entry($_GET['id'] used to grab the entry the user requests to be edited

        if (empty($title) || empty($date)) {
        $error_msg = "Don't forget, title and date are required.";
 
    } else {
        if(add_that_entry($title, $date, $time_spent, $learned, $resources, $id)) {
            header('Location: index.php');
            exit; 
 
        } else {
            
            $error_msg = "Unable to edit that one, my friend.";
        }       
        
    } 
 } else {

    $results = show_that_entry($_GET['id']);
 }
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

            <section>
            <div class="container">
                <div class="edit-entry">
                    <h2>Edit Entry</h2>           
                
                    <!--Modified index.php in preparation for user to edit entries.-->
                    <!--Created another form for the delete button to proerly delete posts -->
                    <!--Added "Warning" message to prevent user from inadvertently deleting  entry.-->
                    
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
                        <a href="#" class="button button-secondary">Cancel</a><br><br>
                    </form>
                    
                    <form method="post" action="edit.php" onsubmit="return confirm('CAUTION:  This CANNOT be undone!!! Are you sure you want to permanently delete this entry?')">
                        <input type='submit' name='delete' class='button--delete' value='Delete' />
                        <input hidden="id" name="id" value="<?php echo $results['id']; ?>">
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