<?php
    define('DB_SERVER', 'dijkstra.ug.bcc.bilkent.edu.tr');
    define('DB_USERNAME', 's.suleymanli');
    define('DB_PASSWORD', '2AuhpXTH');
    define('DB_DATABASE', 's_suleymanli');
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$connection) {
        die("Error occured in the connection!" . mysqli_connect_error() . "!\n");
    }

    function dropTables($connection) {
        $drop_customer = "DROP TABLE IF EXISTS Customer";
        if (mysqli_query($connection, $drop_customer)) {
            echo "Table Customer removed successfully!\n";
        } else {
            echo "Error removing table Customer: " . mysqli_error($connection) . "!\n";
        }

        $drop_employee = "DROP TABLE IF EXISTS Employee";
        if (mysqli_query($connection, $drop_employee)) {
            echo "Table Employee removed successfully!\n";
        } else {
            echo "Error removing table Employee: " . mysqli_error($connection) . "!\n";
        }
        
        $drop_carrier = "DROP TABLE IF EXISTS Carrier";
        if (mysqli_query($connection, $drop_carrier)) {
            echo "Table Carrier removed successfully!\n";
        } else {
            echo "Error removing table Carrier: " . mysqli_error($connection) . "!\n";
        }

        $drop_branch = "DROP TABLE IF EXISTS Branch";
        if (mysqli_query($connection, $drop_branch)) {
            echo "Table Branch removed successfully!\n";
        } else {
            echo "Error removing table Branch: " . mysqli_error($connection) . "!\n";
        }
    }
      
    // dropTables($connection);
    
    // sql to create customer table
    $customer_table = "CREATE TABLE Customer (
        customer_id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT,
        customer_username VARCHAR(15) NOT NULL,
        customer_password VARCHAR(255) NOT NULL,
        customer_name VARCHAR(30) NOT NULL,
        customer_address VARCHAR(50) NOT NULL,
        customer_phone VARCHAR(12) NOT NULL,
        PRIMARY KEY (customer_id)
    )";
        
    if (mysqli_query($connection, $customer_table)) {
        echo "Table Customer created successfully!\n";
    } else {
        // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    // sql to create branch table
    $branch_table = "CREATE TABLE Branch (
        branch_id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT,
        branch_name VARCHAR(30) NOT NULL,
        branch_address VARCHAR(30) NOT NULL,
        branch_phone VARCHAR(12) NOT NULL,
        is_central CHAR(1) NOT NULL,
        PRIMARY KEY (branch_id)
    )";
        
    if (mysqli_query($connection, $branch_table)) {
        echo "Table Branch created successfully!\n";
    } else {
        // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    // sql to create employee table
    $employee_table = "CREATE TABLE Employee (
        employee_id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT,
        employee_username VARCHAR(15) NOT NULL,
        employee_password VARCHAR(255) NOT NULL,
        employee_name VARCHAR(30) NOT NULL,
        employee_phone VARCHAR(12) NOT NULL,
        branch_id INT(6) UNSIGNED,
        PRIMARY KEY (employee_id),
        FOREIGN KEY (branch_id) REFERENCES Branch(branch_id)
    )";
        
    if (mysqli_query($connection, $employee_table)) {
        echo "Table Employee created successfully!\n";
    } else {
        // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    // sql to create carrier table
    $carrier_table = "CREATE TABLE Carrier (
        carrier_id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT,
        carrier_username VARCHAR(15) NOT NULL,
        carrier_password VARCHAR(255) NOT NULL,
        carrier_name VARCHAR(30) NOT NULL,
        carrier_phone VARCHAR(12) NOT NULL,
        branch_id INT(6) UNSIGNED,
        PRIMARY KEY (carrier_id),
        FOREIGN KEY (branch_id) REFERENCES Branch(branch_id)
    )";
        
    if (mysqli_query($connection, $carrier_table)) {
        echo "Table Carrier created successfully!\n";
    } else {
        // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }
?>

