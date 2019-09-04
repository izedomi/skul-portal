<?php
ob_start();
require_once("functions.php");

if(!check_logged_in()){header("Location: login.php"); exit();}


$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");

?>

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

<?php

$sql_pur = "SELECT * FROM payment_purpose";
$query_pur = mysqli_query($link, $sql_pur);
if(!$query_pur){ die("operation failed");}

while($result = mysqli_fetch_array($query_pur)):

    $table_name = strtolower($result['purpose']);
    $table_name = str_replace(" ", "_", $table_name); 

    $sql_content = "SELECT * FROM $table_name";
    $query_content = mysqli_query($link, $sql_content);
    if(!$query_content){die("operation failed..");}

    $content_count = mysqli_num_rows($query_content);

    $contents[] = array("purpose" => $result['purpose'], "count" => $content_count);
endwhile;

$count = count($contents);



?>

<?php

// get variables are sent from add_content.php

$msg = " ";
$actionn = " ";

if((isset($_GET['news'])) && ($_GET['news']) ==1){$msg = "News successfully added";}
if((isset($_GET['cat'])) && ($_GET['cat']) ==1){ $msg = "Payment category successfully added";}
if((isset($_GET['purpose'])) && ($_GET['purpose']) ==1){$msg = "Payment purpose successfully added";}
if((isset($_GET['error'])) && ($_GET['error']) ==1){$msg = "operation failed";}
if((isset($_GET['int'])) && ($_GET['int']) == 'false'){$msg = "the 'amount' field requires only numbers..";}
if((isset($result)) && ($result) == 1){$msg = "message successfully sent";}




// the $msg variable is echoed from header.php
?>


<?php require_once("header.php"); ?>

          
          <!-- side content : list group -->
            <div class="list-group">
              <a href="index.php" class="list-group-item list-group-item-action active"> Dashboard </a>
              <a href="news.php" class="list-group-item list-group-item-action"> News </a>
              <a href="p_category.php" class="list-group-item list-group-item-action"> Payment category </a>
              <a href="p_purpose.php" class="list-group-item list-group-item-action"> Payment Purpose </a>            
            </div>
          </div>

   				<!-- main content -->
   				<div class="col-md-8 py-5">
                    <!-- fee summary -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3> FEE SUMMARY </h3>
                        </div>
                       
                        <div class="card-body"> <!-- first card body: starts -->
                            <div class="card-deck justify-content-center py-3 mb-3">
                                <?php foreach($contents as $content):?>
                                   <div class="card text-center border-secondary pt-4 mb-3">
                                        <h3><?php echo $content['count']; ?></h3>
                                        <p><strong><?php echo $content['purpose']; ?></strong></p>
                                    </div>                                      
                                <?php endforeach; ?>
                            </div>                             
                        </div><!-- first card body: ends --> 
                    </div>                                                 
   				</div> <!-- col-md-8 :ends -->


   			</div>
   		</div>
   	</div>
   <!-- content : ends -->

<?php ob_flush(); ?>
    <?php require_once("footer.php"); ?>

  
 








  