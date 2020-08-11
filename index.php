<?php
session_start();
?>
<html>
<head>
	<title>LOGIN</title>
	<style>
		h2{
			color:red;
		}
		span{
			color:orange;
		}
		.tr{
			color:green;
		}
	</style>
</head>
<!--SIGNUP Section PHP-->

<body>
	
	<form action="verification.php" method="post">
		<fieldset>
		<legend>SIGN UP</legend>
		<label for="un">Email : </label><br/>
		<input type="text" name="Un" id="un" required>
		<br/><br/>
		<label for="pwd">ENTER PASSWORD : </label><br/>
		<input type="password" name="pwd" id="pwd" required placeholder="(a-z)(@#$%)(0-9)">
		<br/><br/>
		<label for="pwd2">RE-ENTER PASSWORD : </label><br/>
		<input type="password" name="pwd2" id="pwd2" required >
		<span><br/><br/>
		<input type="submit" name="submit" value="SUBMIT"><br/><br/>
		<h2 class="tr"></h2>
		</fieldset>
	</form>
	<?php
		if(isset($_SESSION)){
			if(isset($_SESSION['match'])){
				echo "<p style='color:red'>".$_SESSION['match']."</p>";
				$_SESSION['match']="";
				}
			else if(isset($_SESSION['inv'])){
				echo "<p style='color:red'>".$_SESSION['inv']."</p>";
				$_SESSION['match']="";
			}
		}
	?>
</body>

</html>
