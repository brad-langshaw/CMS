<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php
        $page_id = $_POST['page_id'];
        echo $page_title; ?>
	</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-default">
	<a href="default.php" title="COMP1006 Assighment 2 Part 1" class="navbar-brand">
		<i class="fa fa-viacoin fa-2x"></i>COMP1006 Assignment 2 Part 2
	</a>
	
	<ul class="nav navbar-nav navbar-right">
<?php
    require('db.php');
        // prepare the query
        $sql = "SELECT * FROM pages ORDER BY pageName";
        $cmd = $conn->prepare($sql);
        // run the query and store the results
        $cmd->execute();
        $pages = $cmd->fetchAll();
        // disconnect
        $conn = null;
        
	session_start();	
		if (!empty($_SESSION['user_id'])) {
			// private nav links
			echo '<li><a href="addpage.php" title="Add">Add Page</a></li>
				 <li><a href="userlistings.php" title="List">User Listings</a></li>
				 <li><a href="logout.php" title="Logout">Logout</a></li>';
             while($row = mysql_fetch_array($page))
        {
         $page_id = $row['page'];
            echo '<a href="main.php?page_id='.strip_tags($page_id)'"></a>';
            }
		}
		else{
			//public links
			echo'<li><a href="register.php" title="Register">Register</a></li>
				 <li><a href="login.php" title="Log In">Log In</a></li>'; 
		}
		?>
	</ul>
</nav>

<main>