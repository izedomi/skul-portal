<?php ob_start(); ?>

<?php

session_start();
$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");



?>

<!-- add content-news : starts -->
<?php if(isset($_POST['news'])): ?>
	<?php
	$news_title = $_POST['news-title'];
	$news_content = $_POST['news-content']; 
	
	$news_content = mysqli_real_escape_string($link, $news_content);
	
	$sql_news = "INSERT INTO news SET title = '$news_title', content = '$news_content', date=CURDATE() ";
	$query_news = mysqli_query($link, $sql_news);

	if(!$query_news){header("Location: index.php?error=1");}

	header("Location: index.php?news=1");	
	exit();	
	?>
<?php endif; ?><!-- add content-news : ends -->


<!-- add content-category : starts -->
<?php if(isset($_POST['category'])): ?>
	<?php
	$pay_category = $_POST['p-category']; 
	
	$sql_cat = "INSERT INTO payment_category SET category = '$pay_category'";
	$query_cat = mysqli_query($link, $sql_cat);

	if(!$query_cat){header("Location: index.php?error=1");}

	header("Location: index.php?cat=1");
	exit();	
	?>
<?php endif; ?><!-- add content-category : ends -->

<!-- add content-purpose : starts -->
<?php if(isset($_POST['purpose'])): ?>
	<?php
	$pay_purpose = $_POST['p-purpose'];
	$amount = $_POST['p-amount'];
	
	$table_name = strtolower($pay_purpose);
	$table_name = str_replace(" ", "_", $table_name);
	
	$sql_purpose = "INSERT INTO payment_purpose SET purpose = '$pay_purpose', amount = $amount";
	$query_purpose = mysqli_query($link, $sql_purpose);

	if(!$query_purpose){header("Location: index.php?error=1");}


	 $sql_create = "CREATE TABLE $table_name (
	 id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
	 name VARCHAR(150) NOT NULL , 
	 class VARCHAR(30) NOT NULL , 
	 wing VARCHAR(15) NOT NULL , 
	 term VARCHAR(30) NOT NULL , 
	 unique_id VARCHAR(10) NOT NULL ,
	 date VARCHAR(15) NOT NULL
	)";

	$query_create = mysqli_query($link, $sql_create);

	if(!$query_create){header("Location: index.php?error=1");}


	header("Location: index.php?purpose=1");
	exit();	
	?>
<?php endif; ?> <!-- add content-purpose : ends -->



<?php ob_flush(); ?>
	