<?php
include ('inc/functions.php');

//The New Entry Page
//User data fields are sanaitized to prevent potentilly harmful data input
//Error messages created if fields title/date left blank or the post is unable to be added due to potentially harmful data


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $results = show_that_entry[$_POST];
   
   $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
   $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
   $time_spent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
   $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
   $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
   $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));

   //Create add/entry page that appropritely receives data from the user in each field displyed
   //An error messsage pops up if user neglects to input title and date
   //Calling the add entry function to add a new entry post to the list of entries
   //User is redirected to index.php once the form is submitted
   if (empty($title) || empty($date)) {
       $error_msg = "Yo!   Heads up!  You at least need the title and date!";

   } else {
       if(add_that_entry($title, $date, $time_spent, $learned, $resources)) {
           header('Location: index.php');
           exit; 

       } else {
           $error_msg = "Sorry, dude.  Couldn't add that one.";
       }       
       
   } 
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

      <!--Included header to index.php -->

      <body>
      <?php include('inc/header.php'); ?>

         <section>
            <div class="container">
                <div class="new-entry">
                    <h2>New Entry</h2>

                     <?php

                     //Echos error messsge if the error message is set
                     
                     if (isset($error_msg)) {
                         echo "<p class = 'message'>$error_msg</p>";
                     }
                     
                     ?>

                    <form class="form-container form-add" method ="post" action="new.php">
                        <label for="title"> Title</label>
                        <input id="title" type="text" name="title"><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date"><br>
                        <label for="time-spent"> Time Spent</label>
                        <input id="time-spent" type="text" name="timeSpent"><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" name="whatILearned"></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"></textarea>
                        <input type="submit" value="Publish Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a>                
        
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