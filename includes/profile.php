<?php
// Define function to display employee profile
// Define global variables
$array1 = array();
$array2 = array();
// Define function to display employee profile
function display_employee_profile(){
    // Check if form is submitted
    if ( isset( $_POST['submit'] ) && isset( $_POST['field'] ) ) {
        $chosen_fields = $_POST['field'];
        $length = count( $chosen_fields );
        $midpoint = ceil($length / 2);
        // Split the original array into two arrays
        global $array1, $array2; // Declare the global variables
        $array1 = array_slice($chosen_fields, 0, $midpoint);
        $array2 = array_slice($chosen_fields, $midpoint);
        return array($array1, $array2); // Return the populated arrays
    }
}
// Call the function and assign returned arrays to $array1 and $array2
list($array1, $array2) = display_employee_profile();
require 'fields.php';
   
?>
