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
				$_SESSION['inv'] = "Please Write Password In The Given Format Only!!";
				($check4>=6)?:$_SESSION['inv']="Password must container 6 or more charcter!!";
				echo $_SESSION['inv'];
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
	<title>VERIFICATION</title>
</head>
<body>
<?php 
	if(isset($_SESSION['error'])){
		echo "<p style='color:red'>".$_SESSION['error']."</p>";
		$_SESSION['error'] ="";
	}
?>
	<form method="post">
		Please Enter The Verification Code Sent to Your Mail Address : 
		<br/><br/><input type="text" name="code">
		<br/><br/>
		<input type="submit" name="verification" value="Verify">
		<a href="index.php">Go BACK</a>
	</form>
</body>
</html>