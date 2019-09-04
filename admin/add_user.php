<?php require_once ("../includes/initialize.php"); ?>
<?php require_once ("../assets/layouts/header.php"); ?>
<?php  $userId = $_SESSION['userId']; ?> 

<?php
    if(!$session->is_logged_in()):
        header("Location: login.php");
        exit();  
    endif;
?>

<?php $message = " "; ?>
<?php
    if(isset($_POST['submit'])):
        $user = new User();
        $user->first_name = $database->escape_string($_POST['firstname']);
        $user->last_name = $database->escape_string($_POST['lastname']);
        $user->password = $database->escape_string($_POST['password']);
        $user->username = $database->escape_string($_POST['username']);

        if($user->create()){
            $message = "User Added";
        }
        else{
            $message = "Opereation not successful";
        }
    endif;
?>

<form action="add_user.php" method="post">
    <?php echo $message; ?>
    <br/>
    <h2>Add User</h2>
    <br/>
    firstname <input type="text" name="firstname" placeholder="Firstname" />
    <br/><br/>
    lastname <input type="text" name="lastname" placeholder="Lastname" />
    <br/><br/>
    username <input type="text" name="username" placeholder="username" />
    <br/><br/>
    password <input type="password" name="password" placeholder="password" />
    <br/><br/>
    <input type="submit" name="submit" value="submit" />
    <br/><br/>
</form>




<?php require_once ("../assets/layouts/footer.php"); ?>
		