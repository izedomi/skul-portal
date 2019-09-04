
<?php if(isset($_POST['submit'])): ?>
    <?php

        $result = " ";
        $username = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];


        $to = "kingemmanuel4life@gmail.com";
        $subject = "SUPPORT REQUEST from {$username}";
        $from = $email;
        $headers = "From: {$from}";

        $result = mail($to, $subject, $msg, $headers);
        

    ?>
<?php endif; ?>


<?php 


$link = mysqli_connect("localhost", "mastersc_skul", "skulportal101?");

mysqli_select_db($link, "mastersc_skulportal");


$sql_cat = "SELECT * FROM payment_category";
$query_cat = mysqli_query($link, $sql_cat);

$sql_pur = "SELECT * FROM payment_purpose";
$query_pur = mysqli_query($link, $sql_pur);


?>


<!DOCTYPE html>
<html lang="en">

<head>
     
     <title>PAYMENT FORM - SKUL PORTAL</title>
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
  
  <!-- search bar: starts -->
    <div class="bg-primary py-3 mb-3">
      <div class="container">
        <div class="row justify-content-center"> 
          <div class="col-md-6">      
          <form method="post" action="details">
            <div class="form-row align-items-center">
              <div class="col-md-6">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" name="id" class="form-control mb-2 mb-sm-0" placeholder="Enter Payment Receipt" required />
              </div>
        
              <div class="col-md-6 justify-content-center pl-md-none pl-5">
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
    <div class="row mb-3 justify-content-center">
      <div class="col-md-12">
        <div class="row mb-3 justify-content-center">
          

          <form method="post" action="confirm">

            <fieldset class="bg-light p-5">
                <p class="text-muted text-center"><strong> Payment Form </strong></p>
                <br/>
                   
                 <div class="row mb-3">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>Student Details</strong></p>
                    </div>
                 </div>

                <!-- student : surname -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="name-field"><i class="fa fa-user"></i></span>
                        <input type="text" name="surname" class="form-control" placeholder="Surname" required />
                    </div>
                  </div>
                </div>
               
               <!-- student : other names -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="name-field"><i class="fa fa-user"></i></span>
                        <input type="text" name="other-names" class="form-control" placeholder="Other Names" required />
                    </div>
                  </div>
                </div>

               
                <!-- primary section : starts -->
                <div class="row mb-3">
                     <!-- student : class -->
                    <div class="col-md-4">
                        <div class="form-group">
                          <select name="p-class" class="form-control" id="class">
                            <option value=""> select class(PRY) </option>
                            <option> Primary 1 </option>
                            <option> Primary 2 </option>
                            <option> Primary 3 </option>
                            <option> Primary 4 </option>
                            <option> Primary 5 </option>
                            <option> primary 6 </option>
                          </select>
                        </div>
                    </div>

                     <div class="col-md-4">
                        <div class="form-group">
                          <select name="s-class" class="form-control" id="class">
                            <option value=""> select class(SEC) </option>
                            <option> JSS 1 </option>
                            <option> JSS 2 </option>
                            <option> JSS 3 </option>
                            <option> SSS 1 </option>
                            <option> SSS 2 </option>
                            <option> SSS 3 </option>
                          </select>
                        </div>
                    </div>

                      <!-- student : wing -->
                     <div class="col-md-4">
                        <div class="form-group">
                          <select name="wing" class="form-control" id="wing">
                            <option value=" "> select wing </option>
                            <option> GOLD </option>
                            <option>  SILVER </option>
                            <option> BRONZE </option>                           
                          </select>
                        </div>
                    </div>
                </div>
                <!-- primary section : ends -->


        
                <!-- student : term -->
                <div class="row mb-3">                   
                    <div class="col-md-12">
                        <div class="form-group">
                          <select name="term" class="form-control" id="term">
                            <option value=" "> Select Term </option>
                            <option> First Term </option>
                            <option> Second Term </option>
                            <option> Third Term </option>
                          </select>
                        </div>
                    </div>

                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>Guardian Details</strong></p>
                    </div>
                </div>

                 <!-- guardian's full name -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="name-field"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="g-name" class="form-control" placeholder="Guadian's Name" required />
                    </div>
                  </div>
                </div>
                          
               <!--  guardian's phone number -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="name-field"><i class="fa fa-phone"></i></span>
                        <input type="text" name="g-phone" class="form-control" placeholder="Guardian's Number" required />
                    </div>
                  </div>
                </div>
                  
                

                                         <!-- payment categories : starts -->
                    
                  <div class="row mb-1">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>Payment Categories</strong></p>
                    </div>
                  </div>
                
                  
                  <div class="row mb-3">
                    <?php while($result = mysqli_fetch_array($query_cat)): ?>
                    <div class="col-md-4">
                       <div class="form-check">
                          <label class="form-check-label">
                            <input  type="radio" name="category" class="form-check-input" value="<?php echo $result['category']; ?>">
                              <?php echo $result['category']; ?>
                          </label>
                       </div>
                    </div>
                    <?php endwhile; ?>
                </div>


                                         <!-- payment categories : ends -->

                                          <!-- payment fees option: starts -->

                  <div class="row mb-2">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>Purpose For Payment (Tick)</strong></p>
                    </div>
                  </div>

                <!-- school fees -->
                <div class="row mb-3">
                    <?php while($result = mysqli_fetch_array($query_pur)): ?>
                      <div class="col-md-6">
                         <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name="fees[]" class="form-check-input" value="<?php echo $result['purpose']; ?>" />
                                <?php echo $result['purpose']; ?>
                            </label>
                         </div>
                      </div>
                    <?php endwhile; ?>
                </div>
                     
                                      <!-- payment fee option: ends -->
                <div class="row justify-content-center">
                 
                  <button class="btn btn-danger d-none d-md-block w-50" type="submit" name="pay">Continue</button>
                  <button class="btn btn-danger btn-block d-sm-block d-md-none" type="submit" name="pay">Continue</button>
                </div>
            </fieldset>
          </form>
    
              



        </div>
      </div>
    </div>
  </div>






                  



















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
                  <form method="post" action="payment_form.php">
                    <fieldset class="bg-light p-5 text-center">
                       </p> <strong class="text-danger"><?php ?> </strong> </p>
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
