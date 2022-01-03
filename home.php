<?php
//inclusion of config.php
include("config.php");
session_start();
 
// Check if the user is logged in, if not then redirect him to sign in page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // $product_id = $_POST['pid'];
    // $customer_id = $_SESSION['id'];

    // // Update the quantity of the purchase
    // $update_quantity = "UPDATE buy SET quantity = quantity + 1 WHERE pid='$product_id' AND cid='$customer_id'";
    // $resultUpdateQuantity = mysqli_query($connection, $deletion_query);

    // if (!$resultUpdateQuantity) {
    //     printf("Error Occured: %s\n", mysqli_error($connection));
    //     exit();
    // }

    // // Get the price of the purchased product
    // $get_price = "SELECT price FROM products WHERE pid='$product_id'";
    // $resultGetPrice = mysqli_query($connection, $deletion_query);
    // $product_row = mysqli_fetch_array($resultGetPrice);
    // $price = $product_row['price'];

    // if (!$resultGetPrice) {
    //     printf("Error Occured: %s\n", mysqli_error($connection));
    //     exit();
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body { font: 18px nato-sans; }
        .title {
            margin: 20px 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel container-fluid">
        <h3 class="title" style="font-weight: bold;">Customers</h3>
        <?php

        // Query to get all the customers
        $query = "SELECT customer_id, customer_username, customer_name, customer_phone FROM Customer";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            printf("Error: %s\n", mysqli_error($connection));
            exit();
        }

        echo "<table class=\"table table-lg table-striped\">
            <tr>
            <th>Customer ID</th>
            <th>Customer Username</th>
            <th>Customer Name</th>
            <th>Customer Phone</th>
            <th>Action</th>
            </tr>";

        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['customer_id'] . "</td>";
            echo "<td>" . $row['customer_username'] . "</td>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['customer_phone'] . "</td>";
            // Button does not work, it is just for reuse
            echo "<td> 
                    <form action=\"\" METHOD=\"POST\">
                        <button type=\"submit\" class=\"btn btn-success btn-sm\" value =" . $row['customer_id'] . ">Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </div>
</div>



</body>
</html>

