<html>
<body>

welcome php echo <?php $_POST["username"] ;?> <br>

Your password is  : <?php echo $_POST["password"] ;?><br>

your fav website is : <?php echo $_POST['website']; ?><br>


your employees id is : <?php echo $_POST['employ'];?><br>

you gender is :<?php echo $_POST['gender'];?><br>

your fav movies are:<br>
<?php 
$arr = ($_POST['movies']);
for($i=0;$i<(count($arr));$i++){
	echo $arr[$i].'<br>';
}
	

?>

</body>
</html>

