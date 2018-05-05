
<?php
session_start();
if(!isset($_SESSION['person']))
{
    header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://localhost/sss/fastathon/");
}
	

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		
		$data = json_decode(file_get_contents('php://input'), true);
		$file = file_get_contents("json/".$_SESSION['person'].".json");
		$fileData = json_decode($file, true);

		if ( is_null($fileData) ) $fileData = [];

		$updatedData = array_merge($fileData, $data);
		file_put_contents("json/".$_SESSION['person'].".json", json_encode($updatedData));
		session_unset();
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>FASTATHON</title>
	<!-- <link rel="icon" href="https://sss.am/wp-content/uploads/2017/02/Fav-150x150.png"> -->
	<link rel="stylesheet"  href="../style.css" type="text/css" >
	<link rel="stylesheet"  href="media.css" type="text/css" >
	<!-- <link rel="stylesheet"  href="../../../header/style.css?v4.3" type="text/css" > -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> -->
	<!-- <link rel="stylesheet" href="../../css3-animate-it-master/css/animations.css"> -->
	<script src="js/angular.min.js"></script>
	<script src="js/jquery1.9.1.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../tel.js?v1.5"></script>
<!-- 	<script type="text/javascript" src="../../../jquery1.9.1.js"></script>
	<script type="text/javascript" src="../../../jquery.js?v1.5"></script>
 --><meta charset="UTF-8">
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
</head>
<body>
<?php //require_once('../../header/header_menu.php'); ?>
<div id="rakStartups" class='animatedParent animateOnce'>

	<div id="rakStartupsForm">
		<div id="allDir">
		<img src="../img/Fastathon.png"/>
		<div id="eduDir">
			<div class="star">Education <i>(please start from the most recent employment)</i></div>
		</div>
		<input type="button"  value="+" class="halBordBut" onclick="add('education')" />
		<div id="experiansDir">
			<div class="star">Work experience <i>(please start from the most recent employment)</i></div>
				
		</div>
		<input type="button"  value="+" class="halBordBut" onclick="add('experience')" />
		<div id="entrepreneurshipDir">
			<div class="star">Entrepreneurship experience <i>(please start from the most recent employment)</i></div>
				
		</div>
		<input type="button"  value="+" class="halBordBut" onclick="add('entrepreneurship')" />
		<div id="volunteeringDir">
			<div class="star">Other professional/volunteering experience</div>	
		</div>	
		<input type="button"  value="+" class="halBordBut" onclick="add('volunteering')" />	
		<div id="finalDir">
		<form autocomplete="off" id="otherdirForm" name="final">
			<div class="star">Level Of English
			<select style="width: 144px!important;" name="engLevel" value="ednglish" required>
				<option value="">Select</option>
				<option value="fluent">Fluent</option>
				<option value="intermediate">Intermediate</option>
				<option value="beginner">Beginner</option>
			</select></div>
			<div class="star chekerr">Which area best describes the domain where you would like to create your startup?</div>

			<!-- <input style="width: 28px;" hidden  type="checkbox" name="bestArea[]" checked class="checkOne" value="Smart Economy"  required="required">	 -->
			<input type="text" id="hidden" hidden name="hidden" required>
			<input style="width: 28px;" type="checkbox"   name="bestArea[]" class="checkOne" value="Smart People"  required="required"><text>Smart Citizen</text><br>
			<input style="width: 28px;"   type="checkbox" name="bestArea[]" class="checkOne" value="Smart Economy"  required="required"><text>Smart Economy</text><br>
			<input style="width: 28px;" type="checkbox" name="bestArea[]" class="checkOne" value="Smart Mobility" required="required"><text>Smart Mobility</text><br>
			<input style="width: 28px;" type="checkbox" name="bestArea[]" class="checkOne" value="Smart Environment"  required="required"><text>Smart Environment</text><br>
			<input style="width: 28px;" type="checkbox" name="bestArea[]" class="checkOne" value="Smart Living" ><text>Smart Living</text><br>
			<input style="width: 28px;" type="checkbox" name="bestArea[]" class="checkOne" value="Smart Government"  required="required"><text>Smart Government</text><br>
			<div class='star'><textarea name="textarea1" class="halBord" placeholder="Why do you want to participate in FASTathon? (max 50 words)" required></textarea></div>
			<div class='star'><textarea name="textarea2" class="halBord" placeholder="What are your expectations from FASTathon? (max 50 words)" required></textarea></div>
			<div class='star'><textarea name="textarea3" class="halBord" placeholder="Additional information about you. (max 100 words)" required></textarea></div>
			<input type="text" style="width: 413px; float:left;"  placeholder="Facebook Link" class="halBord" name="fbLink" >
		</form>
		<div id="consideredDir">
		<div>Please describe any issues to be considered</div>
			<form autocomplete="off" name="consider">
			<input type="text" placeholder="Health issue" class="halBord" name="health" >		
			<input type="text" placeholder="Dietary issue" class="halBord" name="dietary" >	
			<input type="text" placeholder="Other" class="halBord" name="other" >	
			
			<div  style="text-align: right;">Experience to live in tent
			<input style="width: 28px;" type="radio"  name="liveTent" value="yes">Yes
			<input style="width: 28px;" type="radio"  name="liveTent" value="no">No
			</div>
			<hr>
			</form>
		</div>	
		</div>
		<form autocomplete="off"  name="agree">
		<div class="iAgree">
			<p>
				<b>Our Policy</b><br><br>
				The participant should attend the whole event and is not allowed to leave the Summit territory except some emergencies. Participants must sttrictly follow the agenda. All the participants should strictly act based on terms and conditions of the event.<br>Please remember that you will stay in the tents for several nights. The Venue is located on the beach. During the day-time, it is quite warm, while during the night hours the temperature can decrease, so some warm clothes might be needed. Do not forget about the sun and take with your sunglasses, sun protection creams, anti-mosquito sprays etc. We strongly recommend you to have a laptop (Internet and electricity are there).
			</p>
		</div>
		<input style="width: 28px;" type="checkbox" class="agri" onchange="agreei()" ><text>I hereby acknowledge that I have read, understand and agree to the <a style="text-transform: uppercase;" href="#" target="_blanck">Terms & Conditions</a></text><br>			
		</form>

		<input type="submit" name="submit" value="APPLY"   id="sendForm2" class="sendForm"  />
		</div>
	</div>

	<div id="congraulation">
		<img src="../img/Fastathon.png"/>
		<p>
			Congratulations 
			Your application was successfully submitted and is under the review. Our team will contact you in upcoming weeks.</p>
	</div>
</div>

<form autocomplete="off" id="educationForm" name="education">
	<input type="text" placeholder="Institution" class="halBord" name="institute" required />			
	<input type="text" placeholder="Department"  class="halBord" name="department" required>			
	<input type="text" placeholder="Specialization" class="halBord" name="specialization" required>			
	<input type="number" title="Type only numbers" placeholder="Years of Education" class="halBord" name="education_years" required>	
	<span class="closeBut" onclick="closeForm('education', this)"></span>
	<hr>
</form>

<form autocomplete="off" id="experienceForm" name="experience">
	<input type="text" placeholder="Company name" class="halBord" name="company" required>			
	<input type="text" placeholder="Field of operation" class="halBord" name="operation" required>			
	<input type="text" placeholder="Department/Unit" class="halBord" name="unit" required>			
	<input type="number" title="Type only numbers" placeholder="Number Of Employment years" class="halBord" name="employYers" required>	
	<span   class="closeBut" onclick="closeForm('experience', this)"></span>
	<hr>
</form>
<form autocomplete="off" id="entrepreneurshipForm" name="entrepreneurship">
	<input type="text" placeholder="Company name" class="halBord" name="company2" required>			
	<input type="text" placeholder="Field of operation" class="halBord" name="operation2" required>			
	<input type="text" placeholder="Department/Unit" class="halBord" name="unit2" required>			
	<input type="number" title="Type only numbers" placeholder="Number Of Employment years" class="halBord" name="employYers2" required>	
	<span  class="closeBut" onclick="closeForm('entrepreneurship', this)"></span>
	<hr>
</form>
<form autocomplete="off" id="volunteeringForm" name="volunteering">
	<input type="text" placeholder="Company name" class="halBord" name="company3" required>			
	<input type="text" placeholder="Field of operation" class="halBord" name="operation3" required>			
	<input type="text" placeholder="Position/Function" class="halBord" name="unit3" required>			
	<input type="text" placeholder="Duration" class="halBord" name="employYers3" required>	
	<span class="closeBut" onclick="closeForm('volunteering', this)"></span>	
	<hr>
</form>

<script src="js/java2.js"></script>
</body>
</html>