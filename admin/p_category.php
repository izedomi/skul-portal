<?php 

$link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

mysqli_select_db($link, "wwicscho_payment");

?>


<!-- retrieving all the items (list of all items under payment purpose) : starts -->
<?php

$sql = "SELECT * FROM payment_category";
$query = mysqli_query($link, $sql);
if(!$query){die("operation failed". mysqli_error($link));}

?>
<!-- retrieving all the items (list of all items under payment purpose) : ends -->



<!-- retrieving details of item to be deleted or edited  : starts -->
<?php $id = " "; ?>
<?php if((isset($_GET['del'])) || (isset($_GET['edit']))) : ?>
<?php 
    if(isset($_GET['edit'])){ $id = $_GET['edit'];}
    if(isset($_GET['del'])){$id = $_GET['del'];}

    $sql_action = "SELECT * FROM payment_category WHERE id = $id";
    $query_action = mysqli_query($link, $sql_action);
    if(!$query_action){die("operation failed.......". mysqli_error($link));}

    $action = mysqli_fetch_array($query_action);

?>
<?php endif; ?>
<!-- retrieving details of item to be deleted or edited : ends -->

<!-- retrieving status on operation (delete or edit) : starts -->
<?php 
  $msg = "";
  $actionn = " "; 
  if((isset($_GET['del_success'])) && ($_GET['del_success']) ==1){$actionn = "item successfully deleted";}
  if((isset($_GET['edit_success'])) && ($_GET['edit_success']) ==1){$actionn = "item successfully edited";}
?>
<!-- retrieving status on operation (delete or edit) : ends -->







<?php require_once("header.php"); ?>

          <!-- side content : list group -->
            <div class="list-group">
              <a href="index.php" class="list-group-item list-group-item-action"> Dashboard </a>
              <a href="news.php" class="list-group-item list-group-item-action"> News </a>
              <a href="p_category.php" class="list-group-item list-group-item-action active"> Payment category </a>
              <a href="p_purpose.php" class="list-group-item list-group-item-action"> Payment Purpose </a>            
            </div>
          </div>

   				<!-- main content -->
   				<div class="col-md-8 py-5">              
              <?php if(isset($_GET['del'])): ?>
                  <div class="alert alert-light alert-dismissible fade show" role="alert">
                    <button type="button" class="close bg-dark m-1" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="alert-heading text-center"> DELETE <?php echo $action['category']; ?> </h4>
                    <hr/>
                    <p> <strong> ARE YOU SURE ? </strong></p>
                    <hr/>

                    <a href="action.php?del_category=<?php echo $action['id']; ?>" class=" btn btn-success alert-link"> CONFIRM </a>.
                 </div>
              <?php endif; ?>


              <?php if(isset($_GET['edit'])): ?>
                  <div class="alert alert-light alert-dismissible fade show" role="alert">
                    <button type="button" class="close bg-dark m-1" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="alert-heading text-center"> EDIT <?php echo $action['category']; ?> </h4>
                    <hr/>
                   
                        <form method="post" action="action.php">
                          <div class="form-group">
                            <label for="p-purpose" class="form-control-label">Purpose</label>
                            <input type="text" name="p-category" class="form-control" value="<?php echo $action['category']; ?>" required>
                          </div>
                          
                          <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $action['id']; ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="alert">Close</button>
                            <button type="submit" name="edit_category" class="btn btn-primary"> Edit </button>
                          </div>
                       </form>
                  </div>
              <?php endif; ?>



               <!-- latest users on medium screens and above -->
                <div class="card d-sm-block">
                    <div class="card-header text-center">
                        <p> PAYMENT PURPOSE </p>
                    </div>
                    <div class='card-body py-3 px-3 '>
                        
                        <table>
                            <thead>
                                <th>Category</th>
                                <th></th>
                                <th></th>
                            </thead>
                            
                            <?php while($result = mysqli_fetch_array($query)): ?>
                            
                            <tr>
                                <td><?php echo $result['category']; ?></td>
                                <td>
                                  <a href="p_category.php?edit=<?php echo $result['id']; ?>" class="btn bg-light text-dark">Edit</a>
                                </td>
                                <td>  
                                  <a href="p_category.php?del=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a> 
                                </td>
                            </tr>
                          <?php endwhile; ?>
                        </table>
                    </div>

                </div>
               
   				</div> <!-- col-md-8 :ends -->








   			</div>
   		</div>
   	</div>
   <!-- content : ends -->






<?php require_once("footer.php"); ?>

  