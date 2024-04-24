<?php 
session_start();
include ("connect.php"); 

// Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
	// Get username and password from form
	$username = $_POST['Luserid'];
	$password = $_POST['Lpwd'];

	// Prepare SQL statement to retrieve user details
	$stmt = $connect->prepare("SELECT username FROM users_tab WHERE username=? AND password=?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->bind_result($username);

	// If user exists and password is correct, redirect to appropriate page
	if ($stmt->fetch()) {
		$_SESSION['username'] = $username;
		header("Location: Home.php");
	} else {
		echo "Invalid username or password";
	}

	// Close statement and connection
	$stmt->close();
	$connect->close();
}

// Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['Suserid'];
    $password = $_POST['Spwd'];

    // Prepare SQL statement to insert new user
    $stmt = $connect->prepare("INSERT INTO users_tab (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // If insertion is successful, set session and redirect to Home.php
        $_SESSION['username'] = $username;
        header("Location: Home.php");
    } else {
        echo "Error: " . $connect->error;
    }

    // Close statement and connection
    $stmt->close();
    $connect->close();
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title> My Login & Signup Forms </title>
<style>

	table {
		border: none;
		margin-left: 20px;
		margin-right: 30px;
		box-shadow: 5px 5px 30px #454545;
		bgcolor:#c5c5c5;
	}

	button {
		
		padding: 20px 40px;
		background-color:#a5a5a5;
		color: blue;
		font-size: 24px;
		font-weight: bold;
		border: none;
		border-radius: 5px;
	}
	
	button:hover {
		background-color: white;
	}

	.myText
	{
		font-family:Georgia;
		font-size:50px;
		text-decoration:none;
		font-style: italic;
		font-weight:bold;
		color:blue;
	}
	.login-div{
		font-family:Arial;
		font-size:18px;
		font-weight:bold;
		margin: 20px;
		position:absolute;
		left:550px; 
		top:330px;  

	}
	.sign-div{
		font-family:Arial;
		font-size:18px;
		font-weight:bold;
		margin: 20px;
		position:absolute;
		left:550px; 
		top:330px;  

	}

</style>

<script>
function mylogin()
{
	
	document.getElementById("loginForm").style.display="block";
	document.getElementById("signupForm").style.display="none";
	
}
function mysignup()
{
	document.getElementById("loginForm").style.display="none";
	document.getElementById("signupForm").style.display="block";

}

</script>

</head>
<body bgcolor="EECB1F" >

	<center>
		<p class="myText"> <img src="PizzaLogo.jpg" width="120" height="120"> &nbsp;&nbsp;&nbsp;Login or Signup Before Ordering&nbsp;&nbsp;&nbsp; <img src="PizzaLogo.jpg" width="120" height="120"></p>
		<button onclick="mylogin()"> Login Form </button></div>
		<button onclick="mysignup()"> Signup Form </button></div>
	</center>

	<div id="loginForm" class="login-div" style="display:none"> 
		<h1> Login <h1>
		<form id="loginForm" method="post">
			<table border=2 width=50%>
				<tr><td align="right"> Username: </td><td> <input type="text" name="Luserid" id="Luserid"/></td></tr>
				<tr><td align="right"> Password: </td><td> <input type="password" name="Lpwd" id="Lpwd"/></td></tr>
				<tr><td colspan=2 align="center"> <button name="login"> Login </button></td></tr>
			</table>
		</form>
	</div>
	
	<div id="signupForm" class="sign-div" style="display:none"> 
		<h1> Signup <h1>
		<form id="signupForm" method="post">
			<table border=2 width=50%>
				<tr><td align="right"> Username: </td><td> <input type="text" name="Suserid" id="Suserid"/></td></tr>
				<tr><td align="right"> Password: </td><td> <input type="password" name="Spwd" id="Spwd"/></td></tr>
				<tr><td colspan=2 align="center"> <button name="signup"> Signup </button></td></tr>
			</table>
		</form>
	</div>

</body>
</html>