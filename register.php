<?php
$page_title = 'Register';
require_once('header.php'); 


// initialize an empty id variable
$user_id = null;
$username = null;
//check if we have an beer ID in the querystring
if ((!empty($_GET['user_id'])) && (is_numeric($_GET['user_id']))) {
    //if we do, store in a variable
    $user_id = $_GET['user_id'];
    //connect
    require('db.php');
    //select all the data for the selected beer
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $cmd->execute();
    $users = $cmd->fetchAll();
    //disconnect
    $conn = null;
    //store each value from the database into a variable
    foreach ($users as $user) {
        $username = $user['username'];

       
    }
}
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
            <h1>User Registration</h1>
            <form method="post" action="save-registration.php" class="form-horizontal">
                <div class="form-group">
                    <label for="username" class="col-sm-2">Username:</label>
                    <input name="username" placeholder="Email Adress" value="<?php echo $username; ?>"   />
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2">Password:</label>
                    <input type="password" name="password" />
                </div>
                <div class="form-group">
                    <label for="confirm" class="col-sm-2">Confirm Password:</label>
                    <input type="password" name="confirm" />
                </div>
                <div class="col-sm-offset-2">
                    <input type="submit" value="Register" class="btn btn-primary" />
                </div>
            </form>
            </div> 
            </div> 
            </div> 
            </div> 
<?php require_once('footer.php'); ?>