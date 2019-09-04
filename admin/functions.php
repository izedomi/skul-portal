

<?php
ob_start();
session_start();

$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");

function query($link, $sql){
    $query_first = mysqli_query($link, $sql);
    if(!$query_first){ die("database query failed" . mysqli_error($link));}

    return $query_first;
}

function check_logged_in(){
    // checks if login details has be set
    if(isset($_SESSION['username'])){
        return true;
    }
    else{
    // unset($_SESSION['userId']);
        unset($_SESSION['username']);
        header("Location:../login.php");
    }
}
function logout(){
    //unset login details
  
    $_SESSION = array();

    if(isset($_COOKIE[session_name()])){

        setcookie(session_name(), " ", time() - 4200, '/' );
    }

    session_destroy();

    header("Location: login.php?logout=true");
}
function logged_in($username){
        
    header("Location: index.php?u=$username");
   
}

ob_flush();
?>