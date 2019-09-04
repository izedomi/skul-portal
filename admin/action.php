<?php
ob_start();


$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");

//delete purpose
if(isset($_GET['del_purpose'])):
	$delete_id = $_GET['del_purpose'];
	$table_name = $_GET['table_name'];

	$table_name = strtolower($table_name);
	$table_name = str_replace(" ", "_", $table_name);

	$sql = "DELETE FROM payment_purpose WHERE id = $delete_id;";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: p_purpose.php?del_failure='false'");}

	$sql_drop = "DROP TABLE $table_name";
	$query_drop = mysqli_query($link, $sql_drop);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: p_purpose.php?del_failure='false'");}

	header("Location: p_purpose.php?del_success=1 ");
	exit();
endif;

//edit purpose
if(isset($_POST['edit_purpose'])):
	$edit_id = $_POST['id'];
	$purpose = $_POST['p-purpose'];
	$amount = $_POST['p-amount'];

	$sql = " UPDATE payment_purpose SET purpose = '$purpose', amount = $amount WHERE id = $edit_id";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: p_purpose.php?edit_failure='false'");}

	header("Location: p_purpose.php?edit_success=1");
	exit();
endif;

//delete category
if(isset($_GET['del_category'])):
	$delete_id = $_GET['del_category'];

	$sql = "DELETE FROM payment_category WHERE id = $delete_id;";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: p_category.php?del_failure='false'");}

	header("Location: p_category.php?del_success=1 ");
	exit();
endif;

//edit category
if(isset($_POST['edit_category'])):
	$edit_id = $_POST['id'];
	$category = $_POST['p-category'];
	

	$sql = " UPDATE payment_category SET category = '$category' WHERE id = $edit_id";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: p_category.php?edit_failure='false'");}

	header("Location: p_category.php?edit_success=1");
	exit();
endif;


//delete news
if(isset($_GET['del_news'])):
	$delete_id = $_GET['del_news'];

	$sql = "DELETE FROM news WHERE id = $delete_id;";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: news.php?del_failure='false'");}

	header("Location: news.php?del_success=1 ");
	exit();
endif;

//edit news
if(isset($_POST['edit_news'])):
	$edit_id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	$sql = " UPDATE news SET title = '$title', content = '$content' WHERE id = $edit_id";
	$query = mysqli_query($link, $sql);
	if(!$query){die("operation failed" . mysqli_error($link));}

	$count = mysqli_affected_rows($link);
	if($count != 1){header("Location: news.php?edit_failure='false'");}

	header("Location: news.php?edit_success=1");
	exit();
endif;



ob_flush();
?>