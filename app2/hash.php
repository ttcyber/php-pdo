<?php

     $password = "123456";
     $hash1 = password_hash($passwod, PASSWORD_DEFAULT);
     $hash2 = password_hash($passwod, PASSWORD_BCRYPT);
     $hash3 = password_hash($passwod, CRYPT_BLOWFISH);
     $hash4 = password_hash($password, PASSWORD_DEFAULT, ['cost' => 13]);
     $hashed_password = "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";
	echo "<hr />";
	echo $hash1;
    echo "<hr />";
	echo $hash2;
	echo "<hr />";
	echo $hash3; 
	echo "<hr />";
	echo $hash4; 

?>

<br /><br />
PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of PHP 5.5.0). 
Note that this constant is designed to change over time as new and stronger algorithms are added to PHP. 
For that reason, the length of the result from using this identifier can change over time. 
Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).
PASSWORD_BCRYPT - Use the CRYPT_BLOWFISH algorithm to create the hash. This will produce a standard crypt() compatible hash using the "$2y$" identifier. The result will always be a 60 character string, or FALSE on failure.
