<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JQuery Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        
        <!-- Fontawesome link -->
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

        <!-- CSS Script -->
        <link rel="stylesheet" href="css/styles.css">
       
        <title> Home - SCP Foundation </title>

    </head>


    <body class=" bg-light text-dark" >
       
    <?php include "database.php" ?>

   
    <div class="wrapper">
        <div class="sidebar">
          <div class="bg_shadow"></div>
            <div class="sidebar__inner">
               <div class="close">
              <i class="fas fa-times"></i>
            </div>
            
            <div class="sidebar_info">
                <div class="sidebar_img">
                  <img src="images/SCP_Logo_Nav.png" alt="Sidebar_Logo">
                </div>
            </div>
            
            <ul class="siderbar_menu">
           
                <li class="navButton textsize"><a class="clearDecoration" type="button" id="speakBtn" href="index.php" style="text-decoration:none;">
                  <div class="title fontsmall"><i class="fas fa-play"></i> &nbsp; Home </div>
                  </a></li>  
                         
                <li class="navButton textsize"><a type="button" id="speakBtn" href="create.php" style="text-decoration:none;">
                  <div class="title fontsmall"><i class="fas fa-file-upload"></i> &nbsp; Create  File </div>
                  </a></li>  
             
                <?php foreach($recordStorage as $pageinfo): ?>
           
                <li class="navButton "><a type="button" href="index.php?page=<?php echo $pageinfo['pgname']; ?>" style="text-decoration:none;">
               
                  <div class="title fontsmall "><i class="fas fa-file-alt"></i> &nbsp;<?php echo $pageinfo['title']; ?></div>
                  </a></li>  
    
                <?php endforeach; ?>
    
            </ul>
          </div>
        </div>
        
        <div class="main_container">
          <div class="top_navbar">
              <div class="hamburger">
                  <div class="hamburger__inner">
                      <i class="fas fa-bars"></i>  
                  </div>  
              </div>
            </div>
       
        <button class="navbar-toggler positionalchange" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        </nav>


        <?php
        if(isset($_GET['page']))
        {
        $pgname = trim($_GET['page'], "'");
       
        $recordStorage = $connection->query("select * from scp_pages where pgname='$pgname'") or die($connection->error());

        //Creates into array for display
        $display = $recordStorage->fetch_assoc();
       
       
        //SQL Information Variable
        $title = $display['title'];
        $class = $display['class'];
        $image = $display['image'];
        $containment = $display['containment'];
        $description = $display['description'];

        $h1 = $display['h1'];
        $p1 = $display['p1'];

        $h2 = $display['h2'];
        $p2 = $display['p2'];

        $h3 = $display['h3'];
        $p3 = $display['p3'];

        $h4 = $display['h4'];
        $p4 = $display['p4'];

        $h5 = $display['h5'];
        $p5 = $display['p5'];
       
        //Update and Delete Variables
        $id = $display['id'];  
        $update = "update.php?update=" . $id;
        $delete = "database.php?delete=" . $id;

        echo "
        <br>
        <div style='font-family: Playfair Display, serif;'>
        <main class = 'container-fluid' style='max-width:1300px;'>
        <br>

        <h1>{$title}</h1>
        <h2> Object Class {$class}</h2>
       
        <br>
        <p><img src='{$image}'
        style=' width: 70%;
        max-width:100%;
        display: block;
        margin-left: auto;
        margin-right: auto;'></p>

        <h3>Containment</h3>
        <p>{$containment}</p>
 
        <h3>Description</h3>
        <p>{$description}</p>
         

        <h4>{$h1}</h4>
        <p>{$p1}</p>
 
        <h4>{$h2}</h4>
        <p>{$p2}</p>

        <h4>{$h3}</h4>
        <p>{$p3}</p>
       
        <h4>{$h4}</h4>
        <p>{$p4}</p>

        <h4>{$h5}</h4>
        <p>{$p5}</p>

        <br>
        
        <a href='{$update}' class='btn btn-primary'> Update </a>
        <a href='{$delete}' class='btn btn-secondary'> Delete </a>
            </main>
        </div>
        <br>
        ";
        }
        else
        {
            echo "
            <div style='font-family: Playfair Display, serif;'>
            <main class = 'container-fluid spacing' >
            <h1>Welcome to this website</h1>
            <p> Greetings Agent </p>
            <p> Welcome back to the Foundations online SCP file storage system, please select the wanted file for viewing, editing, or deletion or create a new file on our Create File page. <br> ~The Administrator </p>
            <br><br><br>
            <p class='text d-flex justify-content-center' ><img src='images/SCP_Logo.png' class='imageSize'></p>
            </main></div>
            ";
        }
        ?>

        <!-- Optional JavaScript -->
        <!-- Sidebar function script -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/sidebar.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   
    </body>

</html>
