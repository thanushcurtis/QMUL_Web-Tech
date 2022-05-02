<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="../css_files/login.css" type="text/css">
    
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
    <?php



    $dbhost='localhost';
    $dbuser ='root';
    $dbpassword ='root';
    $dbdatabase= 'miniproject';


    $username="";
    $password="";

    $feedback = "";
    $message = "You're logged in!";
    $validation_error = "* Incorrect username or password.";
    $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $email = $_POST["email"];
        $user_input=$_POST["password"];
        $type = $_POST["type"];
        
        if($type ==="admin")
        {
            $result = mysqli_query($mysqli,"SELECT * FROM USERSINFO WHERE ID='1'");

            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $password = $row['password'];
            $name = $row['name'];
            if($username=== $email && $password === $_POST["password"])
            {

                
                session_start();
                $r = session_id();
                $_SESSION['name']=$name;
                $feedback = $message;
                header("Location:addPost.html");
                exit();


            }
            else
            {
                $feedback =$validation_error;
            }

        }
        elseif($type ==="guest")
        {
            $result = mysqli_query($mysqli,"SELECT * FROM GUESTINFO WHERE email='$email'");
            if($result->num_rows>0)
            {
                $row = mysqli_fetch_assoc($result);
                $username = $row['email'];
                $password = $row['password'];
                $name = $row['name'];
                if($username=== $email && $password === $_POST["password"])
                {

                    
                    session_start();
                    $r = session_id();
                    $_SESSION['guestname']=$name;
                    $feedback = $message;
                    header("Location:viewBlog.php");
                    exit();
                }
                else
                {
                    $feedback =$validation_error;
                }
            }
            else
            {
                $feedback =$validation_error;
            }
        

        }
        
    }
        


    $mysqli->close();

?>
    <div>
        <form  method="POST" action="login.php" id="form1">
            <fieldset>
                <legend>
                   Login
                </legend>
            </fieldset>
            <fieldset>
                <label> E-mail </label> <br>
                <input type="email" name="email"required> <br>
            </fieldset>
            <fieldset>
                <label> Password </label> <br>
                <input type="password" name="password" required> <br>
            </fieldset>
            <fieldset>
                <label> Type </label> <br>
                <input type="radio" id="guest" name="type" value="guest" required>
                <label for="guest"> Guest </label>
                <input type="radio" id="admin" name="type" value="admin">
                <label for="admin"> Admin </label>
               
            </fieldset>
            <fieldset id="c1">
                <button type="submit" form="form1">Login</button> 
            </fieldset>
            <fieldset id="c1">
                <span><?= $feedback;?></span>
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
</body>
</html>