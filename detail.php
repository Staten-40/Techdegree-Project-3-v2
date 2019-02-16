<?php include ('inc/functions.php'); 
//var_dump($_GET['id']);


$results = show_that_entry($_GET['id']);
//var_dump($results);

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
       
       <!--<header>
        
            <div class="container">
                <div class="site-header">
                    <a class="logo" href="index.php"><i class="material-icons">library_books</i></a>
                    <a class="button icon-right" href="new.php"><span>New Entry</span> <i class="material-icons">add</i></a>
                </div>
            </div>
        </header> -->

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
                           <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut rhoncus felis, vel tincidunt neque.</p>
                            <p>Cras egestas ac ipsum in posuere. Fusce suscipit, libero id malesuada placerat, orci velit semper metus, quis pulvinar sem nunc vel augue. In ornare tempor metus, sit amet congue justo porta et. Etiam pretium, sapien non fermentum consequat, <a href="">dolor augue</a> gravida lacus, non accumsan. Vestibulum ut metus eleifend, malesuada nisl at, scelerisque sapien.</p> -->
                        </div>
                        <div class="entry">
                            <h3>Resources to Remember:</h3>
                            <?php echo $results['resources']; ?> 

                           <!--  <ul>
                                <li><a href="">Lorem ipsum dolor sit amet</a></li>
                                <li><a href="">Cras accumsan cursus ante, non dapibus tempor</a></li>
                                <li>Nunc ut rhoncus felis, vel tincidunt neque</li>
                                <li><a href="">Ipsum dolor sit amet</a></li>
                            </ul> -->
                        </div>
                    </article>
                </div>
            </div>
            <div class="edit">
            <!-- Push to the edit page -->
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