<?php 
ob_start();
  session_start();
  $link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");


  // retrieving payment list
  if(isset($_POST['payment-list'])):
    $class = $_POST['class'];
    $term = $_POST['term'];
    $wing = $_POST['wing'];
    $purpose = $_POST['purpose'];


    if((empty($class))  || (empty($term)) || (empty($wing)) || (empty($purpose))){
      echo "all fields must be selected";
      exit();
    }

    $table_name = strtolower($purpose);
    $table_name = str_replace(" ", "_", $table_name);


    $sql = "SELECT * FROM $table_name WHERE wing = '$wing' AND class='$class' AND term='$term'";
    $query = mysqli_query($link, $sql);

    if(!$query){die("operation failed" . mysqli_error($link));}
  endif;

  //retrieving payment details
  if((isset($_GET['id'])) || (isset($_POST['submit']))):

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
                <span class="text-danger"> Welcome <?php echo $_SESSION['username']; ?></span> | <span><a href="logout.php">Logout</a></span>  
             </span>       

              <div class="text-center d-sm-block d-md-none">
                <span class="fa fa-user fa-fw"></span>  
                <span class="text-danger"> Welcome <?php echo $_SESSION['username']; ?> | </span></span></span><span><a href="logout.php"> Logout</a></span>  
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
          <form>
            <div class="form-row align-items-center">
              <div class="col-md-6 text-center">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" name="id" class="form-control mb-2 mb-sm-0" placeholder="Enter Payment Receipt" required />
              </div>
        
              <div class="col-md-6 text-center">
                <button type="submit" name="submit" class="btn btn-success">Get Payment Details...</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
   <!-- search bar: ends -->


   <?php if(isset($_POST['payment-list'])): ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">      
            <a  class="btn btn-outline-secondary" href="../download.php?class=<?php echo $class; ?>&wing=<?php echo $wing; ?>&term=<?php echo $term; ?>&table=<?php echo $table_name; ?>"> CLICK TO DOWNLOAD PDF </a>
          </div>
        </div>   
        
        <div class="row justify-content-center">
 				<!-- main content -->
   				<div class="col-md-10 py-5 my-md-5 my-3 justify-content-center bg-light">          
              <div class="text-center mb-5">
                  <h3><strong> MYSCHOOLNAME.COM </strong></h3>
                  <p><strong><em> 12, SULEMAN STRT., AUCHI, EDO STATE, NIGERIA.</em></strong></p> 
                  <p><strong><?php echo "{$class} ({$wing})"; ?> </strong></p>                   
                  <p><strong><?php echo "{$purpose} ({$term})"; ?> </strong></p>                              
              </div>
                
              <div class="container">
                  <div class="row mb-3 justify-content-center text-center">
                     <div class="col-md-1"><p><i> S/N </i></p></div>
                    <div class="col-md-6"><p><i> NAMES </i></p></div>
                    <div class="col-md-2"><p><i> RECIEPT NO </i></p></div>
                    <div class="col-md-3"><p><i> DATE </i></p></div>

                  </div>

                  <?php $x = 1; ?>
                  <?php while($result = mysqli_fetch_array($query)): ?>
                    <div class="row mb-3 justify-content-center text-center">
                      <div class="col-md-1"> <p><strong><?php echo $x; ?></strong></p> </div>
                      <div class="col-md-6"> <p><strong>
                        <a href="list.php?id=<?php echo $result['unique_id']; ?>"> <?php echo $result['name']; ?> </a>
                      </strong></p></div>
                      <div class="col-md-2"> <p><strong><?php echo $result['unique_id']; ?></strong></p> </div>
                      <div class="col-md-3"> <p><strong><?php echo $result['date']; ?> </strong></p> </div>
                    </div>
                    <?php $x++; ?>
                  <?php endwhile; ?>         
              </div>            
          </div>
        </div>
      </div>
   <?php endif; ?>

            <?php if((isset($_GET['id'])) || (isset($_POST['id']))): ?>
                  <div class="container my-3"><!-- container starts -->
                  
                    <div class="row justify-content-center mb-3">
                    	<div class="col-md-6 text-center">			
                    		<a  class="btn btn-outline-secondary" href="../download.php?unique_id=<?php echo $unique_id; ?>&table=<?php echo $table_name; ?>"> CLICK TO DOWNLOAD PDF </a>
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

                                    <span class=""> DATE :  <strong><?php echo $result['date']; ?></strong></span>
                                  </div>    
                                </div>

                                <div class="row mb-3 d-sm-block d-md-none">
                                  <div class="col-md-12">
                                    <p> RECIEPT NO :  <strong><?php echo $unique_id; ?></strong></p> <br/>
                                    <p> DATE :  <strong><?php echo $result['date']; ?></strong></p>
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

            <?php endif; ?>


  <?php require_once("footer.php"); ?>
  <?php ob_flush(); ?>

      
  