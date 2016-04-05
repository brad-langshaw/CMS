<?php ob_start();

$page_title = 'User Listings';


require_once('header.php'); ?>


<h1>User Listings</h1>

<?php
try {
    // connect
    require('db.php');
    // prepare the query
    $sql = "SELECT * FROM users ORDER BY username";
    $cmd = $conn->prepare($sql);
    // run the query and store the results
    $cmd->execute();
    $users = $cmd->fetchAll();
    // disconnect
    $conn = null;
    // start the grid with HTML
    echo '<table class="table table-striped"><thead><th>ID#</th><th>Username</th><th>Edit</th><th>Delete</th></thead><tbody>';
    /* loop through the data, displaying each value in a new column
    and each beer in a new row */
    foreach ($users as $user) {
        echo '<tr><td>' . $user['user_id'] . '</td>
            <td>' . $user['username'] . '</td>
            <td><a href="register.php?user_id=' . $user['user_id'] . '" title="Edit">Edit</a></td>
            <td><a href="delete_user.php?user_id=' . $user['user_id'] . '"
                title="Delete" class="confirmation">Delete</a></td>
            </tr>';
    }
    // close the HTML grid
    echo '</tbody></table>';
}
catch (Exception $e) {
    // send ourselves the error
    mail('bradcorp@hotmail.com', 'User page Error', $e);
    // redirect to the error page
    header('location:error.php');
}
// footer
require('footer.php');
ob_flush();
?>