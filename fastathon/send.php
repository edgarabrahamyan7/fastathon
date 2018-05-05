<?php 
require_once('config.php');
session_start();

if(isset($_POST['registraion']) and $_POST['registraion'] == 'submit')
{
unset($_POST['registraion']);
$error_box = array();
$gError = false;
$contacts=$_POST['contact'];
$contacts2=$_POST['contact2'];
$phone=$_POST['phone'];

$emails=$_POST['email'];
$dd=$_POST['DD'];
$mm=$_POST['MM'];
$yyyy=$_POST['YYYY'];

$_SESSION['dear']=$contacts;	
if ($contacts=="")
{
$error_box['contacts_error']='weve';
$gError = true;	
}	
if ($contacts2=="")
{
$error_box['contacts2_error']='weve';
$gError = true;	
}
if(!isset($_POST['genders']))
{
$error_box['gender_error']='weve';
$gError = true;	
}
else{
	$gender=$_POST['genders'];
}			
if ($emails=="")
{
$error_box['emails_error']='weve';
$gError = true;	
}
elseif (!filter_var($emails, FILTER_VALIDATE_EMAIL)) {
	$error_box['emails_error']='weve';
	$gError = true;	
}
else{
    try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $connect->prepare("SELECT * FROM fastathon"); 
     $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	     foreach($stmt->fetchAll() as $k=>$v) { 
	        if($v['email']==$emails){
	        	$error_box['mail_exist_error']='THIS EMAIL ALREADY EXISTS';	
	        	$gError = true;
	        }
	    }
    }	
    catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
if ($phone=="") {
	$error_box['phone_error']='weve';
	$gError = true;	
}
if ($dd=="DD")
{
$error_box['age_error']='weve';
$gError = true;	
}		
if ($mm=="MM")
{
$error_box['age_error']='weve';
$gError = true;	
}		
if ($yyyy=="YYYY")
{
$error_box['age_error']='weve';
$gError = true;	
}	

$ages=$dd.'/'.$mm.'/'.$yyyy;

if($gError==false)
{
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = 'INSERT INTO fastathon(name, lastname,	gender, date, email, phone)
	    VALUES ("'. $contacts .'","'. $contacts2 .'","'. $gender .'","'. $ages .'","'. $emails .'","'. $phone .'")';
	    // use exec() because no results are returned
	    $conn->exec($sql);
	    file_put_contents("form/json/".$emails.".json", "");
	    $_SESSION['person']=$emails;
	    header("Location: " . $_SERVER['REQUEST_URI']."form");
	     }
		catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }
		$conn = null;

}

}

?>