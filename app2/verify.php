<?php
	echo "hash = ";
  $password = "123456";
     $hash = password_hash($passwod, PASSWORD_DEFAULT);
     $hashed_password = "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";

     /*
     "123456" will become "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa"
     */ 
echo "hash check 2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa <hr/> <br />";
  if(password_verify($password, $hash)){echo "verify = true";}else{echo "false";}


	echo "<hr />verify = ";
     $password = "123456";
     $hashed_password = "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";
     password_verify($password, $hashed_password);
     echo "<hr />";
          echo  "password_verify($password, $hashed_password)";
     echo "<hr /> ";

          echo  "password_verify($password, $hashed_password)";
          echo "<hr />";
          
          if(password_verify($password, $hash)){echo "verify";}else{echo "false";}
     /*
      if the password match it will return true.
     */ 

?>
