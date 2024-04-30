<!DOCTYPE html>
<?php
include ("connect.php");
session_start();

if (isset($_POST['confirm_order'])) {
	$stmt = $connect->prepare("INSERT INTO orders_tab (username, total) VALUES (?, ?)");
    $stmt->bind_param("ss", $_SESSION['username'], $_SESSION['total']);
	
	 if ($stmt->execute()) {
        $_SESSION['total'] = 0;
		header("Location: thanks.php");
    } else {
        echo "Error: " . $connect->error;
    }

    $stmt->close();
    $connect->close();
}

if (isset($_POST['empty_cart'])) {
    $_SESSION['total'] = 0;
    header("Location: Home.php");
}
?>

<style>

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

</style>

<html>
<head>
    <title>Checkout</title>
</head>
<body bgcolor="EECB1F" >
    <div id="confirmation" style="text-align: center;">
        <p class="myText"><?php echo "{$_SESSION['username']}, do you want to confirm your order? The total is $ {$_SESSION['total']}"; ?></p>
        <form method="post">
            <button name="empty_cart">Empty Cart and Return</button>
            <button name="confirm_order">Confirm Order</button>
        </form>
		<br><br>
		<img src="PizzaLogo.jpg" width="400" height="400">
    </div>
</body>
</html>
