<?php

$page_title = 'LogIn';

require_once('header.php'); ?>
    
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
            <h1>Log In</h1>
                <form method="post" action="validate.php" class="form-horizontal">
                <div class="form-group">
                    <label for="username" class="col-sm-2">Username:</label>
                    <input name="username" />
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2">Password:</label>
                    <input type="password" name="password" />
                </div>
                <div class="col-sm-offset-2">
                    <input type="submit" value="Login" class="btn btn-primary" />
                </div>
            </form>
            </div>
        </div>
        </div>
         </div>


<?php require_once('footer.php'); ?>