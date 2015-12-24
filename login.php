
<!DOCTYPE html>
<head>
<style>
    
    .register-form{
    width: 500px;
    margin: 0 auto;
    text-align: center;
    padding: 10px;
    color: #fff;
    background : #c4c4c4;
    border-radius: 10px;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
}

.register-form form input{padding: 5px;}

.register-form .btn{background: #726E6E;
padding: 7px;
border-radius: 5px;
text-decoration: none;
width: 50px;
display: inline-block;
color: #FFF;}

.register-form .register{
border: 0;
width: 60px;
padding: 8px;
}
</style>
</head>
<body>
<div class="register-form">
<?php
    if(isset($msg) & !empty($msg))
    {
        echo $msg;
    }
?>
<!-- Code for the Login Page-->
<?php
session_start();   //Start a session
include('connect.php');
//Checking if the Form is submitted
if(isset($_POST['username']) and isset($_POST['password']))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
  //Checking the credentials in database
$query = "SELECT * FROM `user`.`tab123` WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($success, $query) or die (mysqli_error());
$count = mysqli_num_rows($result);
//If variables = database value, session starts.
if($count==1)
{
    $_SESSION['username']=$username;
}
else
{
    echo "Invalid Login Credentials.";
}
}
// Greeting the User after successful Login
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username']; 
    echo "Hi " . $username . ". ";  
    echo "This is the members area. ";
    echo "<a href='Register.php'>(Logout)</a>"; 
    session_destroy();   
}
    else
    { 
    ?>
    
<h1>Login</h1>
<form action="" method="POST">
    <p><label>User Name : </label>
    <input id="username" type="text" name="username" placeholder="username" /></p>
     <p><label>Password&nbsp;&nbsp; : </label>
     <input id="password" type="password" name="password" placeholder="password" /></p>
    <a class="btn" href="Register.php">Signup</a>
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>
<?php  } ?>

    </body>
</html>
        


    