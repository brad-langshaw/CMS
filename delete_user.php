<?php ob_start();
try {
    // identity the record the user wants to delete
    $user_id = null;
    $user_id = $_GET['user_id'];
    if (is_numeric($user_id)) {
        // connect
        require('db.php');
        // prepare and execute the SQL DELETE command
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $cmd->execute();
        // disconnect
        $conn = null;
        // redirect back to the updated beers.php
        header('location:userlistings.php');
    }
}
catch (Exception $e) {
    header('location:error.php');
}
ob_flush(); ?>