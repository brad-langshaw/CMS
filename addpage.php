<?php
$page_title = 'Add Pages';
require_once('header.php'); 


// initialize an empty id variable
$user_id = null;
$username = null;
//check if we have an beer ID in the querystring
if ((!empty($_GET['page_id'])) && (is_numeric($_GET['page_id']))) {
    //if we do, store in a variable
    $user_id = $_GET['page_id'];
    //connect
    require('db.php');
    //select all the data for the selected beer
    $sql = "SELECT * FROM pages WHERE page_id = :page_id";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);
    $cmd->execute();
    $pages = $cmd->fetchAll();
    //disconnect
    $conn = null;
    //store each value from the database into a variable
    foreach ($pages as $page) {
        $pageName = $pageName['pageName'];

       
    }
}
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
            <h1>Create Page</h1>
            <form method="post" action="save-page.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pageName" class="col-sm-2">Page Title:</label>
                    <input name="pageName" placeholder=".html" value="<?php echo $pageName; ?>"   />
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2">Content:</label>
                    <textarea rows="6" cols="75" name="content" placeholder="Content paragraphs go here..." value="<?php echo $content; ?>"></textarea>
                </div>
                <fieldset class="form-group">
                    <label for="images" class="col-sm-2">Image:</label>
                    <input type="file" name="pageImage" id="pageimage" />
                </fieldset>

    <?php if (!empty($pages)) {
    echo '<div class="col-sm-offset-2">
            <img title="pageImage" src="images/' . $pageImage . '" class="img-circle" />
        </div>';
    }
    ?>
                <div class="col-sm-offset-2">
                    <input type="submit" value="Save Page" class="btn btn-primary" />
                </div>
            </form>
            </div> 
            </div> 
            </div> 
            </div> 
<?php require_once('footer.php'); ?>