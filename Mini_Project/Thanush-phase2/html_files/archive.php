<?php
include("fetchData.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Archive </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="../css_files/viewBlog.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css_files/reset.css">
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
    <?php
    if(is_array($fetchData))
    {
        $input_month = $_GET['month'];
    


        $sn=1;
        foreach($fetchData as $data)
        {
            
            $month = date("F",strtotime($data['ts']));
            if($input_month == $month)
            {
            ?>    
                <h3> <?php echo $data['title']??'';?></h3>
                <div class="basic_layout">
                    
                    <p> <?php echo $data['content']??'';?></p>
                    </br>
                    <p class="extra">  <?php echo $data['ts']??'';?></p>
                </div>
            <?php    
            }
            $sn++;


        }
    }
    ?>
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
</body>
</html>