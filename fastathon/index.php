<?php 
	require_once('send.php');
	require_once('aray.php');
?>

<html>
<head>
	<title>FASTATHON</title>
<link rel="icon" href="https://sss.am/wp-content/uploads/2017/02/Fav-150x150.png">
<link rel="stylesheet"  href="style.css" type="text/css" >
<link rel="stylesheet"  href="../../header/style.css?v4.3" type="text/css" >
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="../css3-animate-it-master/css/animations.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="tel.js?v1.5"></script>
<script type="text/javascript" src="../../jquery1.9.1.js"></script>
<script type="text/javascript" src="../../jquery.js?v1.5"></script>
<meta name="google-site-verification" content="4WiXqyR2Hs6Xt14evLk-L7qbiJ4YmPwj-dRkF-7HJUo">
<meta charset="UTF-8">
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<style type="text/css">
#rakStartupsForm form {
    width: 330px!important;
}
#rakStartupsForm form input{
   max-width: 370px!important;
       width: auto!important;
}
</style>
</head>
<body>
<?php //require_once('../../header/header_menu.php'); ?>
<div id="rakStartups" class='animatedParent animateOnce'>
	<div id="rakStartupsForm" >
	<div class="info">
			&nbsp;&nbsp;&nbsp;&nbsp;It is our pleasure to learn that you are interested in becoming a part of FASTathon within the frames of Sevan Startup Summit on July 22 – 29, 2018.<br><br>

			&nbsp;&nbsp;&nbsp;&nbsp;FASTathon is a hackathon within the frames of Sevan Startup Summit 2018 program, which provides an innovative, non-formal environment for emerging entrepreneurs to generate new ideas with the focus on “Smart City” concept, develop viable business models, turn ideas into business concepts through acquiring new skills and knowledge, expanding professional network, establishing new cooperation and partnerships, seeking investments, winning awards and having a fun time on the beautiful coast of the Lake Sevan.<br><br>

			&nbsp;&nbsp;&nbsp;&nbsp;Please kindly fill in the application form for the participation in FASTathon.  
			In case of questions feel free to contact us by email: events@fast.foundation or by phone: (+374 60) 740 044.  
	</div>
		<form autocomplete="off" method="post"  action=""  id="registrationForm" enctype="multipart/form-data">
			<input  type="hidden"  name="registraion" value="submit" />
			<img src="img/Fastathon.png"/>
			<input class='<?php echo isset($error_box['contacts_error'])? $error_box['contacts_error']:'animated bounceInRight go'; ?>' type="text" id='contactPers' onblur="imblur1()" placeholder="FIRST NAME" name="contact" value="<?php echo isset($_POST['contact'])? $_POST['contact']: ""; ?>" />			
			<input class='<?php echo isset($error_box['contacts2_error'])? $error_box['contacts2_error']:'animated bounceInRight go'; ?>' type="text" id='contactPers2' onblur="imblur2()" placeholder="LAST NAME" name="contact2" value="<?php echo isset($_POST['contact2'])? $_POST['contact2']: ""; ?>" />
			<span style='<?php echo isset($error_box['gender_error'])? "color:#a61318;":''; ?>'>GENDER</span> 
				<input name="genders"  style="margin-left: 28px; margin-top: 6px;" type="radio" value="male" <?php if (isset($_POST['genders']) and $_POST['genders']=='male') {echo "checked";} ?> ><text>Male</text>
				<input name="genders" style="margin-left: 28px; margin-top: 6px;" type="radio"  value="female"  <?php if(isset($_POST['genders']) and $_POST['genders']=='female') {echo "checked";} ?>><text>Female</text>
			<input class='<?php echo isset($error_box['emails_error'])? $error_box['emails_error']:'animated bounceInLeft go'; ?>' type="text" id='emailAddres' onblur="imblur3()" placeholder="EMAIL" name="email" value="<?php echo isset($_POST['email'])? $_POST['email']: ""; ?>" />
			<span style="color: #a61318; width: 100%; margin-bottom: 20px; margin-top: -20px;"><?php echo isset($error_box['mail_exist_error'])? $error_box['mail_exist_error']:''; ?></span>
			<input class='<?php echo isset($error_box['phone_error'])? $error_box['phone_error']:'animated bounceInLeft go'; ?>' type="text" id='phoneNum' onblur="imblur4()" placeholder="PHONE NUMBER" name="phone" value="<?php echo isset($_POST['phone'])? $_POST['phone']: ""; ?>" />
			<span style='<?php echo isset($error_box['gender_error'])? "color:#a61318;":''; ?>'>DATE OF <br>BIRTH</span> 
			<select  name="DD" class='<?php echo isset($error_box['age_error'])? $error_box['age_error']:'animated bounceInLeft go'; ?>'>
			<option value="<?php echo isset($_POST['DD'])? $_POST['DD']: "DD"; ?>"><?php echo isset($_POST['DD'])? $_POST['DD']: "DD"; ?></option>
			<?php 
			
			for ($i=1; $i < 32; $i++) { 
					echo '<option value="'.$i.'"';
					if (isset($cont) && $cont==$i) echo "selected";
					echo ">" . ucfirst($i) . "</option>";
			}
			
			?>

			</select>			
			<select  name="MM" class='<?php echo isset($error_box['age_error'])? $error_box['age_error']:'animated bounceInLeft go'; ?>'>
			<option value="<?php echo isset($_POST['MM'])? $_POST['MM']: "MM"; ?>"><?php echo isset($_POST['MM'])? $_POST['MM']: "MM"; ?></option>
			<?php 
			$options=array("Jan","Feb", "Mar","Apr", "May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
			foreach ($options as $i)
			{
			echo '<option value="'.$i.'"';
			if (isset($cont) && $cont==$i ) echo "selected";
				
				echo ">" . ucfirst($i) . "</option>";
			}
			
			?>
			</select>			
			<select  name="YYYY" class='<?php echo isset($error_box['age_error'])? $error_box['age_error']:'animated bounceInLeft go'; ?>'>
			<option value="<?php echo isset($_POST['YYYY'])? $_POST['YYYY']: "YYYY"; ?>"><?php echo isset($_POST['YYYY'])? $_POST['YYYY']: "YYYY"; ?></option>
			<?php 
			
			for ($i=2001; $i > 1969; $i--) { 
					echo '<option value="'.$i.'"';
					if (isset($cont) && $cont==$i) echo "selected";
					echo ">" . ucfirst($i) . "</option>";
			}
			
			?>

			</select>
			<input type="submit" style="width: 344px!important;" name="submit" value="NEXT"  class="sendForm" onclick="apply()" />
		</form>
</div>
</div>
</body>
</html>