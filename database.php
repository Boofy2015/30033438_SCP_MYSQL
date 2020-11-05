    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .details
        {
            text-align: center; 
            font-family: Playfair Display, serif; 
            margin-top: 20px;
        }
    </style>


    <?php

    //Database Credentials
 
    $user = "a3003343_user";
    $password = "Toiohomai1234";
    $database = "a3003343_scp_crud_pages";

    //Database Connection Object
    $connection = new mysqli('localhost', $user, $password, $database) or die(mysqli_error($connection));

    //Data Storage Variable
    $recordStorage = $connection->query("select * from scp_pages") or die($connection->error());

    if(isset($_POST['submit']))
    {
        //Variable Creation
        $pgname = $_POST['pgname'];        

        $title = mysqli_real_escape_string ($connection, $_POST['title']);
        $class = mysqli_real_escape_string ($connection, $_POST['class']);
        $image = mysqli_real_escape_string ($connection, $_POST['image']);
        $containment = mysqli_real_escape_string ($connection, $_POST['containment']);
        $description = mysqli_real_escape_string ($connection, $_POST['description']);

        $h1 = mysqli_real_escape_string ($connection, $_POST['h1']);
        $p1 = mysqli_real_escape_string ($connection, $_POST['p1']);

        $h2 = mysqli_real_escape_string ($connection, $_POST['h2']);
        $p2 = mysqli_real_escape_string ($connection, $_POST['p2']);

        $h3 = mysqli_real_escape_string ($connection, $_POST['h3']);
        $p3 = mysqli_real_escape_string ($connection, $_POST['p3']);

        $h4 = mysqli_real_escape_string ($connection, $_POST['h4']);
        $p4 = mysqli_real_escape_string ($connection, $_POST['p4']);

        $h5 = mysqli_real_escape_string ($connection, $_POST['h5']);
        $p5 = mysqli_real_escape_string ($connection, $_POST['p5']);


        $sql = "insert into scp_pages(pgname, title, class, image, containment, description, h1, p1, h2, p2, h3, p3, h4, p4, h5, p5)values
        ('$pgname','$title','$class','$image','$containment','$description','$h1','$p1','$h2','$p2','$h3','$p3','$h4','$p4','$h5','$p5')";

       

        if($connection->query($sql) === TRUE)
        {
            echo "
            <main class='container-sm details'>
            <h1> Record successfully added </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-success' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>      
            </main>
            "; 
        }
        else
        {
            echo "
            <main class='container-sm details'>
            <h1> Record failed to add </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-danger' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>      
            </main>
            ";
        }
    }

    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];

        //Delete Sql Command
        $delete = "delete from scp_pages where id=$id";

        //Display Messages
        if($connection->query($delete) === TRUE )
        {
            echo "
            <main class='container-sm details'>
            <h1> Record successfully deleted </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-success' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>      
            </main>
            "; 
        }
        else
        {
            echo "
            <main class='container-sm details'>
            <h1> Record failed to delete </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-danger' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>      
            </main>

            ";
        }
    }
    
    //Runs from the update button
    if(isset($_POST['update']))
    {
        //Variable Creation
        $id = mysqli_real_escape_string ($connection, $_POST['id']);        
        $pgname = mysqli_real_escape_string ($connection, $_POST['pgname']);        
                
        $title = mysqli_real_escape_string ($connection, $_POST['title']);
        $class = mysqli_real_escape_string ($connection, $_POST['class']);
        $image = mysqli_real_escape_string ($connection,  $_POST['image']);
        $containment = mysqli_real_escape_string ($connection, $_POST['containment']);
        $description = mysqli_real_escape_string ($connection, $_POST['description']);

        $h1 = mysqli_real_escape_string ($connection, $_POST['h1']);
        $p1 = mysqli_real_escape_string ($connection, $_POST['p1']);

        $h2 = mysqli_real_escape_string ($connection, $_POST['h2']);
        $p2 = mysqli_real_escape_string ($connection, $_POST['p2']);

        $h3 = mysqli_real_escape_string ($connection, $_POST['h3']);
        $p3 = mysqli_real_escape_string ($connection, $_POST['p3']);

        $h4 = mysqli_real_escape_string ($connection, $_POST['h4']);
        $p4 = mysqli_real_escape_string ($connection, $_POST['p4']);

        $h5 = mysqli_real_escape_string ($connection, $_POST['h5']);
        $p5 = mysqli_real_escape_string ($connection, $_POST['p5']);


        //Update Command
        $update = "update scp_pages set pgname='$pgname', title='$title', class='$class', image='$image', containment='$containment', description='$description', 
                                                h1='$h1', p1='$p1', 
                                                h2='$h2', p2='$p2', 
                                                h3='$h3', p3='$p3', 
                                                h4='$h4', p4='$p4', 
                                                h5='$h5', p5='$p5' 
                                                where id='$id'";

        if($connection->query($update) === TRUE)
        {
            echo "
            <main class='container-sm details'>
            <h1> Record successfully updated </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-success' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>     
            </main>
            "; 
        }
        else
        {
            echo "
            <main>
            <main class='container-sm details'>
            <h1> Record failed to update </h1>
            <br>
            <a href='index.php'><button type='button' class='btn btn-danger' style='width:200px'> Return Home </button></a>
            <br><br><br>
            <img src='images/SCP_Logo.png' style='width: 100%; max-width: 80%;'>      
            </main>
            ";
        }
    }





?>