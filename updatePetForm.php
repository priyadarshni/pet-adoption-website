<?php

require "./pinclude/dbConnect.inc";

if ($mysqli) {

    // Pets
    $sql_pets = 'select * from pets where pet_id = "'.$_GET['pet_id'].'"';
    
    $res_pets=$mysqli->query($sql_pets);
    
    if($res_pets){
        while($rowHolder_pets = mysqli_fetch_array($res_pets, MYSQLI_ASSOC)){
            $records_pets[] = $rowHolder_pets;
        }
        // print json_encode($records_pets[0]);
    }
}
?>


<div class="forms" id="update-pets">
    <h5><?php echo $records_pets[0]['pet_name']?></h5>

    <form id="form-update-pets" class="popup-forms" action="updatePet.php" enctype="multipart/form-data" method="POST">
        <div>
            <div class="columns">

            <label for="ip-category">ID</label>
            <input id="ip-category" name="id" type="text" value="<?php echo $records_pets[0]['pet_id']?>">
            
            <label for="ip-category">Category</label>
            <input id="ip-category" name="category" type="text" value="<?php echo $records_pets[0]['category']?>">
                    
            <label for="ip-pet-name">Pet name</label>
            <input id="ip-pet-name" name="name" type="text" value="<?php echo $records_pets[0]['pet_name']?>">
            
            <label for="ip-breed">Breed</label>
            <input id="ip-breed" name="breed" type="text" value="<?php echo $records_pets[0]['breed']?>">
            
            <label for="ip-gender">Gender</label>
            <input id="ip-gender" name="gender" type="text" value="<?php echo $records_pets[0]['gender']?>">
            
            <label for="ip-age">Age</label>
            <input id="ip-age" name="age" type="text" value="<?php echo $records_pets[0]['age']?>">
            

            </div>

            <div class="columns">

            
            
            <label for="ip-size">Size</label>
            <input id="ip-size" name="size" type="text" value="<?php echo $records_pets[0]['size']?>">

            <label for="ip-weight">Weight</label>
            <input id="ip-weight" name="weight" type="text" value="<?php echo $records_pets[0]['weight']?>">

            <label for="ip-color">Color</label>
            <input id="ip-color" name="color" type="text" value="<?php echo $records_pets[0]['color']?>">

            <label for="ip-trained">Trained</label>
            <input id="ip-trained" name="trained" type="text" value="<?php echo $records_pets[0]['trained']?>">
            
            <label for="ip-health">Health</label>
            <input id="ip-health" name="health" type="text" value="<?php echo $records_pets[0]['health']?>">
            
            <label for="ip-goodwith">Good With</label>
            <input id="ip-goodwith" name="goodwith" type="text" value="<?php echo $records_pets[0]['good_with']?>">

        </div>

        <div class="columns">


            
            <label for="ip-fee">Adoption Fee</label>
            <input id="ip-fee" name="fee" type="text" value="<?php echo $records_pets[0]['adoption_fee']?>">

            <label for="ip-img">Image</label>
            <input id="ip-img" name="uploadedimg" type="file">
            
            <label for="ip-decription">Description</label>
            <textarea id="ip-decription" name="decription" rows="10"><?php echo $records_pets[0]['description']?></textarea>

            <label for="ip-status">Status</label>
            <select id="ip-status" name="status">
                <?php echo '<option value="adoptable"'.($records_pets[0]['adoptable']?"selected":"").'>Adoptable</option>' ?> 
              <?php echo '<option value="adopted"'.($records_pets[0]['adopted']?"selected":"").'>Adopted</option>' ?> 
            </select>

            </div>
        </div>

        <button type="submit" id="btn-update-pets" class="primary-button">Update</button>

        <button type="button" class="secondary-button btn-cancel" data-dismiss="modal">Close</button>

    </form>
</div>
