<?php

$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");


$sql_pur = "SELECT * FROM payment_purpose";
$query_pur = mysqli_query($link, $sql_pur);


?>
<!DOCTYPE html>
<html lang="en">

<head>
     
     <title>index title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/assets/styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/assets/styles/css/main.css">

    <!-- ckeditor -->
    <script src="../public/assets/js/ckeditor.js"></script>

</head>

<body>

  <!-- pre-header :starts-->
    <div id="pre-header" class="fixed-top py-3 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
			
			<span class="text-danger display-5 d-none d-md-inline ml-auto"> mySchool.com </span>
			<div class="text-danger text-center display-5 d-sm-block d-md-none"> mySchool.com </div>

            <span class="float-md-right d-none d-md-inline">
                <span class="fa fa-user fa-fw"></span>  
                <span class="text-danger"> Welcome <?php echo $_SESSION['username']; ?> </span>|<span><a href="logout.php"> Logout</a> </span>  
             </span>       

              <div class="text-center d-sm-block d-md-none">
                <span class="fa fa-user fa-fw"></span>  
                <span class="text-danger"> Welcome <?php echo $_SESSION['username']; ?> </span>|<span><a href="logout.php"> Logout</a> </span>  
             </div>       
               
          </div>
        </div>
      </div>
    </div>
  <!-- pre-header: ends -->

  <!-- navbar : starts -->
    <div id="navbar-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<nav class="navbar navbar-expand-md navbar-light pt-5">
        			<!-- <a class="navbar-brand" href="#"><img class="img-fluid" src="assets/img/a3.jpg" alt="nav brand" /></a> -->
       
				        <button class="navbar-toggler mt-5 ml-auto" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
				          <span class="navbar-toggler-icon"></span>
				        </button>

				        <div class="collapse navbar-collapse py-4 justify-content-center" id="navBar">
							<ul class="navbar-nav mt-0 mt-lg-0">
								<li class="nav-item pl-md-5">
								  <a class="nav-link active" href="index.php"> Dashboard <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item pl-md-5">
								  <a class="nav-link" href="news.php"> News </a>
								</li>
								<li class="nav-item pl-md-5">
								  <a class="nav-link" href="p_category.php"> Payment Category</a>
								</li>
								<li class="nav-item pl-md-5">
								  <a class="nav-link" href="p_purpose.php"> Payment Purpose </a>
								</li>
							</ul>
							<div class="dropdown pl-md-5">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Add Content
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" data-toggle="modal" data-target="#news">News</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#payment-category">Payment Category</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#payment-purpose">Payment Purpose</a>
                </div>
							</div>
				        </div>
				        
				    </nav>    
    				
    			</div>
    		</div>
    	</div>
    </div>
  <!-- navbar: end -->

    <!-- search bar: starts -->

		<div class="bg-primary py-3 mb-3">
		  <div class="container">
		  	<div class="row justify-content-center">
		  		<div class="col-md-6">			
					<form method="post" action="list.php">
					  <div class="form-row align-items-center">
					    <div class="col-md-6 text-center">
					      <label class="sr-only" for="inlineFormInput">Name</label>
					      <input type="text" name="id" class="form-control mb-2 mb-sm-0" placeholder="Enter Payment Receipt" required />
					    </div>
				
					    <div class="col-md-6 text-center">
					      <button type="submit"  name="submit" class="btn btn-success">Get Payment Details...</button>
					    </div>
					  </div>
					</form>
		  		</div>
		  	</div>
		  </div>
		</div>
   <!-- search bar: ends -->


    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-12">	
				<?php if(
				(isset($_GET['news'])) || 
				(isset($_GET['cat'])) || 
				(isset($_GET['purpose'])) || 
				(isset($_GET['del_success'])) || 
				(isset($_GET['edit_success'])) ||
				(isset($result))
				) : ?>  
					<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    			<span aria-hidden="true">&times;</span>
			  			</button>
			  			<strong> <?php echo $msg; ?></strong>
			  			<strong> <?php echo $actionn; ?></strong>
					</div>
				<?php endif; ?>
    		</div>
    	</div>
    </div>



   <!-- content : starts -->
    <div id="content">
   		<div class="container">
   			<div class="row">
   				<!-- side content -->
   				<div class="col-md-4 py-5">
   					<form method="post" action="list.php">
   						<fieldset class="mb-3 py-3 bg-primary border border-secondary rounded">
   							<p class="text-center text-white">Get Payment List </p>
   							<br/>
   							<p class="form-text text-warning text-center">*all fields must be selected</p>
   							<!-- class -->
   							<div class="form-group">
	                          <select name="class" class="form-control" id="class">
	                            <option value=""> select class(PRY) </option>
	                            <option> Primary 1 </option>
	                            <option> Primary 2 </option>
	                            <option> Primary 3 </option>
	                            <option> Primary 4 </option>
	                            <option> Primary 5 </option>
	                            <option> primary 6 </option>
	                            <option> JSS 1 </option>
	                            <option> JSS 2 </option>
	                            <option> JSS 3 </option>
	                            <option> SSS 1 </option>
	                            <option> SSS 2 </option>
	                            <option> SSS 3 </option>
	                          </select>
                        	</div>
							
							<!-- wing -->
                        	<div class="form-group">
	                          <select name="wing" class="form-control" id="wing">
	                            <option value=" "> select wing </option>
	                            <option> GOLD </option>
	                            <option>  SILVER </option>
	                            <option> BRONZE </option>                           
	                          </select>
	                        </div>

	                        <!-- term -->
                        	<div class="form-group">
	                          <select name="term" class="form-control" id="wing">
	                            <option value=" "> select term </option>
	                            <option> FIRST TERM </option>
	                            <option> SECOND TERM </option>
	                            <option> THIRD TERM </option>                           
	                          </select>
	                        </div>
               

							<!-- payment purpose -->
	                        <div class="form-group">
	                          <select name="purpose" class="form-control" id="class">
	                            <option value=""> payment purpose</option>
	                            <?php while($result = mysqli_fetch_array($query_pur)): ?>
	                            <option> <?php echo $result['purpose']; ?> </option>
	                            <?php endwhile; ?>
	                          </select>
                        	</div>

                        	<button type="submit" name="payment-list" class="btn btn-block btn-outline-secondary"> Submit </button>
   						</fieldset>
   					</form>

   					