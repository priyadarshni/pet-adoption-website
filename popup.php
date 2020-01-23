<?php

require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select * from pets';
    
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
$page = "Pet Info";
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
        
        <div class="nav">
                    <a href="index.php">HOME ></a>
                    <a href="pets.php">ADOPT A PET ></a>
                    <a href="..">..</a>
        </div>
        
        <div id= content>
        <div id="cutie">
            
            <?php
    
                    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'
                    foreach($records as $this_row){
                        if($this_row['pet_id']==$_GET['id']){
                            echo '<img id="'.$this_row['pet_id'].'" src="'.$this_row['img_url'].'" alt="'.$this_row['pet_name'].'">';
                        }
                    }
            
            ?>
            
            <div id="text">
                <?php
    
                    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'
                    foreach($records as $this_row){
                        if($this_row['pet_id']==$_GET['id']){
                            echo 'Pet Name: '.$this_row['pet_name'].'<br>
                                Breed: '.$this_row['breed'].'<br>
                                Age: '.$this_row['age'].'<br>
                                Size: '.$this_row['size'].'<br>
                                Weight: '.$this_row['weight'].' <br>
                                Color: '.$this_row['color'].' <br>
                                Trained: '.$this_row['trained'].' <br>
                                Health: '.$this_row['health'].' <br>
                                Good with: '.$this_row['good_with'].' <br>
                                Adoption Fee: '.$this_row['adoption_fee'].' <br>
                                Discription: '.$this_row['description'].'<br>';
                            
                            $pet_name=$this_row['pet_name'];
                        
                        }
                    }
            
            ?>
            </div>
        </div>
            
            <div id="form">
                <h2>Contact us for more info/adoption!</h2>
                <form action="adoptiondata.php" method="post" name="user">
                     <label>Pet_name: </label><br><input type="text" name="pet_name" value="<?php echo $pet_name ?>" ><br>
                    <label>Your Name: </label><br><input type="text" name="name" value=""><br>
                    <label>Phone Number: </label><br><input type="number" name="phone" value=""><br>
                    <label>Email: </label><br><input type="text" name="email" value=""><br>
                    <label>Content: </label><br><input id="content" type="text" name="content" value=""><br>

                    <button class="primary-button" type="submit">Submit</button>
                </form> 
            </div>
        </div>
              
    </div>


	<script>
		
	</script>
	<!-- End -->

<?php include "./assets/inc/footer.php" ?>