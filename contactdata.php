<?php

$db_host="localhost";
$db_username="iste645t04";
$db_pass="lightamerica";
$db_name="iste645t04";


$db_connect=mysqli_connect($db_host,$db_username,$db_pass,$db_name);

 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $feedback= $_POST['feedback'];

$query=mysqli_query($db_connect, "INSERT INTO contact(name, phone_no, email, feedback) VALUES('$name','$phone', '$email', '$feedback')");

$to ="qz6021@g.rit.edu, xy1258@g.rit.edu, ps1862@g.rit.edu, yb5803@g.rit.edu, wyl7747@g.rit.edu";
$subject = "Peppy Adoption New Feedback Received";
$message = "
    <html>
    <head>
        <title>Peppy Adoption New Feedback</title>
    </head>
    <body>
        <h1>New Feedback for Peppy Adoption</h1>
        <p>
            From: $name<br>
            Contact Number: $phone<br>
            Email: $email<br>
            Feedback: $feedback
        </p>
    </body>
    </html>
";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <wyl7747@rit.edu>' . "\r\n";

mail($to,$subject,$message,$headers);

mysqli_close($db_connect);

header('Location: contact.php');
exit();
?>