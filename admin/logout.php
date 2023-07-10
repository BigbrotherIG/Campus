<?php
session_start();
include_once('../includes/dbconnect.php');
$id = $_SESSION['account_id'];
$queryUpdate = $conn->query("INSERT INTO `admin_log` (`admin_id`, `activities`, `activity_time`)
VALUES ('$id', 'logout', current_timestamp())");
 
session_destroy();
echo "<script>window.location.href='login.php'</script>"
?>