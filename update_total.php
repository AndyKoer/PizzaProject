<?php
session_start();
if (isset($_POST['total'])) {
    $_SESSION['total'] += intval($_POST['total']);
    echo "Total updated successfully";
} else {
    echo "No total provided";
}
?>
