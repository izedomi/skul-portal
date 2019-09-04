<?php session_start(); ?>
<?php ob_start(); ?>
<?php ini_set('session.cache_limiter', 'public'); ?>
<?php  require_once("includes/functions.php"); ?>
<?php  require_once("includes/config.php"); ?>


<?php
$purposes = $_SESSION['purpose'];


$surname = $_POST['surname'];
$other_names = $_POST['other-names'];
$wing = $_POST['wing'];
$term = $_POST['term'];
$g_phone = $_POST['g-phone'];
$g_name = $_POST['g-name'];
$pay_category = $_POST['category'];
$pay_purpose = $_POST['payment'];
$total = $_POST['total'];
$int_total = $_POST['int_total'];


$total_amount_in_kobo = $int_total * 100;
$fullname = $surname . " " . $other_names;


if(!empty($_POST['s-class'])){
$sec_class = $_POST['s-class'];
$table = 's_payment_details';
$class = $sec_class;
//$class = $sec_class ." (" . $wing .")";
}
if(!empty($_POST['p-class'])){
$pry_class = $_POST['p-class'];
$table = 'p_payment_details';
$class = $pry_class;
//$class = $pry_class ." (" . $wing .")";
}

$sql = "INSERT INTO {$table} SET
category = '$pay_category',
fullname = '$fullname',
class = '$class',
wing = '$wing',
term = '$term',
g_fullname = '$g_name',
g_phone = '$g_phone',
payment = '$pay_purpose',
total = '$total'";

$query = mysqli_query($link, $sql);
if(!$query):
	die("database query failed....". mysqli_error($link));
endif;

$num = mysqli_insert_id($link);
$_SESSION['id'] = $num;

$sql_r = "SELECT payment FROM {$table} WHERE fullname = '$fullname' AND id = $num";
$query = mysqli_query($link, $sql_r);
if(!$query):
	die("database query failed....". mysqli_error($link));
endif;

$result = mysqli_fetch_array($query);
$pay_purpose = str_replace("-", "<br/>", $result['payment']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

     <title>MAKE PAYMENT - SKUL PORTAL</title>
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

<div class="container my-3"><!-- container starts -->
	<div class="row justify-content-center"><!-- container row ends -->
		<div class="col-md-6 bg-light"><!-- container col-md-10 starts -->



		<form method="post" action="paystack_test">

      <?php
          if(isset($_GET['initialize']) && $_GET['initialize'] == "false"){
             echo "failed to initialize transaction...please try again!";
          }
       ?>

       <?php
         $pay_purpose = "";
         foreach ($purposes as $purpose) {

           $amount = amount_fee_delimeter($purpose['amount']);
           $pay_purpose .= $purpose['purpose'] . " (#". $amount. ")<br/>";
           echo "<br/>";
         }
       ?>

			<div class="row mb-3 text-center">
              <div class="col-md-12">
                 <p><strong class="text-danger"> PAYMENT SUMMARY </strong></p>
                  <p><strong> <?php echo $pay_purpose; ?> </strong></p>
                  <input type="text" class="text-center" readonly value="<?php echo "Total (#{$total})"; ?>">

              </div>

        	</div>

            <div class="row mb-3">
              <div class="col-md-12">
                <label> Phone Number </label>
                <div class="input-group">
                    <span class="input-group-addon" id="name-field"><i class="fa fa-phone"></i></span>
                    <input type="text" id="no" name="card-number" class="form-control" value="<?php echo $g_phone; ?>" readonly/>
               </div>
               <small class="form-text text-danger">Payment details will be sent to it.</small>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-12">
                <label> Email </label>
                <div class="input-group">
                    <span class="input-group-addon" id="name-field"><i class="fa fa-envelope"></i></span>
                    <input type="text" name="card-email" class="form-control" placeholder="Enter a Valid Email"/><br/>
                </div>
                 <small class="form-text text-danger">Payment receipt will be sent to it.</small>
              </div>
            </div>

            <!-- copy : from here -->
            <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
            <input type="hidden" name="g_phone" value="<?php echo $g_phone; ?>">
            <input type="hidden" name="table" value="<?php echo $table; ?>">
            <input type="hidden" name="id" value="<?php echo $num; ?>">
            <!-- copy : ends here -->
            <input type='hidden' name='total' value='<?php echo $total_amount_in_kobo; ?>' />

             <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <!-- vogue pay payment button goes here -->
                     <button type="submit" name="paystack" class="btn btn-danger mb-3">Make Payment</button>
                </div>
             </div>

		</form>


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
                  <form method="post" action="pay.php">
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
<?php ob_flush(); ?>