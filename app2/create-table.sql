CREATE DATABASE `app` ;
CREATE TABLE `app`.`users` (
   `user_id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
   `user_name` VARCHAR( 255 ) NOT NULL ,
   `user_email` VARCHAR( 60 ) NOT NULL ,
   `user_pass` VARCHAR( 255 ) NOT NULL ,
    UNIQUE (`user_name`),
    UNIQUE (`user_email`)
) ENGINE = MYISAM ;

grant all privileges on app.* TO 'appuser'@'localhost' IDENTIFIED BY 'password'; 
