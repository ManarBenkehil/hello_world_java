<?php
// Create database tables
function create_wpdb(){
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'Employee';
$sql = "CREATE TABLE " .$table_name."(
    email_address varchar(100)  NOT NULL,
    password varchar(100) NOT NULL,
    first_name varchar(100) NOT NULL,
    last_name varchar(100) NOT NULL,
    department varchar(100) NOT NULL,
    phone_number int(255) DEFAULT '',
    address varchar(200) DEFAULT '',
    age int(255) DEFAULT '',
    position varchar(200) DEFAULT '',
    spaciality varchar(200) DEFAULT '',
    reporting_structure varchar(200) DEFAULT '',
    employment_status varchar(50) DEFAULT '',
    office_location varchar(500) DEFAULT '',
    office_work_hours varchar(200) DEFAULT '',
    education_and_certifications longtext DEFAULT '',
    work_experience longtext DEFAULT '',
    skills_and_abilities longtext DEFAULT '',
    personal_interests longtext DEFAULT '',
    performance_metrics mediumtext DEFAULT '',
    security_clearances mediumtext DEFAULT '',
    projects_and_contributions longtext DEFAULT '',
    awards_and_recognition longtext DEFAULT '',
    professional_development_goals longtext DEFAULT '',
    volunteer_experience longtext DEFAULT '',
    PRIMARY KEY (email_address)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta($sql);

$table_name = $wpdb->prefix . 'employee_URLs';
$sql = "CREATE TABLE " .$table_name. "(
        id int(11) NOT NULL AUTO_INCREMENT,
        employee_email varchar(100) NOT NULL,
        URL varchar(255) NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (employee_email) REFERENCES $table_name (email_address) ON DELETE CASCADE ON UPDATE CASCADE
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta($sql);

}
?>
 