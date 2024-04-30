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

<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <div id="confirmation" style="text-align: center;">
        <p><?php echo "{$_SESSION['username']}, do you want to confirm your order? The total is $ {$_SESSION['total']}"; ?></p>
        <form method="post">
            <button type="submit" name="empty_cart">Empty Cart and Return</button>
            <button type="submit" name="confirm_order">Confirm Order</button>
        </form>
    </div>
</body>
</html>
