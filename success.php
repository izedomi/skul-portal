<?php ob_start(); ?>
<?php session_start(); ?>
<?php ini_set('session.cache_limiter', 'public'); ?>

<?php 
$payments = ($_SESSION['payments']);

$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");


$fullname = $_SESSION['fullname'];
$phone = $_SESSION['phone'];
$table = $_SESSION['table'];
$pay_purpose = $_SESSION['pay_purpose'];
$last_insert_id = $_SESSION['id'];


$last_insert_id = $_GET['id'];
$table = $_GET['table'];


$unique_id = "";

$time = strftime("%m-%d-%y", time());

$sql = "SELECT * FROM $table WHERE id = $last_insert_id";
$query = mysqli_query($link, $sql);
if(!$query):
	die("database query failed" . mysqli_error($link));
endif;

$result = mysqli_fetch_array($query);


$result['payment'] = str_replace("-", "<br/>", $result['payment']);


//unique id : class

switch ($result['class']) {
	case 'PRIMARY 1':
		$unique_id = "P1";
		break;

	case 'PRIMARY 2':
		$unique_id = "P2";
		break;

	case 'PRIMARY 3':
		$unique_id = "P3";
		break;

	case 'PRIMARY 4':
		$unique_id = "P4";
		break;

	case 'PRIMARY 5':
		$unique_id = "P5";
		break;

	case 'PRIMARY 6':
		$unique_id = "P6";
		break;

	case 'JSS 1':
		$unique_id = "J1";
		break;

	case 'JSS 2':
		$unique_id = "J2";
		break;

	case 'JSS 3':
		$unique_id = "J3";
		break;

	case 'SSS 1':
		$unique_id = "S1";
		break;

	case 'SSS 2':
		$unique_id = "S2";
		break;

	case 'SSS 3':
		$unique_id = "S3";
		break;
	
	default:
		echo "no class was selected";
		break;
}

// unique id : wing

switch ($result['wing']) {
	case 'GOLD':
		$unique_id .= "G";
		break;

	case 'SILVER':
		$unique_id .= "S";
		break;

	case 'BRONZE':
		$unique_id .= "B";
		
	default:
		echo "no wing selected";
		break;
}

//unique id : term

switch ($result['term']) {
	case 'FIRST TERM':
		$unique_id .= "01";
		break;

	case 'SECOND TERM':
		$unique_id .= "02";
		break;

	case 'THIRD TERM':
		$unique_id .= "03";
		break;
	
	default:
		echo "no term selected";
		break;
}

// unique id : serial no

 if(strlen($last_insert_id) == 1){ $unique_id .= "00{$last_insert_id}"; }
 
 if(strlen($last_insert_id) == 2){ $unique_id .= "0{$last_insert_id}"; }

 if(strlen($last_insert_id) == 3){ $unique_id .= $last_insert_id; }


$sql_update = "UPDATE $table SET unique_id = '$unique_id', date = '$time' WHERE id = $last_insert_id ";
$query_update = mysqli_query($link, $sql_update);
if(!$query_update):
	die("database query failed" . mysqli_error($link));
endif;

$url = "http://portal.bulksmsnigeria.net/api/";
$username = "godwinizedomi@gmail.com";
$password = "izedomi";
$message = "STUDENT NAME: {$result['fullname']}.AMOUNT PAID: #{$result['total']} RECIEPT NO: {$unique_id}.DATE: {$time}";
$sender = "IzHub D";
$mobile = $result['g_phone'];
//$mobile = "23408063498356";

$query = array(
	'username' => $username , 
	'password' => $password , 
	'message' => $message , 
	'sender' => $sender , 
	'mobiles' => $mobile 
);

$param = http_build_query($query);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

$response = curl_exec($ch);

curl_close($ch);


$error_code = json_decode($response,true);

if(($error_code['status']) == "OK"){
    $report = "Payment details has been sent to your mobile";
}


/*foreach($payments as $payment){
 	$payment_table = strtolower($payment['purpose']);
 	$payment_table = str_replace(" ", "_", $payment_table);


 	$payment_fullname = $payment['fullname'];
 	$payment_class = $payment['class'];
 	$payment_wing = $payment['wing'];
 	$payment_term = $payment['term'];

 	$sql_in = "INSERT INTO $payment_table SET 
 	name = '$payment_fullname', 
 	class = '$payment_class', 
 	wing = '$payment_wing', 
 	term = '$payment_term', 
 	unique_id = '$unique_id', 
 	date = '$time'"; 

 	$query_in = mysqli_query($link, $sql_in);
 	if(!$query_in){die("inserting to {$payment_table} failed". mysqli_error($link));}
 } */

 	// unset array
   // $payments = array();

?>


<!DOCTYPE html>
<html lang="en">

<head>
     
     <title>SUCCESS - SKUL PORTAL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


   

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
        <a class="navbar-brand" href="#">skulportal.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navBar">
          <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
            <li class="nav-item pr-3">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        
          </ul>
        </div>
      </nav>
    </div>
  <!-- navbar: endd -->

<div class="container my-3"><!-- container starts -->

    <div class="row justify-content-center mb-3">
        
         <div class="col-md-6 text-center">			
		    <p><strong class="text-center"><?php echo $report; ?></strong></p>
		</div>
	</div>
    
    <div class="row justify-content-center mb-3">
        
        
        <div class="col-md-3 text-center">			
			<a  class="btn btn-outline-secondary" href="."> RETURN BACK HOME</a>
		</div>
		<div class="col-md-3 text-center">			
			<a  class="btn btn-outline-secondary" href="download?unique_id=<?php echo $unique_id; ?>&table=<?php echo $table; ?>"> CLICK TO DOWNLOAD PDF </a>
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
<?php //ob_flush(); ?>
