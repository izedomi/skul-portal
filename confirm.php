<?php ob_start(); ?>
<?php session_start(); ?>
<?php ini_set('session.cache_limiter', 'public'); ?>
<?php  require_once("includes/functions.php"); ?>
<?php  require_once("includes/config.php"); ?>


<?php


$sql_pur = "SELECT * FROM payment_purpose";
$query_pur = mysqli_query($link, $sql_pur);


$surname = strtoupper($_POST['surname']);
$other_names = strtoupper($_POST['other-names']);
$sec_class = strtoupper($_POST['s-class']);
$pry_class = strtoupper($_POST['p-class']);
$wing = strtoupper($_POST['wing']);
$term = strtoupper($_POST['term']);
$g_phone = strtoupper($_POST['g-phone']);
$g_name = strtoupper($_POST['g-name']);

$total = 0;
$int_total = 0;
$payment_made = "";

if((empty($pry_class)) && (empty($sec_class))){echo "no class was selected"; exit();}
if((!empty($pry_class)) && (!empty($sec_class))){echo "select either a primary or secondary class not both"; exit();}
if(empty($wing)){echo "no wing was selected...please select a wing"; exit();}
if(empty($term)){echo "no term was selected...please select a term";}

$g_phone = "234{$g_phone}";
$fullname = $surname . " " . $other_names;
if(!empty($pry_class)){ $class = $pry_class; $class_slug = "pry";}
if(!empty($sec_class)){ $class = $sec_class; $class_slug = "sec";}
$_SESSION['class_slug'] = $class_slug;


if(!empty($_POST['category'])){
	$pay_category = strtoupper($_POST['category']);
}else{
	echo "no payment category was selected";
	exit();
}

if(!empty($_POST['fees'])){
	while($result = mysqli_fetch_array($query_pur)):
		foreach ($_POST['fees'] as $fee):
			if($fee == "{$result['purpose']}"){
				$purposes[] = array('purpose' => $result['purpose'], 'amount' => $result['amount']);
			}
		endforeach;
	endwhile;
}
else{
	echo " Please select a purpose for payment";
	exit();
}

$_SESSION['purpose'] = $purposes;

?>
<!DOCTYPE html>
<html lang="en">

<head>

     <title>CONFIRM DETAIL - SKUL PORTAL</title>
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
	<div class="row justify-content-center"><!-- container row ends -->
		<div class="col-md-6 bg-light text-center"><!-- container col-md-10 starts -->

			<div class="row mb-3">
				<div class="col-12">
					<p> <strong><h4>PAYMENT DETAILS</h4></strong></p>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-12">
					<p>FULL NAME :  <strong><?php echo "{$surname} {$other_names}"; ?></strong></p>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<?php if(!empty($pry_class)): ?>
						<p> CLASS : <strong> <?php echo "{$pry_class}({$wing})"; ?></strong></p>
					<?php endif; ?>

					<?php if(!empty($sec_class)): ?>
						<p> CLASS : <strong> <?php echo "{$sec_class}({$wing})"; ?></strong></p>
					<?php endif; ?>
				</div>

			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<p> TERM : <strong> <?php echo $term; ?> </strong></p>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<p>GUARDIAN's NAME :  <strong><?php echo $g_name; ?></strong></p>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-md-12">
					<p> GUARDIAN's NO : <strong> <?php echo $g_phone; ?> </strong></p>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-12">
					<p>PAYMENT CATEGORY : <strong><?php echo $pay_category; ?></strong></p>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-12">

					<p><strong> PURPOSE OF PAYMENT(AMOUNT) </strong><p>
					<p class="text-danger"><strong>
						<?php foreach($purposes as $purpose){

							$total += $purpose['amount'];
              $int_total += $purpose['amount'];

               $amount = amount_fee_delimeter($purpose['amount']);


							echo $purpose['purpose'] .' (#' . $amount .')<br/>';
              $payment_made .= $purpose['purpose'] .'-';

							}

              $total = amount_fee_delimeter($total);

						?>
					</strong></p>
					<p class="text-danger"><strong><?php echo "Total (#{$total}) "; ?></strong></p>

				</div>
			</div>

			<!-- submission form -->
			<div class="row mb-3">
				<div class="col-12">
					<form action="pay" method="post">
						<input type="hidden" name="surname" value="<?php echo $surname;?>" />
						<input type="hidden" name="other-names" value="<?php echo $other_names;?>" />
						<?php if(!empty($pry_class)): ?>
							<input type="hidden" name="p-class" value="<?php echo $pry_class;?>" />
						<?php endif; ?>
						<?php if(!empty($sec_class)): ?>
							<input type="hidden" name="s-class" value="<?php echo $sec_class;?>" />
						<?php endif; ?>
						<input type="hidden" name="wing" value="<?php echo $wing;?>" />
						<input type="hidden" name="term" value="<?php echo $term;?>" />
						<input type="hidden" name="g-name" value="<?php echo $g_name; ?>" />
						<input type="hidden" name="g-phone" value="<?php echo $g_phone; ?>" />
						<input type="hidden" name="category" value="<?php echo $pay_category; ?>" />
						<input type="hidden" name="total" value="<?php echo $total; ?>" />
            <input type="hidden" name="int_total" value="<?php echo $int_total; ?>" />

            <?php  if(!empty($_POST['fees'])): ?>
                <input type="hidden" name="fees" value="<?php echo serialize($_POST['fees']); ?>" />
            <?php endif; ?>

					   	<input type="hidden" name="payment" value="<?php echo $payment_made;?>" />
						<button type="submit" class="btn btn-danger"> Proceed to Make Payment</button>

					</form>
				</div>
			</div> 
			
			</div></div></div>
	

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
                  <form method="post" action="confirm.php">
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

                        <input class="form-control bg-danger" type="submit" name="confirm" value="submit form" >
                    </fieldset>
                  </form>
              </div>
            </div>

            <div class="row mb-3 py-5 justify-content-center">
                <div class="col-md-12 text-center">
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
