<?php

    $dbhost='localhost';
    $dbuser ='root';
    $dbpassword ='root';
    $dbdatabase= 'miniproject';

    $title = $_POST['title'];
    $content = $_POST['blogContent'];

    $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    
    $sql = "INSERT INTO Blogs (title,content,ts)
    VALUES ('$title','$content',NOW())";

    if($mysqli->query($sql)===TRUE)
    {
        echo " Blog Added Successfully";
        header("Location: viewBlog.php");
        exit();
    }
    else{
        echo "Error: " . $sql . "<br> ". $mysqli->error;
    }


    $mysqli->close();
    
?>