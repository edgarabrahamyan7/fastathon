<?php
require_once("../config.php");

$id = null;

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
}

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$params = [];

	$sql = 'SELECT * FROM fastathon';

	if ( $id ) {
		$sql .= ' WHERE id = ?';
		$params[] = $id;
	}
    
    $query = $conn->prepare($sql);
    $query->execute($params);

    $clients = $query->fetchAll();

    if ( !count($clients) ) {
    	exit("No Client");
    } 

    if ( $id ) {
    	$path = 'json/'.$clients[0]['email'].'.json';
    	$clientData = [];

    	if ( file_exists($path) ) {
    		$clientData = json_decode(file_get_contents($path), true);
    	}

    	if ( !is_array($clientData) ) $clientData = [];

    	$clients[0] = array_merge($clientData, $clients[0]);
    }

} catch(PDOException $e){
    echo $e->getMessage();
}

$conn = null;


if ( $id ) {
	require_once("views/client.php");
} 
else {
	require_once("views/clients.php");
}