<?php
 
// Define function to display employee profile
function display_employee_profile(){

    // Check if form is submitted
    if ( isset( $_POST['submit'] ) && isset( $_POST['fields'] ) ) {
        $chosen_fields = $_POST['fields'];
        update_option( 'chosen_fields', $chosen_fields );
        $chosen_fields_length = count( $chosen_fields );
    }

    // Get chosen fields from options table
    $chosen_fields = get_option( 'chosen_fields', array() );

echo '<style> 

    html, body {
    height: 100%;
    margin: 0;
    }
 
   .left-container {
    width: 50%;
    height: inherit;
    background-color:#000029;
    float: left
    }
 
   .right-container {
   width: 50%;
   height: inherit;
   background-color: white;
   float: right
   }
   .profile-pic {
        
        width: 200px;
        height: 290px;
        background: white url('sillouette.png') no-repeat center center;
        background-size: cover;
        position: relative;
        margin-top: 100px;
        margin-left: 200px;
        cursor: pointer;
        
 }
    .profile-pic input[type="file"] {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .profile-pic:hover .upload-icon {
        opacity: 0.8;
    }

    .profile-pic .upload-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        color: #fff;
        opacity: 0;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }
</style>';
//get the firstname, last name, email address, and department of the newly created employee
global $wpdb;
$results = $wpdb->get_results( "SELECT first_name, last_name, email_address, department FROM {$wpdb->prefix}Employee ORDER BY email_address DESC LIMIT 1" );

if ( $results ) {
    $first_name = $results[0]->first_name;
    $last_name = $results[0]->last_name;
    $email_address = $results[0]->email_address;
    $department = $results[0]->department;
}

echo '<div class="right-container">';
echo '  <div style="background-color: #000029; margin-top: 100px; margin-right: 60px; margin-left: 1px;">';
echo '    <h1 style="margin-left: 50px; padding: 20px 20px 20px 20px; color: #fff;">'.$first_name.' '.$last_name.'<br></h1>';
echo '  </div>';
echo '  <div style="background-color: #fff; margin-top: 100px; margin-right: 60px; margin-left: 1px;">';
echo '    <h1 style="margin-left: 50px; padding: 20px 20px 20px 20px; color: #fff;">'.$department.'<br></h1>';
echo '  </div>';
echo '  <div style="background-color: #fff; margin-left: 40px; margin-right: 60px;">';
echo '    <i class="material-icons" style="color: #000029">email</i>';
echo '    <input type="text">';
echo '    <br><br>';
echo '    <i class="material-icons" style="color: #000029">phone</i>';
echo '    <input type="text">';
echo '    <br><br>';
echo '    <i class="material-icons" style="color: #000029">place</i>';
echo '    <input type="text">';
echo '  </div>';
echo '</div>';

echo '<div class="left-container">';
echo '  <div class="profile-pic">';
echo '    <input type="file" id="profile-pic-input">';
echo '    <span class="upload-icon">&#x2193;</span>';
echo '  </div>';
echo '  <br><br><br>';

     
    $half_length = ceil( $chosen_fields_length / 2 );
    // Loop through the first half of the $chosen_fields array
    for ( $i = 0; $i < $half_length; $i++ ) {
        $field = $chosen_fields[$i];
        
        echo '<div>';
        echo '<h1 style="color:#fff; margin-left: 100px;">' . $field . '<br></h1>';
        echo '<textarea name="field" cols="60" rows="50" style="margin-left: 100px; color: #999; background-color: #000029"></textarea>';
        echo '</div>';
    }
    echo '</div>

    <div class="right-container">
      <div style="background-color: #000029; margin-top: 100px; margin-right: 60px; margin-left: 1px;"> 
        <h1 style="margin-left: 50px; padding: 20px 20px 20px 20px; color: #fff;">'.$first_name.' &nbsp; '.$last_name.'<br></h>
      </div>
      <div style="background-color: #fff; margin-right: 60px; margin-left: 1px;"> 
        <h1 style="margin-left: 50px; padding: 20px 20px 20px 20px; color: #fff;">'.$department.'<br></h>
      </div>
      <div style="background-color: #fff; margin-left: 40px; margin-right: 60px;">
        <i class="material-icons" style="color: #000029">email</i>
        <input type="text">
        <br><br>
        <i class="material-icons" style="color: #000029">phone</i>
        <input type="text">
        <br><br>
        <i class="material-icons" style="color: #000029">place</i>
        <input type="text">
      </div>
    </div>';
    
    
    // Loop through the second half of the $chosen_fields array
    for ( $i = $half_length; $i < $chosen_fields_length; $i++ ) {
        $field = $chosen_fields[$i];
        
        echo '<div>';
        echo '<h1 style="color:#fff; margin-left: 100px;">' . $field . '<br></h1>';
        echo '<textarea name="field" cols="60" rows="50" style="margin-left: 100px; color: #999; background-color: #000029"></textarea>';
        echo '</div>';
    }
}
?>
