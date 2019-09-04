<?php
 session_start();
ob_start();
require_once("includes/functions.php");
require_once("includes/config.php");


$curl = curl_init();

$unique_id = "";
$pay_purpose = "";
$txt_msg = "";
$time = strftime("%m-%d-%y", time());


$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

if(substr($reference, 0, 3) == "pry"){
	$table = 'p_payment_details';
}
else{
	$table = 's_payment_details';
}


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", //replace with your keys
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
	// there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status):


        $sql = "SELECT * FROM $table WHERE reference = '$reference'";
        $query = mysqli_query($link, $sql);
        if(!$query):
        	die("database query failed" . mysqli_error($link));
        endif;

        $result = mysqli_fetch_array($query);

        //$result['payment'] = str_replace("-", "<br/>", $result['payment']);
        $last_insert_id = $result['id'];

        $payments = explode("-", $result['payment']);



        $sql_pur = "SELECT * FROM payment_purpose";
        $query_pur = mysqli_query($link, $sql_pur);
        if(!$query_pur):
        	die("database query failed" . mysqli_error($link));
        endif;

        while($payment_list = mysqli_fetch_array($query_pur)){
        	foreach ($payments as $payment) {
        		if($payment_list['purpose'] == $payment):

        			  $paid_fees[] = array("fee"=>$payment_list['purpose']);

        				$amount = amount_fee_delimeter($payment_list['amount']);
        				$pay_purpose .= $payment_list['purpose'] . " (#". $amount. ")<br/>";

        				echo "<br/>";


        		endif;
        	}

                };
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
        		echo "NA";
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
        	  $unique_id .= "N";
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
        		$unique_id .= "00";
        		break;
        }

        // unique id : serial no

         if(strlen($last_insert_id) == 1){ $unique_id .= "00{$last_insert_id}"; }

         if(strlen($last_insert_id) == 2){ $unique_id .= "0{$last_insert_id}"; }

         if(strlen($last_insert_id) == 3){ $unique_id .= $last_insert_id; }


        $sql_update = "UPDATE $table SET unique_id = '$unique_id', date = '$time' WHERE reference = '$reference' ";
        $query_update = mysqli_query($link, $sql_update);
        if(!$query_update):
        	die("database query failed" . mysqli_error($link));
        endif;

        foreach($paid_fees as $fee){

        	$payment_table = strtolower($fee['fee']);
         	$payment_table = str_replace(" ", "_", $payment_table);
        	$payment_table = trim($payment_table);

         	$payment_fullname = $result['fullname'];
         	$payment_class = $result['class'];
         	$payment_wing = $result['wing'];
         	$payment_term = $result['term'];

         	$sql_in = "INSERT INTO {$payment_table} SET
         	name = '$payment_fullname',
         	class = '$payment_class',
         	wing = '$payment_wing',
        	term = '$payment_term',
        	unique_id = '$unique_id',
        	date = '$time'";

         	$query_in = mysqli_query($link, $sql_in);
         	if(!$query_in){
        		die("inserting to {$payment_table} failed". mysqli_error($link));
        	}

        } //exit();

         	// unset array
            $payments = array();


        // send message to guardian's phone number


        $url = "http://portal.bulksmsnigeria.net/api/";
        $username = "XXXXXXXXXXXXX"; //sms username
        $password = "izedomi"; //password
        $message = "fees paid successfully";
        $sender = "easyPAY";
        $mobile = str_replace("2340", "234", $result['g_phone']);

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

        $response = json_decode($response, true);

        if($response['status'] == "OK"){
        	$txt_msg =  "payment nofication sent to phone";
        }


endif;

?>




<!DOCTYPE html>
<html lang="en">

<head>

     <title>PAYMENT SUCCESSFUL - SKUL PORTAL</title>
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


<div class="container my-3 justify-content-center"><!-- container starts -->

	<div class="row justify-content-center mb-3">
		<div class="col-md-6 text-center">
			<a  class="btn btn-outline-secondary" href="download?unique_id=<?php echo $unique_id; ?>&table=<?php echo $table; ?>"> CLICK TO DOWNLOAD PDF </a>
		</div>
	</div>

	<div class="row justify-content-center"><!-- container row ends -->
		<div class="col-md-6 bg-light text-center"><!-- container col-md-10 starts -->

                <p class="text-danger text-center"> <?php echo $txt_msg; ?> </p>

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
						<?php echo $pay_purpose; ?>
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

<?php
ob_flush();
?>
