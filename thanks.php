<!DOCTYPE html>

<?php
session_start();
?>

<style>

	.myText
	{
		font-family:Georgia;
		font-size:50px;
		text-decoration:none;
		font-style: italic;
		font-weight:bold;
		color:blue;
	}

</style>

<html>
<head>
    <title>Order Confirmation</title>
</head>
<body bgcolor="EECB1F" >
    <div style="text-align: center;">
        <p class="myText">Thank you, <?php echo $_SESSION['username']; ?>, your order is confirmed!</p>
    </div>
</body>
</html>
