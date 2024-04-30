<!DOCTYPE html>

<?php
session_start();
?>

<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <div style="text-align: center;">
        <p>Thank you, <?php echo $_SESSION['username']; ?>, your order is confirmed!</p>
    </div>
</body>
</html>
