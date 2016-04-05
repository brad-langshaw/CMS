<?php ob_start();

$page_title = "test";



require_once('header.php');

    $page_id = $GET['page']; ?>


<h1>Main</h1>

<?php
try {
    // connect
    require('db.php');
    // prepare the query
    $sql = "SELECT * FROM pages ORDER BY pageName";
    $cmd = $conn->prepare($sql);
    // run the query and store the results
    $cmd->execute();
    $pages = $cmd->fetchAll();
    // disconnect
    $conn = null;
    // start the grid with HTML
    echo '<table class="table table-striped"><thead><th>ID#</th><th>Page name</th><th>Content</th><th>Edit</th><th>Delete</th></thead><tbody>';
    /* loop through the data, displaying each value in a new column
    and each beer in a new row */
    

    foreach ($pages as $page) {
        echo '<tr><td>' . $page['page_id'] . '</td>
            <td>' . $page['pageName'] . '</td>
            <td>' . $page['content'] . '</td>
            <td><a href="addpage.php?page_id=' . $page['page_id'] . '" title="Edit">Edit</a></td>
            <td><a href="delete_page.php?page_id=' . $page['page_id'] . '"
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