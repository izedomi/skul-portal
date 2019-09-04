<?php ob_start(); ?>
<?php require_once('functions.php'); ?>
<?php

 $error = " ";
?>

<?php if((isset($_POST['submit'])) || (isset($_POST['logout']))): ?>
    <?php
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = sha1($password);

      
        
        $_SESSION['username'] = $username;

    

        $sql = "SELECT * FROM login WHERE username = '$username' AND password='$hash_password' ";
        $query = query($link, $sql);
  
        $count = mysqli_num_rows($query);
       // $count = mysqli_affected_rows($link);
    
        if($count == 1){logged_in($username);}
        if($count != 1){ $error = "Username/Password combination incorrect!";}
          

    ?>
<?php endif; ?>


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
                <span class="fa fa-lock fa-fw"></span>  
                <span class="text-danger"> Admin Login </span></span>  
             </span>       

              <div class="text-center d-sm-block d-md-none">
                <span class="fa fa-lock fa-fw"></span>  
                <span class="text-danger"> Admin Login </span></span>  
             </div>       
               
          </div>
        </div>
      </div>
    </div>
  <!-- pre-header: ends -->

	
<div id="login" class="container border-secondary border-rounded mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
<form id="form" method="post" action="login.php">
   
    <fieldset class="bg-white p-5">
         <?php if(isset($_POST['submit'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['logout'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo "you logged out!" ?>
            </div>
        <?php endif; ?>
        
        <h3 class="text-bold"> Enter Login Details </h3>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="name-field"><i class="fa fa-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="username" aria-describedby="name-field" required>
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="email-field"><i class="fa fa-key"></i></span>
            <input type="password" name="password" class="form-control" placeholder="password" aria-label="email" aria-describedby="email-field" required>
        </div>
        <br/>
        <button class="btn btn-danger" type="submit" name="submit">Login</button>
    </fieldset>
</form>
</div>
</div>
</div>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../public/assets/js/jquery.min.js"></script>
<script src="../public/assets/js/popper.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php //require_once("../public/assets/layouts/footer.php"); ?>
<?php ob_flush(); ?>