<?php

include("..\wp-config.php") ; 
session_start();
global $wpdb;

if (isset($_POST['login'])) { 
$email = $_POST['email'];
$password = $_POST['password']; 

$user = $wpdb->get_row(
   $wpdb->prepare(
      "SELECT * FROM employees WHERE email = %s AND password = %s",
      $email,
      $password
   )
);
//print_r($user) ;  

if ( $user ) {
   // Email and password exist in the "employee" table
    
   require 'profile2.php';
} else {
   // Email and password don't exist in the "employee" table
   echo " failed  " ; 

}
}


?> 