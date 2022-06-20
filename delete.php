<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    exit;
}
require_once './db_connection.php';
$id = trim(mysqli_real_escape_string($conn, $_GET['id']));
$delete_user = mysqli_query($conn, "DELETE FROM `sign_up` WHERE id='$id'");
exit;