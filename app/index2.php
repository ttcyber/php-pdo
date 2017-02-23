<?php
require_once 'db.php';

if($user->is_loggedin()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname_email'];
 $umail = $_POST['txt_uname_email'];
 $upass = $_POST['txt_password'];
  
 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('home.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login </title>
<link rel="stylesheet" href="css/custom.css" type="text/css"  />
</head>
<body>
        <form method="post">
           Sign in.<hr />
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text"   name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
             <input type="password" name="txt_password" placeholder="Your Password" required />
          
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                </button>
            </div>
            <br />
            <a href="sign-up.php">Sign Up</a>
        </form>


</body>
</html>
