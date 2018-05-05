
<html>
<head>
	<title>FASTATHON CLIENTS</title>
	<link rel="icon" href="https://sss.am/wp-content/uploads/2017/02/Fav-150x150.png">
	<link rel="stylesheet"  href="views/style.css" type="text/css">
</head>
<body>
	<table>
		<tr><th>NAME</th><th>LAST NAME</th><th>GENDER</th><th>DATE</th><th>EMAIL</th><th>PHOME</th></tr>
		<?php 
			// var_dump($clients);
			foreach($clients as $v) { 
								   
			     echo '<tr>
				    	<td><a href="?id='.$v['id'].'">'.$v['name'].'</td>
				    	<td><a href="?id='.$v['id'].'">'.$v['lastname'].'</td>
				    	<td><a href="?id='.$v['id'].'">'.$v['gender'].'</td>
				    	<td><a href="?id='.$v['id'].'">'.$v['date'].'</td>
				    	<td><a href="?id='.$v['id'].'">'.$v['email'].'</a></td>
				    	<td><a href="?id='.$v['id'].'">'.$v['phone'].'</a></td>
			    	</tr>';
			}
		?>
	</table>
</body>
</html>