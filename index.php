<!DOCTYPE html>
<html>
  <head>
    <title>FORM FOR PRATICE</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body>

<?php

$servername="localhost";
$username="root";
$password="";
$dbname="prasanthdb";

$con = new mysqli($servername,$username,$password,$dbname);

?>

<?php
$name =$pass =$web =$emp = $gen ='';
$mov1 =$mov2=$mov3='';

$country_id=$state_id=$city_id='';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST['username'];
	$pass =$_POST["password"];
	$web = $_POST['website'];
	$emp = $_POST['employ'];
	$gen =$_POST['gender'];	
	$country_id =$_POST['country'];	
	$state_id =$_POST['state'];	
	$city_id =$_POST['city'];	
	

	$mov = $_POST['movies'];
	if(empty($mov[0])&&empty($mov[1])&&empty($mov[2])){
	$moverr= 'please select a movie';
	}else{
		$mov1 = $mov[0];
		$mov2 = $mov[1];
		$mov3 = $mov[2];
}}


?>
	<h1 style="color:#A9A9A9; margin-left:300px; margin-top:50px;'">Fill the form </h1>
  <div id="cont" style="background-color:#00cc99
;display:flex;width:250px;height:350px;margin-left:300px;margin-top:20px;padding-left:10px;padding-top:10px;border-radius:10px;">

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"; method="POST" >
		<lable>username</label>
		<input type="Text"  name='username'></input><br>
		<lable>password</label>
		<input type="password" name="password"></input><br>
	

	
	<lable>Employee number</label>
	<input type="number" name='employ' min="1" max="99999"></input><br>

	<lable>which website you want to log in to? </label>
	<select name="website" style="background-color:#6699ff;color:#ff9900">
		<option ></option>
		<option value="google">google</option>
		<option value="facebook">facebook</option>
		<option value="twitter">twitter</option>
		<option value="quora">quora</option>
	</select><br>

	<p>Gender:</p>
		<input type="radio" name = "gender" class="gender" value="Male" name="g" style="margin-left:105px;"></input>
		<label>Male</label><br>
		<input type="radio" name = "gender" class="gender" value="Female" name="g" style="margin-left:105px;"></input>
		<label>Female</label><br>
	<lable>MovieWatched:</label>
		<input type="checkbox" name='movies[]'  value="BB">BB</input><br>
		<input type="checkbox" name='movies[]'  value="RRR" style="margin-left:105px;">RRR</input><br>
		<input type="checkbox"  name='movies[]'  value="KGF" style="margin-left:105px;">KGF</input><br>



<label>Country</label>
<select name="country"  style="margin-left:20px;">
<option>Select a country</option>

<?php


$sql = "SELECT * FROM country";

$result = $con->query($sql);


if($result->num_rows>0){
	
	
	while($rows=$result->fetch_assoc()){
		echo '<option value="'.$rows["country_id"].'">'.$rows["country_name"].'</option>';
		}

}	





?>

</select><br>



<lable>State</label>
<select name="state" id="state" style="margin-left:36px;">
<option>Select a state</option>


</select><br>


<lable>City</label>
<select name="city" id="city" style="margin-left:42px;">
<option>Select a city</option>





</select><br>





	<input type="submit" id='submit' style="background-color:#00cc00
;" ></input><br>
	<form>


<script>
$(document).ready(function(){

$("select[name='country']").change(function(){
	var country = $(this).val();
	console.log(country);



//if select a valid country


	if(country){


	$.ajax({
		url:"sendstate.php",
		type:"post",
		data:{country},
		success:function(data){
		    $('#state').html(data);
                    

                	}
			});
	
}




});

$("select[name='state']").change(function(){
	var state = $(this).val();
	console.log(state);



//if select a state country


	if(state){


	$.ajax({
		url:"sendcity.php",
		type:"post",
		data:{state},
		success:function(data1){
		    $('#city').html(data1);
                    

                	}
			});
	
}

});


});





</script>







</div>
<div style = "margin-top:20px;width:250px;height:100px;margin-left:300px;text-align:center;color:#eeeee4;">
<?php 

echo $name.'<br>';
echo $pass.'<br>';
echo $emp .'<br>';
echo $web.'<br>';
echo $gen .'<br>';
echo $mov1.'<br>';
echo $mov2.'<br>';
echo $mov3.'<br>';

?>
  </div>
  </body>
</html>

