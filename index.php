<?php 
session_start();
require_once('page.php');

if (!isset($_SESSION['db_user'])) {
	echo "<script> window.location = 'dbInfo.php'; </script>";
} else if (!isset($_SESSION['email'])) {
    $currentPage = 'login.php';
} else if (isset($_GET['page'])) {
	switch ($_GET['page']) {
	case 'register': $currentPage = 'register.php'; break;
        case 'test': $currentPage = 'test.php'; break;
        case 'logout': $currentPage = 'logout.php'; break;
        case 'review': $currentPage = 'review.php'; break;
        case 'search': $currentPage = 'search.php'; break;
        case 'viewAd': $currentPage = 'viewAd.php'; break;
        case 'my': $currentPage = 'my.php'; break;
        case 'user': $currentPage = 'user.php'; break;
        case 'viewUser': $currentPage = 'viewUser.php'; break;
        case 'createReview': $currentPage = 'createReview.php'; break;
        case 'post': $currentPage = 'post.php'; break;
	default: $currentPage = 'user.php'; break;
	}
} else {
	$currentPage = 'user.php';
}
$page = new Page($_SESSION['db_url'], $_SESSION['db_user'], $_SESSION['db_pass']);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ujiji</title>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
    <style>
      body   {
        padding-top  : 60px  ; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	</head>
	<body>
        <div class="container">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <a class="brand" href="index.php">Ujiji</a>
                    <ul class="nav">
                        <li><a href="index.php?page=post">Post Ad</a></li>
                        <li><a href="index.php?page=my">My Ads</a></li>
                        <li><a href="index.php?page=search">Search</a></li>
                    </ul>
                    <ul class="pull-right" style="list-style: none; padding-right:5px;">
                      <li><a class='btn btn-danger' href='?page=logout'>Logout</a></li>
                    </ul>
                </div>
            </div>
            <?php
                include('views/' . $currentPage );
            ?>
        </div>
	</body>
</html>

<?php



?>
