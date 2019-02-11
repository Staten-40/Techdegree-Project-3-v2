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

       <!-- Header separated in its own inc/.php file
       <header>
            <div class="container">
                <div class="site-header">
                    <a class="logo" href="index.php"><i class="material-icons">library_books</i></a>
                    <a class="button icon-right" href="new.html"><span>New Entry</span> <i class="material-icons">add</i></a>
                </div>
            </div>
        </header> -->
        <section>
            <div class="container"> 
                <div class="entry-list">

                    <!-- List view created to contain a list of journal entries, each hyperlinked to a detail page -->
                    
                    <?php
                    foreach(get_them_entries() as $entry) {                           
                    $date2 = date('F d, Y', strtotime($entry['date']));

                    echo '<article><h2><a href="detail.php?id=' . $entry['id'] .  ' " > ' . $entry['title'] . "</a></h2>";
                    echo '<time datetime=" '. $entry['date'] . '" > '. $date2  . '</time></article>';
                    }
                    ?>


                       <!--<h2><a href="detail.html">The Best Day I’ve Ever Had</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_2.html">The Absolute Worst Day I’ve Ever Had</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_3.html">That Time at the Mall</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_4.html">"Dude, where’s my car?"</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article> -->

                    
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