<?php
    define('DB_SERVER', 'dijkstra.ug.bcc.bilkent.edu.tr');
    define('DB_USERNAME', 'bartu.teber');
    define('DB_PASSWORD', '3gpT2UZ5');
    define('DB_DATABASE', 'bartu_teber');
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

    $takes_table = "CREATE TABLE Takes (
        package_id int NOT NULL,
        employee_id int NOT NULL,
        Courier_id int NOT NULL,
        primary key (package_id, employee_id, Courier_id),
        foreign key (package_id) references Package,
        foreign key (employee_id) references Employee,
        foreign key (Courier_id) references Courier
        )";
        
    if (mysqli_query($connection, $takes_table)) {
        echo "Table Takes created successfully!\n";
    } else {
        // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }


    $sends_table = "CREATE TABLE Sends (
        package_id int NOT NULL,
        customer_id int NOT NULL,
        primary key (package_id, customer_id),
        foreign key (package_id) references Package,
        foreign key (customer_id) references Customer
        )";
            
    if (mysqli_query($connection, $sends_table)) {
        echo "Table Sends created successfully!\n";
    } else {
            // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    $receives_table = "CREATE TABLE Receives (
        package_id int NOT NULL,
        customer_id int NOT NULL,
        primary key (package_id, customer_id),
        foreign key (package_id) references Package,
        foreign key (customer_id) references Customer
    )";
            
    if (mysqli_query($connection, $receives_table)) {
        echo "Table Receives created successfully!\n";
    } else {
            // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    $c_delivers_table = "CREATE TABLE c_delivers (
        package_id int NOT NULL,
        customer_id int NOT NULL,
        primary key (package_id, customer_id),
        foreign key (package_id) references Package,
        foreign key (customer_id) references Customer
        )";
            
    if (mysqli_query($connection, $c_delivers_table)) {
        echo "Table c_deliver created successfully!\n";
    } else {
            // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    $delivers_table = "CREATE TABLE Delivers (
        package_id int NOT NULL,
        carrier_id int NOT NULL,
        primary key (package_id, carrier_id),
        foreign key (package_id) references Package,
        foreign key (carrier_id) references Carrier
        )";
            
    if (mysqli_query($connection, $delivers_table)) {
        echo "Table delivers created successfully!\n";
    } else {
            // echo "Error creating table: " . mysqli_error($connection) . "!\n";
    }

    $branch_insert = " INSERT INTO Branch (branch_name, branch_address, branch_phone, is_central)
    VALUES ('Ankara', 5056236451, y);";

    if (mysqli_query($connection, $branch_insert)) {
        echo "Branch is inserted successfully!\n";
    } else {
            // echo "Error inserting: " . mysqli_error($connection) . "!\n";
    }

    
    



?>