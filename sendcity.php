<?php

$state_id = $_POST['state'];



echo $state_id;





$servername ="localhost";
$username="root";
$password="";
$dbname = "prasanthdb";

$con = new mysqli($servername,$username,$password,$dbname);


if($con->connect_error){ 
	die ("connection unsuccessful".$con->connect_error);
		}

$getcity = "SELECT * FROM city where state_id=".$state_id;


$res = $con->query($getcity);


if($res->num_rows > 0){
	while($rows = $res->fetch_assoc()){
    	echo '<option value="'.$rows['city_id'].'">'.$rows['city_name'].'</option>';}

}



$con->close();



?>