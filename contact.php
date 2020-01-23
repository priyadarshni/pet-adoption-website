
<?php

require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select * from contact';
    
    $res=$mysqli->query($sql);
    
    if($res){
        while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $records[] = $rowHolder;
        }
        // print json_encode($records);
    }
}

$rowcount=mysqli_num_rows($res);

?>

<?php 
$page = "contact";
$style = "./assets/css/contact.css";
include "./assets/inc/header.php"
?>

<?php include "./assets/inc/nav.php" ?>
  
<h1>Contact Us</h1>
<div class="left">
  <h2>Our Location</h2>
  <p>1217 Clifford Ave, Rochester, NY 14623</p>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2909.6398777490444!2d-77.59220368483737!3d43.17508287914062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d6b5c131a407cf%3A0x87e2b97d0b3d0467!2s1217%20Clifford%20Ave%2C%20Rochester%2C%20NY%2014621!5e0!3m2!1sen!2sus!4v1575400029747!5m2!1sen!2sus" allowfullscreen=""></iframe>
</div>

<div class="right">
    <div class="form">
        <form action="contactdata.php" method="post" name="user">
        <p>Thank you for contacting Peppy Adoption. You may also call (585)-XXX-XXXX during normal business hours, Monday-Sunday, 8:00 A.M. to 8:00 P.M. ET.</p><br>
        <label>Your Name: </label><br><input class="inputfield" type="text" name="name" placeholder="Your name..." value=""><br>
        <label>Phone Number: </label><br><input class="inputfield" type="text" name="phone" placeholder="Phone number..." value=""><br>
        <label>Email: </label><br><input class="inputfield" type="text" name="email" placeholder="Email..." value=""><br>
        <label>Feedback: </label><br><textarea class="feedback" name="feedback"></textarea><br>
        <br>
        <button class="primary-button" type="submit">Submit</button>
        </form>     
    </div>
</div>
    
<?php include "./assets/inc/footer.php" ?>

 