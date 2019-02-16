<?php include ('inc/functions.php');

//Assigned show_that_entry($_GET['id']) displying each unique entry.

$results = show_that_entry($_GET['id']);


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
                <div class="entry-list single">

                     <!-- The detail page that lists the articles and all associated data on click from the home page.-->
                     <!-- Results are echoed out to disply title, date, time spent, what was learned, and resources from each individual enttry -->

                    <article>
                        <h1><?php echo $results['title']; ?></h1>
                        <time datetime="><?php echo $results['date']; ?><?php echo date('F d, Y', strtotime($results['date'])); ?></time>

                        <div class="entry">
                            <h3>Time Spent: </h3>
                            <p><?php echo $results['time_spent']; ?></p>
                        </div>
                        <div class="entry">
                            <h3>What I Learned:</h3>
                            <?php echo $results['learned']; ?>
                                                </div>
                        <div class="entry">
                            <h3>Resources to Remember:</h3>
                            <?php echo $results['resources']; ?>

                        </div>
                    </article>
                </div>
            </div>
            <div class="edit">

            <!-- Link to the edit page that forwards the user on button click -->

                <p><a href="edit.php?id=<?php echo $results['id']; ?>">Edit Entry</a></p>
            </div>
        </section>
        <footer>
            <div>
                &copy; MyJournal
            </div>
        </footer>
    </body>
</html>