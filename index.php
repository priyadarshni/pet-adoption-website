<?php 
$page = "home";
$style = "./assets/css/index.css";
include "./assets/inc/header.php";
?>

<?php include "./assets/inc/nav.php" ?>

	<!-- HTML Data from database -->
	<div id="home">
		<div class="flex">
			<div class="left">
				<h1>Nice to meet you,</h1><h1>we are <span class="highlight">Peppy Adoption</span></h1>
				<p class="intro"> Do you know that over 1,000 people per hour run an online search looking to adopt a pet? Pet adoption is quickly becoming the preferred way to find a new furry friend for life. You will not only enjoy adding a pet to your home, but also give a second chance to a loving pet who desperately needs it. At Peppy adoption, we will help you find your purrfect/pawfect animal companion.</p>
				<a href="./pets.php" class="button primary-button">Let's explore</a>
			</div>
			<div class="right">
				
				<img class="cute-cat" src="./assets/image/cute-cat.png" alt="cat photo from https://www.stickpng.com/img/animals/cats/cute-cat-looking">
			</div>
		</div>
		<div class="photo-container flex">
			<div class="pet-photo pet-photo0" style="background-image: url('https://miro.medium.com/max/540/0*DqHGYPBA-ANwsma2.gif');"></div>
			<div class="pet-photo pet-photo1" style="background-image: url('https://miro.medium.com/max/540/0*DqHGYPBA-ANwsma2.gif');"></div>
			<div class="pet-photo pet-photo2" style="background-image: url('https://miro.medium.com/max/540/0*DqHGYPBA-ANwsma2.gif');"></div>
			<div class="pet-photo pet-photo3" style="background-image: url('https://miro.medium.com/max/540/0*DqHGYPBA-ANwsma2.gif');"></div>
		</div>
	</div>

	<script>
		$(document).ready(function() {


			if ($(window).width() <= 480) {  

	              // is mobile device

	       } else{
				var p_i = 0;
				requestData();
				var t = setInterval(requestData, 10000);
				var pet_i = 0;

				function requestData(){

					pet_i = 0;

					$('.pet-photo').fadeOut('slow', function() {
						$.ajax({
						url: './getAdoptablePets.php',
						type: 'GET',
						dataType: 'json',
						})
						.done(function(result) {
							loadPetImage(result);
							pet_i ++;
						})
						.fail(function() {
							console.log("error");
						})
						.always(function(result) {
						});
						});
				}

				function loadPetImage(data){
					console.log(p_i);
					$('.pet-photo').fadeIn();
					if(data[p_i]["img_url"]!=null&&data[p_i]["img_url"]!=""){

						$('.pet-photo'+pet_i).data("id", data[p_i]["pet_id"]);
						$('.pet-photo'+pet_i).data("name", data[p_i]["pet_name"])
						$('.pet-photo'+pet_i).attr("style", "background-image:url('"+data[p_i]["img_url"]+"')");
						$('.pet-photo'+pet_i).html("<p>"+data[p_i]["pet_name"]+"</p>");
						if(p_i==data.length-1){
							p_i=0;
						}else{
							p_i++;
						}

					}
				}
	       }

			
			
		});
	</script>
	<!-- End -->

<?php include "./assets/inc/footer.php" ?>