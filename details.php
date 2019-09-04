<?php


$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");

 //retrieving payment details
  if(isset($_POST['submit'])):

      if(isset($_GET['id'])){$unique_id = $_GET['id'];}
      if(isset($_POST['submit'])){$unique_id = $_POST['id'];}

      if(preg_match("/P\w/", $unique_id)){ $table_name = "p_payment_details";}
      else{ $table_name = "s_payment_details";}

      $time = strftime("%m-%d-%y", time());

      $sql = "SELECT * FROM $table_name WHERE unique_id = '$unique_id' ";
      $query = mysqli_query($link, $sql);
      if(!$query):
        die("database query failed" . mysqli_error($link));
      endif;

      $result = mysqli_fetch_array($query);

      $result['payment'] = str_replace("-", "<br/>", $result['payment']);
    
  endif;




?>


<!DOCTYPE html>
<html lang="en">

<head>
     
     <title>CONFIRM DETAILS - SKUL PORTAL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

public/public/
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/assets/styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/styles/css/main.css">

   
</head>

<body>

  <!-- pre-header :starts-->
    <div id="pre-header" class="fixed-top">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-12">

            <!-- contact -->
            <span class="fa fa-envelope fa-fw"></span><small><i class="text-muted">info@gmail.com</i></small>
            <span class="fa fa-phone fa-fw"></span><small><i class="mr-3 text-muted">08063498356</i></small>

            <!-- social -->
            <span class="pl-5 float-md-right d-sm-block">
                <a href="#"><span class="fa fa-facebook fa-fw"></span></a>
                <a href="#"><span class="fa fa-twitter fa-fw"></span></a>
                <a href="#"><span class="fa fa-instagram fa-fw"></span></a>
            </span>
          </div>
        </div>
      </div>
    </div>
  <!-- pre-header: ends -->

  <!-- navbar : starts -->
    <div id="navbar-section">
      <nav class="navbar navbar-expand-md navbar-light">
        <!-- <a class="navbar-brand" href="#"><img class="img-fluid" src="assets/img/a3.jpg" alt="nav brand" /></a> -->
        <a class="navbar-brand" href="#"skulportal.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navBar">
          <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
            <li class="nav-item pr-3">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="#">Contact us</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="#">Events</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="#">Facilities</a>
            </li>
            <li class="nav-item pr-3">
              <a class="nav-link" href="#">Gallery</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  <!-- navbar: endd -->


<div class="container my-3 justify-content-center"><!-- container starts -->

	<div class="row justify-content-center mb-3">
		<div class="col-md-6 text-center">			
			<a  class="btn btn-outline-secondary" href="download?unique_id=<?php echo $unique_id; ?>&table=<?php echo $table_name; ?>"> CLICK TO DOWNLOAD PDF </a>
		</div>
	</div>

	<div class="row justify-content-center"><!-- container row ends -->
		<div class="col-md-6 bg-light text-center"><!-- container col-md-10 starts -->



			<div class="row mb-3">
				<div class="col-12">
					<p> <strong><h4>PAYMENT RECIEPT</h4></strong></p>
				</div>
			</div>
			
			<div class="row mb-5 d-md-block d-none">
				<div class="col-md-12">
					<span class="mr-5 pr-5"> RECIEPT NO :  <strong><?php echo $unique_id; ?></strong></span>

					<span class=""> DATE :  <strong><?php echo $time; ?></strong></span>
				</div>		
			</div>

			<div class="row mb-3 d-sm-block d-md-none">
				<div class="col-md-12">
					<p> RECIEPT NO :  <strong><?php echo $unique_id; ?></strong></p> <br/>
					<p> DATE :  <strong><?php echo $time; ?></strong></p>
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="col-12">
					<p>FULL NAME :  <strong><?php echo strtoupper($result['fullname']); ?></strong></p>
				</div>				
			</div>

			
			<div class="row mb-3">
				<div class="col-md-12">
					
						<p> CLASS : <strong> <?php echo strtoupper($result['class'] . " (" . $result['wing'] . ")"); ?></strong></p>
					
				</div>
								
			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<p> TERM : <strong> <?php echo strtoupper($result['term']); ?> </strong></p>
				</div>				
			</div>

			
			<div class="row mb-3">
				<div class="col-md-12">
					<p>GUARDIAN's NAME :  <strong><?php echo strtoupper($result['g_fullname']); ?></strong></p>
				</div>										
			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<p> GUARDIAN's NO : <strong> <?php echo strtoupper($result['g_phone']); ?> </strong></p>
				</div>			
			</div>


			<div class="row mb-3">
				<div class="col-12">
					<p>PAYMENT CATEGORY : <strong><?php echo strtoupper($result['category']); ?></strong></p>
				</div>				
			</div>


			<div class="row mb-3">	
				<div class="col-12">

					<p><strong> PURPOSE OF PAYMENT(AMOUNT) </strong><p>
					<p class="text-danger"><strong>
						<?php echo $result['payment']; ?>			
					</strong></p>
					 <p class="text-danger"><strong><?php echo "Total (#{$result['total']}) "; ?></strong></p> 

				</div>
			</div>

			<input type="text" class=" bg-danger text-white pl-3 mb-3" value="Payment Successful" readonly />
					

				
		</div><!-- container col-md-10 ends -->
	</div><!-- container row ends -->
</div><!-- container ends -->
 


  <!-- footer section : starts -->
      <div id="footer">
          <div class="container">
            <div class="row mb-3 py-4">

              <!-- contact info -->
              <div class="col-md-4 mb-3">
                <span><strong> Contact Us : </strong></span> <br/><br/>
                  <span class="fa fa-location-arrow mb-3 fa-fw"></span><em class="text-muted"> 12 suleman street, Auchi, Edo State.</em>
                  <br/><br/>
                   <span class="fa fa-phone fa-fw"></span><em class="text-muted">+2348063498356</em>
                  <br/><br/>
                   <span class="fa fa-envelope fa-fw"></span><em class="text-muted"> support@myschool.com</em>
                  <br/><br/>

                <!-- social media -->
                <p><strong>Follow Us : </strong></p>
                  <a href="#"><span class="fa fa-facebook fa-fw"></span></a>
                  <a href="#"><span class="fa fa-twitter fa-fw"></span></a>
                  <a href="#"><span class="fa fa-linkedIn fa-fw"></span></a>
                  <a href="#"><span class="fa fa-instagram fa-fw"></span></a>

              </div>
              <!-- info -->
              <div class="col-md-3 mb-3">
                  <p><strong>Featured</strong></p>
                  <a href="#" class="text-muted"> About Us </a> <br/><br/>
                  <a href="#" class="text-muted"> Gallery </a> <br/><br/>
                  <a href="#" class="text-muted"> News </a> <br/><br/>
                  <a href="#" class="text-muted"> Patnership </a><br/><br/>
                  <a href="#" class="text-muted"> Sponsors </a>
              </div>

              <!-- drop a messeage -->
              <div class="col-md-5 mb-3">
                  <form method="post" action="success.php">
                    <fieldset class="bg-light p-5 text-center">
                    	 </p> <strong class="text-danger"> <?php if(isset($result)){echo "message sent";} ?> </strong> </p>
                        <p class="text-muted"><strong> We Would Love To Hear From You... </strong></p>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="name-field"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Name" aria-label="username" aria-describedby="name-field">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="email-field"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email-field" required>
                        </div>
                        <br/>
                        <div class="input-group">
                             <textarea class="form-control" id="c-address" name="msg" row mb-3s="3" placeholder="Enter Your Message" required></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-danger btn-block" type="submit" name="submit">Submit form</button>
                    </fieldset>
                  </form>
              </div>
            </div>

            <div class="row mb-3 py-5 justify-content-center">
                <div class="col-12 text-center">
                   <p class="text-center"> &copy; copyright 2017 <p>
                   <p class="text-center"> site designed by <a href="#" class="text-muted"><i> izedomi </i></a>
                </div>
            </div>

          </div>
      </div>      
      <!-- footer section : ends -->



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="public/assets/js/jquery.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
     <!-- custome JS -->
    <script src="public/assets/js/online_payment.js"></script>  
    
</body>
</html>




