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
        $sql = "SELECT page_id, pageName FROM pages ORDER BY page_id";
        $cmd = $conn->prepare($sql);
        // run the query and store the results
        $cmd->bindParam(':page_id', $page_id, PDO::PARAM_INT);
        $cmd->bindParam(':pageName', $pageName, PDO::PARAM_STR, 50);
        $cmd->execute();
        $pages = $cmd->fetchAll();
        // disconnect
       
        
        $conn = null;
        
		if (!empty($_SESSION['user_id'])) {
			// private nav links
			echo '<li><a href="addpage.php" title="Add">Add Page</a></li>
				 <li><a href="userlistings.php" title="List">User Listings</a></li>
				 <li><a href="logout.php" title="Logout">Logout</a></li>
                 <li><a href="main.php" title="Public Site">Public Site</a></li>';
             foreach($pages as $page){
             while($page =  mysql_fetch_array($pages)){
                    echo '<li><a href="main.php?page_id='.$page['page_id'].'">'.$page['pageName'].'</a></li>'; 
            }}
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
