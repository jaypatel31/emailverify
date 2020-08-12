<?php
	session_start();
	$value=(isset($_POST['submit']))?$_POST['submit']:"";
		if($value=="SUBMIT"){
	$err ="";
	$inv = "";
	$UserName="";
	$match="";
	$sucess="";
	//$val=true;
	global $code;
		
			$UserName = $_POST['Un'];
			$Password = $_POST['pwd'];
			$pmatch = $_POST['pwd2'];
			$nm =  "ID/".$UserName."(".$Password.").txt";
			$pttn = "/\w+\W+\d+/i";
			$check2 = preg_match_all($pttn,$Password);
			$check4 = strlen($Password);
			if($check2==1 && $check4 >= 6){
				if($pmatch==$Password){
					$_SESSION['code']= rand(10000,99999);
					$mailcont = $_SESSION['code'];
					mail($UserName,"VERIFICATION MAIL",$mailcont);
					//$false=false;
				}
				else{
					$_SESSION['match'] = "Password Doesn't Match";
					header('Location: index.php');
				}
			}
			else{
				$_SESSION['inv'] = "Please Write Password In This((a-z)(@#$%)(0-9)) Given Format Only!!";
				($check4>=6)?:$_SESSION['inv']="Password must container 6 or more charcter!!";
				//echo $_SESSION['inv'];
				//exit;
				header('Location: index.php');
			}
			//echo $code;
		}
?>
<?php
	if(isset($_POST['verification'])){
			//echo $code;
		if(is_numeric($_POST['code'])){
			if($_POST['code']==$_SESSION['code']){
				header('Location: success.php');
			}
			else{
				$_SESSION['error'] = "INVALID CODE";
				header('Location: verification.php');
				return;
			}
		}
		else{
			$_SESSION['error'] ="PLEASE INPUT VALID NUMBER";
			header('Location: verification.php');
			return;
		}
	}
	//echo $_POST['code'];
?>
<?php
	echo $_SESSION['code'];
?>
<html>
<head>
	<title>Verification Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
				<form action="verification.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome To the Verification 
					</span>
					<?php 
	if(isset($_SESSION['error'])){
		echo "<p style='color:red;margin-bottom:20px;'>".$_SESSION['error']."</p>";
		$_SESSION['error'] ="";
	}
?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="code">
						<span class="focus-input100" data-placeholder="Verification Code"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="verification" value="Verify" class="login100-form-btn">
								Verify
							</button>
						</div>
					</div>

					<div class="text-center p-t-20">
						<span class="txt1">
							Change The Email address
						</span>
						<a class="txt2" href="index.php">
							Go Back
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>