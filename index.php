<?php 
include ('inc/functions.php');
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
      
      <?php include ('inc/header.php'); ?>
    
        <section>
            <div class="container"> 
                <div class="entry-list">

                    <!-- List view created to contain a list of journal entries, each hyperlinked to its own page with option to edit -->
                    
                    <?php
                    foreach(get_them_entries() as $entry) {                           
                    $date2 = date('F d, Y', strtotime($entry['date']));

                    echo '<article><h2><a href="detail.php?id=' . $entry['id'] .  ' " > ' . $entry['title'] . "</a></h2>";
                    echo '<time datetime="2016-01-02'. $entry['date'] . '" > '. $date2  . '</time></article>';
                    echo "<form method= 'post' action='inc/detail.php>' \n";
                    echo "input type='hidden' value='" . $entry['id'] . "' name='delete' /> \n";
                    echo "</form>";
                    }
                    ?>
                    
                </div>
            </div>
        </section>

        <!-- Footer separated in it's own inc/.php file -->

        <footer>
            <div>
                &copy; MyJournal
            </div>
        </footer>
    </body>
</html>