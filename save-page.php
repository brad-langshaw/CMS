<?php
$page_title = 'Saving your Page...';
require_once ('header.php');
// store the inputs into variables
$pageName = $_POST['pageName'];
$content = $_POST['content'];
$filename = $_FILES['pageImage']['name'];
$filesize = $_FILES['pageImage']['size'];
$filetype = $_FILES['pageImage']['type'];
$tmp_name = $_FILES['pageImage']['tmp_name'];
// use the session id to create unique name
session_start();
$final_name = session_id() . "-" . $filename;
// move from cache to the lesson10/uploads folder
move_uploaded_file($tmp_name, "uploads/$final_name");
$ok = true;
// validation
if (empty($pageName)) {
    echo 'Page Name is required<br />';
    $ok = false;
}
if (empty($content)) {
    echo 'Content is required<br />';
    $ok = false;
}
    

if ($ok) {
    // connect
    require_once ('db.php');
    // set up the sql insert
    $sql = "INSERT INTO pages (pageName, content) VALUES (:pageName, :content)";
    // fill the params and execute
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 1000);
    $cmd->execute();
    // disconnect
    $conn = null;
    echo 'Your page was created successfully.  Click <a href="main.php">Here</a>';
}


require_once ('footer.php');
?>