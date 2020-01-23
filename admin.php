<?php

require "./pinclude/dbConnect.inc";

if ($mysqli) {

    // Pets
    $sql_pets = 'select * from pets';
    
    $res_pets=$mysqli->query($sql_pets);
    
    if($res_pets){
        while($rowHolder_pets = mysqli_fetch_array($res_pets, MYSQLI_ASSOC)){
            $records_pets[] = $rowHolder_pets;
        }
        // print json_encode($records);
    }

    // Donations

    $sql_don = 'select * from donation_received';
    
    $res_don=$mysqli->query($sql_don);
    
    if($res_don){
        while($rowHolder_don = mysqli_fetch_array($res_don, MYSQLI_ASSOC)){
            $records_don[] = $rowHolder_don;
        }
        // print json_encode($records);
    }


    // Feedback

    $sql_fb = 'select * from contact';
    
    $res_fb=$mysqli->query($sql_fb);
    
    if($res_fb){
        while($rowHolder_fb = mysqli_fetch_array($res_fb, MYSQLI_ASSOC)){
            $records_fb[] = $rowHolder_fb;
        }
        // print json_encode($records);
    }

    // Message

    $sql_msg = 'select * from adoptiondata';
    
    $res_msg=$mysqli->query($sql_msg);
    
    if($res_msg){
        while($rowHolder_msg = mysqli_fetch_array($res_msg, MYSQLI_ASSOC)){
            $records_msg[] = $rowHolder_msg;
        }
        // print json_encode($records);
    }



}

$rowcount_pets=mysqli_num_rows($res_pets);

?>

<?php 
$page = "admin";
$style = "./assets/css/admin.css";
include "./assets/inc/header.php";
?>

<?php include "./assets/inc/nav.php" ?>

<div id="admin">
        
    <h1>MANAGE</h1>

    <div class="tabs">
        <span class="tabs-item pets-tab">Pets</span>
        <span class="tabs-item don-tab">Donations</span>
        <span class="tabs-item fb-tab">Feedbacks</span>
        <span class="tabs-item msg-tab">Messages</span>
    </div>
    
    <div class="pet-table tables">
        
        <button type="button" class="table-button primary-button" id="btn-newPet">
          New Pet
        </button>

        <h2>Pets</h2>
        <?php echo("<span>". $rowcount_pets . " pets in total.</span>");
        ?>
        <div class="forms" id="insert-pets">
            <h5>New Pet</h5>

            <form id="form-insert-pets" class="popup-forms" action="insertPet.php">
                <div>
                    <div class="columns">
                    
                    <label for="ip-category">Category</label>
                    <input id="ip-category" name="category" type="text">
                            
                    <label for="ip-pet-name">Pet name</label>
                    <input id="ip-pet-name" name="name" type="text">
                    
                    <label for="ip-breed">Breed</label>
                    <input id="ip-breed" name="breed" type="text">
                    
                    <label for="ip-gender">Gender</label>
                    <input id="ip-gender" name="gender" type="text">
                    
                    <label for="ip-age">Age</label>
                    <input id="ip-age" name="age" type="text">
                    
                    <label for="ip-size">Size</label>
                    <input id="ip-size" name="size" type="text">
                    
                    
                    
                    
                    </div>

                    <div class="columns">

                    <label for="ip-weight">Weight</label>
                    <input id="ip-weight" name="weight" type="text">

                    <label for="ip-color">Color</label>
                    <input id="ip-color" name="color" type="text">

                    <label for="ip-trained">Trained</label>
                    <input id="ip-trained" name="trained" type="text">
                    
                    <label for="ip-health">Health</label>
                    <input id="ip-health" name="health" type="text">
                    
                    <label for="ip-goodwith">Good With</label>
                    <input id="ip-goodwith" name="goodwith" type="text">
                    
                    <label for="ip-fee">Adoption Fee</label>
                    <input id="ip-fee" name="fee" type="text">
                    
                    
                    
                    

                </div>

                <div class="columns">

                    <label for="ip-imgurl">Image URL</label>
                    <input id="ip-imgurl" name="imgurl" type="text">
                    
                    <label for="ip-decription">Description</label>
                    <textarea id="ip-decription" name="decription"></textarea>
                    
                    <label for="ip-status">Status</label>
                    <select id="ip-status" name="status">
                        <option value="adoptable">Adoptable</option>
                        <option value="adopted">Adopted</option> 
                    </select>
                </div>


                </div>

                <button type="submit" id="btn-insert-pets" class="primary-button">Insert</button>

                <button type="button" class="secondary-button btn-cancel" data-dismiss="modal">Close</button>
                

            </form>
        </div>


        <table class="tbs pet-tb">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <!-- <th>Category</th> -->
                <th>Name</th>
                <th>Breed</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Size</th>
                <th>Weight</th>
                <th>Color</th>
                <th>Trained</th>
                <th>Health</th>
                <!-- <th>Good With</th> -->
                <th>Adoption Fee</th>
                
                <!-- <th>Description</th> -->
                <!-- <th>Lost?</th>
                <th>Found?</th>
                <th>Adopted?</th>
                <th>Adoptable?</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
        setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
        foreach($records_pets as $this_row){
                echo '<tr class="tr-pet '.($this_row['adopted']?"tr-adopted":"").'" data-id="'.$this_row['pet_id'].'">

                    <td>'.$this_row['pet_id'].'
                    </td><td class="'.($this_row['adopted']?"adopted":"").'"><img class="pet-photo" src="'.$this_row['img_url'].'" alt="pet photo">'.'

                    </td><td>'.$this_row['pet_name'].'
                    </td><td>'.$this_row['breed'].'
                    </td><td>'.$this_row['gender'].'
                    </td><td>'.$this_row['age'].'
                    </td><td>'.$this_row['size'].'
                    </td><td>'.$this_row['weight'].'
                    </td><td>'.$this_row['color'].'
                    </td><td>'.$this_row['trained'].'
                    </td><td>'.$this_row['health'].'
                    
                    </td><td>'.$this_row['adoption_fee'].'
                                    
                    </td></tr>';

            }
                    // </td><td>'.$this_row['category'].'
                    // </td><td>'.$this_row['good_with'].'
                    // </td><td>See more in Database'.'
                    // </td><td>'.$this_row['lost'].'
                    // </td><td>'.$this_row['found'].'
                    // </td><td>'.$this_row['adopted'].'
                    // </td><td>'.$this_row['adoptable'].'
        ?>
        </tbody>
        </table>

    </div>

<div class="donate-table tables">
    <h2>Donations</h2>
    <span>Received from people</span>
    <table class="tbs don-tb">
        <thead>
        <tr>
            <th>Donator</th>
            <th>Amount</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
    foreach($records_don as $this_row){
            echo '<tr><td>'.$this_row['donor_first_name'].' '.$this_row['donor_last_name'].'
                </td><td>$'.$this_row['amount'].'
                </td><td>'.$this_row['donor_email'].'
                </td><td>'.$this_row['phone'].'
                </td></tr>';
        }
    ?>
    </tbody>
    </table>
</div>
<div class="feedback-table tables">
    <h2>Feedbacks</h2>
    <span>From Contact</span>
    <table class="tbs don-tb">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
    foreach($records_fb as $this_row){
            echo '<tr><td>'.$this_row['name'].'
                </td><td>'.$this_row['phone_no'].'
                </td><td>'.$this_row['email'].'
                </td><td>'.$this_row['feedback'].'
                </td></tr>';
        }
    ?>
    </tbody>
    </table>
</div>
<div class="message-table tables">
    <h2>Messages</h2>
    <span>Requests for more pet information</span>
    <table class="tbs don-tb">
        <thead>
        <tr>
            <th>Pet Name</th>
            <th>Contact Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
    foreach($records_msg as $this_row){
            echo '<tr><td>'.$this_row['pet_name'].'
                </td><td>'.$this_row['name'].'
                </td><td>'.$this_row['phone_no'].'
                </td><td>'.$this_row['email'].'
                </td><td>'.$this_row['content'].'
                </td></tr>';
        }
    ?>
    </tbody>
    </table>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#insert-pets').hide();
        $('#btn-newPet').on('click', function(event) {
            $('#insert-pets').fadeIn();
        });
        $('#btn-insert-pets').on('click', function(event) {
            $('#form-insert-pets').submit();
        });
        $('.pet-table').on('click', '.btn-cancel', function(event) {
            $('.forms').fadeOut();
        }).on('click', '.btn-update-pets', function(event) {
            $('#form-update-pets').submit();
        });

        $('.tables').hide();
        $('.pets-tab').addClass('tab-active');
        $('.pet-table').show();
        $('.tabs').on('click', '.pets-tab', function(event) {
            $('.tables').hide();
            $('.tabs-item').removeClass('tab-active');
            $('.pets-tab').addClass('tab-active');
            $('.pet-table').fadeIn();
        }).on('click', '.don-tab', function(event) {
            $('.tables').hide();
            $('.tabs-item').removeClass('tab-active');
            $('.don-tab').addClass('tab-active');
            $('.donate-table').fadeIn();
        }).on('click', '.fb-tab', function(event) {
            $('.tables').hide();
            $('.tabs-item').removeClass('tab-active');
            $('.fb-tab').addClass('tab-active');
            $('.feedback-table').fadeIn();
        }).on('click', '.msg-tab', function(event) {
            $('.tables').hide();
            $('.tabs-item').removeClass('tab-active');
            $('.msg-tab').addClass('tab-active');
            $('.message-table').fadeIn();
        });

        $('.tr-pet').on('click', function(event) {
            $.ajax({
                url: './updatePetForm.php',
                type: 'GET',
                dataType: 'html',
                data: {pet_id: $(this).data('id')},
            })
            .done(function(html) {
                console.log("success",html);
                $('.pet-table').append(html);

            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });

        $('.adopted').append('<p class="pet-status-text">Adopted</p>');
    });
</script>
    
<?php include "./assets/inc/footer.php" ?>
