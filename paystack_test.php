<?php session_start(); ?>
<?php ob_start(); ?>

<?php ini_set('session.cache_limiter', 'public'); ?>
<?php  require_once("includes/functions.php"); ?>
<?php  require_once("includes/config.php"); ?>



<?php

$class_slug = $_SESSION['class_slug'];


if(isset($_POST['paystack'])):
  $curl = curl_init();

  $amount = $_POST['total'];
  $email = $_POST['card-email'];
  $fullname = $_POST['fullname'];
  $g_phone = $_POST['g_phone'];
  $id = $_POST['id'];
  $table = $_POST['table'];
  $callback_url = "https://skulportal.masterscad.com.ng/paystack_success";


    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array();
    $alpha_length = strlen($alphabet) - 1;
    for ($i = 0; $i < 17; $i++)
    {
        $n = rand(0, $alpha_length);
        $password[] = $alphabet[$n];
    }

    $reference = $class_slug.implode($password);


  $sql = "UPDATE $table SET reference = '$reference' WHERE id = $id AND fullname = '$fullname' AND g_phone = '$g_phone'";
  $query = mysqli_query($link, $sql);
  if(!$query):
  	die("database query failed" . mysqli_error($link));
  endif;

   $count_row = mysqli_affected_rows($link);

   if($count_row == 1){

          curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'amount'=>$amount,
            'email'=>$email,
            'callback_url'=>$callback_url,
            'reference'=>$reference,
          ]),
          CURLOPT_HTTPHEADER => [
            "authorization: Bearer sk_test_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", //replace this with your own test key
            "content-type: application/json",
            "cache-control: no-cache"
          ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
          // there was an error contacting the Paystack API
          die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response, true);

        if(!$tranx['data']['authorization_url']){
          // there was an error from the API
          print_r('API returned error: ' . $tranx['message']);
        }

        // comment out this line if you want to redirect the user to the payment page
       // print_r($tranx);


        // redirect to page so User can pay
        // uncomment this line to allow the user redirect to the payment page
        header('Location: ' . $tranx['data']['authorization_url']);
        exit();



   }
   else{
     header("Location: payment_form?initialize=false");
     exit();
   }

endif;

ob_flush();

?>
