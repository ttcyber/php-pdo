<?php
require_once 'db.php';

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
   if($uname=="") {
      $error[] = "provide username !"; 
   }
   else if($umail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['user_email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($fname,$lname,$uname,$umail,$upass)) 
            {
                $user->redirect('adduser.php?joined');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>

<head>

<title>Sign up</title>
<link rel="stylesheet" href="css/custom.css" type="text/css"  />
</head>
<body>

        <form method="post">
            <h2>Sign up.</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {                  
                      echo $error; 
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
               Successfully registered <a href='index2.php'>login</a> 
            <?php
            }
            ?>
            <input type="text" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
            <input type="text"  name="txt_umail" placeholder="Enter E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
            <input type="password" name="txt_upass" placeholder="Enter Password" />
            <button type="submit" name="btn-signup">REGISTER</button>
            <br />
           have an account ! <a href="index2.php">Sign In</a></label>
        </form>


</body>
</html>
