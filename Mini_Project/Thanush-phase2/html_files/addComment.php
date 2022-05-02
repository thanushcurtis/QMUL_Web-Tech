
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Comments</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="../css_files/login.css" type="text/css">
    <script src="../javascript_files/add_post.js"></script>
    
</head>
<body>
    <nav>
        <ul>
            <li><img src="../images/tc_logo.jpeg" width="50px" height="49px"></li>
            <li><a class="active" href="home_page.html">Thanush Curtis</a></li>
            <li style="float:right"><a href="login.php"> Login</a></li>
            <li style="float:right"><a href="viewBlog.php">Blog</a></li>
            <li style="float:right"><a href="experience.html"> Experience</a></li>
            <li style="float:right"><a href="about_me.html"> About</a></li>
        </ul>
    </nav>
    <div>
        <form  method="POST" action="addComment.php" id="form1">
            <fieldset>
                <legend>
                   Comment
                </legend>
            </fieldset>
            <fieldset>
            <textarea rows="4" columns="20" name="comment" placeholder="Enter some text" class="text"></textarea>
            </fieldset>
            <fieldset id="c1">
                <button type="submit" form="form1">Submit</button> 
                <button type="Clear" id="clearbtn" style="font-size: 10px;">Clear</button> 
            </fieldset>
        </form>       
    </div>
    <footer>
        <nav>
            <ul>
                <li><a href="#about"> @ 2022 Thanush Curtis. All rights reserved</a></li>
                <li style="float:right"><a href="login.php"> Login</a></li>
                <li style="float:right"><a href="viewBlog.php">Blog</a></li>
                <li style="float:right"><a href="experience.html"> Experience</a></li>
                <li style="float:right"><a href="about_me.html"> About</a></li>
            </ul>
        </nav>
    </footer>
    <?php

    $dbhost='localhost';
    $dbuser ='root';
    $dbpassword ='root';
    $dbdatabase= 'miniproject';
    $blogid = $_GET['blogid'];
    echo $blogid;

    $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $comment = $_POST['comment'];
        echo $comment;
        $sql = "INSERT INTO Comments (comments,blogid)
        VALUES ('$comment','$blogid')";

            if($mysqli->query($sql)===TRUE)
            {
                echo " Comment Added Successfully";
                header("Location: viewBlog.php");
                exit();
            }
            else{
                echo "Error: " . $sql . "<br> ". $mysqli->error;
            }
       
    }
    
    
   


    $mysqli->close();


?>
</body>
</html>