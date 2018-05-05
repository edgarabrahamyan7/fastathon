<!DOCTYPE html>
<html>
<head>
	<title>FASTATHON</title>
	<link rel="icon" href="https://sss.am/wp-content/uploads/2017/02/Fav-150x150.png">
	<link rel="stylesheet"  href="views/style.css" type="text/css" >
	<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
</head>
<body>

<?php
			foreach($clients as $v) { 
			    
			   
			    
			    if (isset($v['education'])) {
			    	$edu=$v['education'];

			    echo "
			    	<h4>EDUCATION</h4>
			    	<table>
			    	<tr><th>Institution</th><th>Dempartment</th><th>Specialization</th><th>Years of education</th></tr>
			    	";
				foreach($edu as $key=>$val) { 		
			 		echo '
			    		<tr><td>'.implode(" ", $val['institute']).'</td><td>'.implode(" ", $val['department']).'</td><td>'.implode(" ", $val['specialization']).'</td><td>'.implode(" ", $val['education_years']).'</td></tr>
			    	';
			 	}
			 	echo "</table>";
			   }
			   if (isset($v['experience'])) {
			   	 $exp=$v['experience'];
			 	echo "
			    	<h4>EXPERIENCE</h4>
			    	<table>
			    	<tr><th>Company</th><th>Fild of operation</th><th>Dempartment</th><th>Number of employment years</th></tr>
			    	";
				foreach($exp as $key=>$val) { 		
			 		echo '
			    		<tr><td>'.implode(" ", $val['company']).'</td><td>'.implode(" ", $val['operation']).'</td><td>'.implode(" ", $val['unit']).'</td><td>'.implode(" ", $val['employYers']).'</td></tr>
			    	';
			 	}
			 	echo "</table>";
			    }
			    if (isset($v['entrepreneurship'])) {
			    $ent=$v['entrepreneurship'];
			 	echo "
			    	<h4>ENTERPRENEURSHIP</h4>
			    	<table>
			    	<tr><th>Company</th><th>Fild of operation</th><th>Posityon</th><th>Number of employment years</th></tr>
			    	";
				foreach($ent as $key=>$val) { 		
			 		echo '
			    		<tr><td>'.implode(" ", $val['company2']).'</td><td>'.implode(" ", $val['operation2']).'</td><td>'.implode(" ", $val['unit2']).'</td><td>'.implode(" ", $val['employYers2']).'</td></tr>
			    	';
			 	}
			 	echo "</table>";
			    }
			    if (isset($v['volunteering'])) {
			    $vol=$v['volunteering'];
			 	echo "</table>";
			 	echo "
			    	<h4>VOLUNTEERING</h4>
			    	<table>
			    	<tr><th>Company</th><th>Fild of operation</th><th>Posityon</th><th>Duration</th></tr>
			    	";
				foreach($vol as $key=>$val) { 		
			 		echo '
			    		<tr><td>'.implode(" ", $val['company3']).'</td><td>'.implode(" ", $val['operation3']).'</td><td>'.implode(" ", $val['unit3']).'</td><td>'.implode(" ", $val['employYers3']).'</td></tr>
			    	';
			 	}
			 	echo "</table>";
			     }
			     if (isset($v['final'])) {
			     $final=$v['final'];
			 	echo '
			    	<h4>INFO</h4>
			    	<table>
			    	<tr><th>Eng Level</th><th>Create Area</th><th>Participate in Fastathon</th><th>Expextations Fastathon</th><th>Aditional info</th><th>FB LINK</th></tr>
			    		<tr><td>'.implode(" ", $final['engLevel']).'</td><td>'.implode(" ", $final['bestArea']).'</td><td>'.implode(" ", $final['textarea1']).'</td><td>'.implode(" ", $final['textarea2']).'</td><td>'.implode(" ", $final['textarea3']).'</td><td><a target="_blank" href="'.implode(" ", $final['fbLink']).'">Link</a></td></tr>
			    	</table>'
			    	;		
			    }
			    if (isset($v['consider'])) {
			    	$cons=$v['consider'];
			    	if (!isset($cons['liveTent'])) {
			    		$liveTen=" ";
			    	}
			    	else{
			    		$liveTen=implode(" ", $cons['liveTent']);
			    	}
			    	
			    	echo '
			    	<h4>Issues describtion</h4>
			    	<table>
			    	<tr><th>Health issue</th><th>Dietary issue</th><th>Other</th><th>Experience to live in tent</th></tr>
			    		<tr><td>'.implode(" ", $cons['health']).'</td><td>'.implode(" ", $cons['dietary']).'</td><td>'.implode(" ", $cons['other']).'</td><td>'.$liveTen.'</td></tr>
			    	</table>'
			    	;
			    }	
			 }
		
?>
</body>
</html>