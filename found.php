<?php

require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select location, img_url, breed, color, email, found_date from found_pet_info';
    
    $res=$mysqli->query($sql);
    
    if($res){
        while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $records[] = $rowHolder;
        }
        // print json_encode($records);
    }
}


?>

<?php 
$page = "Found Pets Page";
$style = "./assets/css/found.css";
include "./assets/inc/header.php" 
?>


<?php include "./assets/inc/nav.php" ?>

<div class="header">
    <h1>Found Pets</h1>
</div>

<div class="wrapper">

    <!-- report found pets-->
    <div class="column left">
        <div class="reportCard">
            <h2>Found a Lost Pet?</h2>
            <form action="found.php" method="POST">
            <div class="item">
                <label>Breeds:  </label><input type="text" name="breed" >
            </div>
            <div class="item">
                <label>Color:   </label><input type="text" name="color">
            </div>
            <div class="item">  
                <label>Found Address:   </label><input type="text" name="location" size="35" placeholder="Enter the address">
            </div>
            <div class="item">
            <label>Found date:  </label><input type="date" name="found_date">
            </div>
            <div class="item">
            <label>Contact Email:   </label><input type="text" size="35" name="email">
            </div>
            <div class="pic-upload">
                <div class="pic-edit">
                    <label>Upload a Picture: </label>
                    <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                </div>
                <div class="pic-preview">
                    <div class="imagePreview" style="background-image:url('./assets/image/preview.jpg');">
                    </div>
                </div>
            </div>
            <div class="center">
                <button type="submit" class="primary-button">Submit</button>
            </div>
        </form>
        </div>
    </div>


    <?php
        if ('POST' === $_SERVER['REQUEST_METHOD']){

            if($_POST['breed']!=""){
                $breed = $_POST['breed'];
                $color = $_POST['color'];
                $location = $_POST['location'];
                $found_date = $_POST['found_date'];
                $email = $_POST['email'];
                
                $db_host="localhost";
                $db_username="iste645t04";
                $db_pass="lightamerica";
                $db_name="iste645t04";
                
                
                $db_connect=mysqli_connect($db_host,$db_username,$db_pass,$db_name);

                $query = "INSERT INTO  found-pet-info(breed, color, location, found_date, email) VALUES('$breed', '$color', '$location', '$found_date', '$email')";

                mysqli_close($db_connect);

                echo 'Thank you for your submission!';

             }
         }
    ?>

    
    <!-- found pets cards -->
    <div class="column right">
    <?php 
        setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
        foreach($records as $this_row){
            echo '
        <div class="petCards">
            <div class="card-column">
                <h2> '.$this_row['location'].'</h2>          
                <div class="pet-pic">
                    <img class="fit-center" src="'.$this_row['img_url'].'" alt="'.$this_row['breed'].'">
                </div>
            </div>

            <div class="card-column">
                <div class="item">
                    <label>Breeds: </label> <p>'.$this_row['breed'].'</p>
                </div> 
                <div class="item">
                    <label>Color: </label> <p>'.$this_row['color'].'</p>
                </div> 
                <div class="item">
                    <label>Contact: </label> <p>'.$this_row['email'].'</p>
                </div>
                <div class="item">
                    <label>Found Date: </label> <p>'.$this_row['found_date'].'</p>
                </div>                
            </div>
        </div>';
        }
    ?> 

    </div>


</div>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.imagePreview').css('background-image', 'url('+e.target.result +')');
            $('.imagePreview').hide();
            $('.imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>


<?php include "./assets/inc/footer.php" ?>