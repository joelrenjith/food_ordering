<?php
    ob_start(); // Turn on output buffering
    session_start();
    require 'connection.php';
    $conn = Connect();

    if(isset($_GET['F_ID'])) {
        if(empty($_GET['F_ID'])) {
            echo "The 'id' parameter is set but empty.";
        } else {
            $food_id = $_GET['F_ID'];
            $sql = "delete FROM orders WHERE F_ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $food_id); // 's' represents a string, adjust if the username is of a different type
            $stmt->execute();
            header("Location: orderlist.php");
            exit(); // Ensure no further output is sent
        }
    } else {
        echo "The 'id' parameter is not set in the URL.";
    }
    ob_end_flush(); // Send the buffered output
?>
