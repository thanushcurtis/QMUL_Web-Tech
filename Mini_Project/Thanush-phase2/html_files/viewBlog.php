<?php
    include("fetchData.php");
    include("fetchComments.php");
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Blogs</title>
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
    <div class="grid-container">
        <div>
        <?php
        if(is_array($fetchData))
        {
            $sn=1;
            foreach($fetchData as $data)
            {
            ?>
            <h3> <?php echo $data['title']??'';?></h3>
            <div class="basic_layout">
           
                <p> <?php echo $data['content']??'';?></p>
                </br>
                <p class="extra">  <?php echo $data['ts']??'';?></p>
                </br>    
            </div>
            <?php
                $sn++;
                }
            }
            else{

            ?>
            <?php echo $fetchData; ?>
            <?php }?>    
        </div>
        <div>
            <aside class="child">
                <p>  
                <?php 
                if (isset($_SESSION['name'])) 
                {
                    echo "<p> Welcome : </p>";
                    echo $_SESSION['name'];
                    echo "<br/>";
                    echo "<a href='logout.php' class='link'> &nbsp; Log out &nbsp; </a>";
                    echo "<br/>";
                    echo "<a href='addPost.html' class='link'> &nbsp; Add Blog &nbsp; </a>";
                }
                else if (isset($_SESSION['guestname'])) 
                {
                    echo "<p> Welcome : </p>";
                    echo $_SESSION['guestname'];
                    echo "<br/>";
                    echo "<a href='logout.php' class='link'> &nbsp; Log out &nbsp; </a>";
                    echo "<br/>";
                }
                else
                {
                    echo  "<a href='login.php' class='link'>&nbsp; Log in &nbsp;</a>";
                }
                
                ?>
                </p>
                <div class="dropdown">
                    <button class="btn"> Archive </button>
                    <?php

                    array_multisort( array_column ($fetchData,'ts'),$fetchData);
                    $month_array = array();
                    if(is_array($fetchData))
                    {
                        $sn=1;
                        foreach($fetchData as $data)
                        {
                            
                            $month = date("F",strtotime($data['ts']));
                            array_push($month_array,$month);
                            $sn++;
                        }
                            
                    }
                    else
                    {
                        echo $fetchData;
                    }
                    $month_array = array_unique($month_array);
                    ?>
                    <div class="dropdown-content">
                    <?php
                    foreach ($month_array as $value) 
                    {
                        
                        echo "<a href='archive.php? month=$value' class='link'> &nbsp; $value &nbsp; </a>";
                    }
                    ?>
                    </div>
                </div>
            
            </aside>  
        </div>
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