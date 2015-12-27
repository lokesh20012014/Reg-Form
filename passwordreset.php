<?php 
session_start();
include "connect.php"; //connects to the database
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $query="select * from `user`.`tab123` where username='$username'";
    $result = mysqli_query($query);
    $count=mysqli_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    if($count==1)
    {
        $rows=mysqli_fetch_array($result);
        $pass  =  $rows['password'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $to = $rows['email'];
        //echo "your email is ::".$email;
        //Details for sending E-mail
        $from = "My Personal Website";
        $url = " ";
        $body  =  "My Personal Website password recovery Script
        -----------------------------------------------
        Url : $url;
        email Details is : $to;
        Here is your password  : $pass;
        Sincerely,
        Lokesh";
        $from = "Your-email-address@domaindotcom";
        $subject = "My Personal Website Password recovered";
        $headers1 = "From: $from\n";
        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $headers1 .= "X-Priority: 1\r\n";
        $headers1 .= "X-MSMail-Priority: High\r\n";
        $headers1 .= "X-Mailer: Just My Server\r\n";
        $sentmail = mail ( $to, $subject, $body, $headers1 );
    } else {
    if ($_POST ['email'] != "") {
    echo "<span style="color: #ff0000;"> Not found your email in our database</span>";
        }
        }
    //If the message is sent successfully, display sucess message otherwise display an error message.
    if($sentmail==1)
    {
        echo "<span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>";
    }
        else
        {
        if($_POST['email']!="")
        echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
    }
}

//As I do not own a domain name for my personal website, I am unable to test the password recovery script




<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home: Webpage</title>
</head>
<body>
<form action="" method="post">
        <label> Enter your User ID : </label>
        <input id="username" type="text" name="username" />
        <input id="button" type="submit" name="button" value="Submit" />
    </form>
</body>
</html>