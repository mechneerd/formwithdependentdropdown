<?php

$country_id = $_POST['country'];



echo $country_id;





$servername ="localhost";
$username="root";
$password="";
$dbname = "prasanthdb";

$con = new mysqli($servername,$username,$password,$dbname);


if($con->connect_error){ 
	die ("connection unsuccessful".$con->connect_error);
		}

$getstate = "SELECT * FROM state where country_id=".$country_id;


$res = $con->query($getstate);


if($res->num_rows > 0){
	while($rows = $res->fetch_assoc()){
    	echo '<option value="'.$rows['state_id'].'">'.$rows['state_name'].'</option>';}

}



$con->close();



?>