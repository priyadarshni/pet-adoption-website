<?php

require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select category, pet_id, pet_name, img_url from pets';
    
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
$page = "pets";
$style = "./assets/css/adopt.css";
include "./assets/inc/header.php";
?>

<?php include "./assets/inc/nav.php" ?>
<style>
	#home h1{
		color: #36008D;
	}
</style>

	<!-- HTML Data from database -->
    <div id="main">
        <h1>ADOPT A PET</h1>
        
        <div class="tab">
          <button id="othersb" class="tablinks" onclick="openPet(event, 'Others')">OTHERS</button>
          <button id="dogb" class="tablinks" onclick="openPet(event, 'Dog')">DOG</button>
          <button id="catb" class="tablinks" onclick="openPet(event, 'Cat')">CAT</button>
        </div>
        
    
        <div id="Cat" class="tabcontent">
            <?php
    
                    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'
                    foreach($records as $this_row){
                        if($this_row['category']=="cat"){
                            echo'<img class="pets-img" data-id="'.$this_row['pet_id'].'" src="'.$this_row['img_url'].'" alt="'.$this_row['pet_name'].'">';
                        }
                    }
            
            ?>
            
              
        </div>
        
        <div id="Dog" class="tabcontent">
            <?php
    
                    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'
                    foreach($records as $this_row){
                        if($this_row['category']=="dog"){
                            echo '<img class="pets-img" data-id="'.$this_row['pet_id'].'" src="'.$this_row['img_url'].'" alt="'.$this_row['pet_name'].'">';
                        }
                    }
            
            ?>
        </div>
        
        <div id="Others" class="tabcontent">
            <?php
    
                    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'
                    foreach($records as $this_row){
                        if($this_row['category']=="others"){
                            echo '<img class="pets-img" data-id="'.$this_row['pet_id'].'" src="'.$this_row['img_url'].'" alt="'.$this_row['pet_name'].'">';
                        }
                    }
            
            ?>
        </div>
    </div>


	<script>
        $( document ).ready(function() {
            $('.pets-img').on("click", function () {
                console.log($(this).data("id"));
                window.open("./popup.php?id="+$(this).data("id"), '_blank');
            //   $.ajax({
            //       type: "GET",
            //       url: "popup.php",
            //       data: {"pet_id", $(this).id},
            //       dataType: "html",
            //       success: function (response) {
            //           console.log('success');
            //       }
            //   });
            });
        });
		function openPet(evt, petName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(petName).style.display = "flex";
          evt.currentTarget.className += " active";
        }
	</script>
	<!-- End -->

<?php include "./assets/inc/footer.php" ?>