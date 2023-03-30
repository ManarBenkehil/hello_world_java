<?php
// Load WordPress environment
define( 'WP_USE_THEMES', false );
require_once( 'D:\wordpress\wordpress\wp-load.php' );

// Define function to display employee profile
function display_employee_profile(){

    // Check if form is submitted
    if ( isset( $_POST['submit'] ) && isset( $_POST['fields'] ) ) {
        $chosen_fields = $_POST['fields'];
        update_option( 'chosen_fields', $chosen_fields );
    }

    // Get chosen fields from options table
    $chosen_fields = get_option( 'chosen_fields', array() );

    // Loop through chosen fields and display them
    foreach ($chosen_fields as $field) {
        echo "<div class='profile-field'>";
        echo "<label>$field:</label>";
        echo "<input type='text' name='$field' placeholder='$field'>";
        echo "</div>";
    }
}

// Add CSS styles
echo "<style>
    .profile-field {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .profile-field label {
        width: 150px;
        font-weight: bold;
        margin-right: 10px;
    }

    .profile-field input[type=text] {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
</style>";

// Create database tables
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'Employee';
$sql = "CREATE TABLE $table_name(
    email_address varchar(100) not null,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    department varchar(100) not null,
    phone_number int(255),
    address varchar(200),
    age int(255),
    position varchar(200),
    spaciality varchar(200),
    reporting_structure varchar(200),
    employment_status varchar(50),
    office_location varchar(500),
    office_work_hours varchar(200),
    education_and_certifications longtext,
    membership mediumtext,
    work_experience longtext,
    skills_and_abilities longtext,
    training_and_development longtext,
    personal_interests longtext,
    performance_metrics mediumtext,
    security_clearances mediumtext,
    projects_and_contributions longtext,
    awards_and_recognition longtext,
    professional_development_goals longtext,
    volunteer_experience longtext,
    PRIMARY KEY (email_address)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

$table_name = $wpdb->prefix . 'employee_URLs';
$sql = "CREATE TABLE $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        employee_email varchar(100) NOT NULL,
        URL varchar(255) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (employee_email) REFERENCES $table_name (email_address) ON DELETE CASCADE ON UPDATE CASCADE
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

// Include HTML form
include 'fields.html';
?>
