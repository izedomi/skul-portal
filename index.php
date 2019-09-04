<?php if(isset($_POST['submit'])): ?>
    <?php
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




<!DOCTYPE html>
<html lang="en">

<head>
     
     <title>SKUL PORTAL</title>
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
        <div class="row">
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
        <a class="navbar-brand" href="#">skulportal.com </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navBar">
          <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
            <li class="nav-item pr-3">
              <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form method="post" action="payment_form" class="form-inline my-1 my-lg-0">    
            <button class="btn my-1 my-sm-0" type="submit">Make Payment</button>
          </form>
        </div>
      </nav>
    </div>
  <!-- navbar: endd -->
  
   <div class="container">
     <div class="row justify-content-center">
       <div class="jumbotron jumbotron-fluid text-center my-5 p-md-5 bg-light">
            <h1 class="display-3 d-none d-md-block"> SKULPORTAL.COM </h1>
            <h3 class="d-sm-block d-md-none"> SKULPORTAL.COM </h3>
            <p class="lead"> PAYMEMT PORTAL </p>
            <hr class="my-4">
            <a class="btn btn-danger mb-md-0 mb-sm-3 mb-xs-3" href="payment_form"> Make Payment </a>
            <a class="btn btn-success my-3" href="#"> Download Receipt </a>
        </div>
     </div>
   </div>



  <!-- carousel:starts -->

    <div id="mainCarousel" class="carousel slide" data-ride="carousel">
        <!-- carousel indicators:starts
          <ol class="carousel-indicators">
            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mainCarousel" data-slide-to="1"></li>
            <li data-target="#mainCarousel" data-slide-to="2"></li>
            <li data-target="#mainCarousel" data-slide-to="3"></li>
          </ol>
        <!-- carousel indicators:ends
          
        <!-- carousel image slides : starts 
          <div class="carousel-inner">
              <!-- first slide 
              <div class="carousel-item active">
                  <img class="d-block w-100" src="public/assets/img/ad3.jpg" alt="Second slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h3>Never Give Up!</h3>
                    <p>the set time is here.....</p>
                  </div>
              </div>
              <!-- second slide 
              <div class="carousel-item">
                <img class="d-block w-100" src="public/assets/img/ad2.jpeg" alt="Second slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h3>Changing The World</h3>
                    <p>become a creator today........</p>
                  </div>
              </div>
              <!-- third slide 
              <div class="carousel-item">
                <img class="d-block w-100" src="public/assets/img/ad1.jpeg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h3>No Limits</h3>
                  <p>reach for the stars.....</p>
                </div>
              </div>
              <!-- fourth slide
              <div class="carousel-item">
                <img class="d-block w-100" src="public/assets/img/server_room.jpeg" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block">
                  <h3>A Global Village</h3>
                  <p>bringing everyone together.....</p>
                </div>
              </div>
          </div>  
          -->
        <!-- carousel image slides : ends -->
      
     
        <!-- carousel controls : starts
        <!--
          <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>   
          </a> 
        <!-- carousel controls : starts 
    </div>
  <!-- carousel: ends -->

  <!-- welcome note: starts -->
    <div id="welcome-section"  class="py-3">
        <div class="container">
          <div class="row">
            <!-- welcome message -->
            <div class="col-md-7 py-4 px-5 text-muted">
                <h3 class="text-dark">Welcome......</h3><br/>
                <i class="fa fa-quote-left fa-pull-left fa-border" aria-hidden="true"></i>
                <i>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus corrupti earum iste eum cupiditate 
                  quam quidem minima consectetur nihil, nemo commodi velit sequi nam, beatae accusantium ut possimus, error maiores!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam veritatis quam voluptatibus omnis temporibus id provident quis. Praesentium, quasi vel necessitatibus assumenda itaque cum inventore mollitia nulla cupiditate delectus debitis odit odio in, quisquam labore, eum natus cumque iure ve
                </i>
                 <i class="fa fa-quote-right fa-border" aria-hidden="true"></i>
            </div>

            <!-- principal photo -->
            <div class="col-md-5 py-4 px-5">
                <img src="public/assets/img/smile.jpeg" class=" border border-dark rounded-circle img-fluid d-block w-100" />
                <p class="text-center"> caroline wozinyaki(Head of Center)</p>
            </div>
          </div>
        </div>

    </div>
  <!-- welcome note: ends -->


  <!-- admission slider : starts -->
    <div id="admission-slider-section">
      <div class="container py-5 px-5">
        <div class="row">
          <div class="col-12">
                <h3 id="admission-slider" class="text-center"></h3>
            
          </div>
        </div>
      </div>
    </div>
  <!-- admission slider : ends -->

  

  <!-- news :starts -->
    <div id="news-section" class="mb-4">
      <div class="container py-3 px-3">
        <div class="row">

          <div class="col-12">
            <div class="card-header my-3">
               <h3>Latest News.....</h3>
            </div>
          </div>

          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admission  into 2017/2018 session in progress</h4><br/>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">We are best again...</h4><br/>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Our student visits benin city museum</h4><br/>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-outline-info">Read More</a>
                </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  <!-- news: ends -->

  
  <!-- footer section : starts -->
      <div id="footer">
          <div class="container">
            <div class="row py-4">

              <!-- contact info -->
              <div class="col-md-4 mb-3">
                <span><strong> Contact Us : </strong></span> <br/><br/>
                  <span class="fa fa-location-arrow fa-fw"></span><em class="text-muted"> 12 suleman street, Auchi, Edo State.</em>
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
                  <form method="post" action="index.php">
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
                             <textarea class="form-control" id="c-address" name="msg" rows="3" placeholder="Message" required></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-danger btn-block" type="submit" name="submit">Submit form</button>
                    </fieldset>
                  </form>
              </div>
            </div>

            <div class="row py-5 justify-content-center">
                <div class="col-12 text-center">
                   <p class="text-center"> &copy; copyright 2019 <p>
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