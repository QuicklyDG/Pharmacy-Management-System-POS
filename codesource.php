(addstock)
<?php
// database connection
$conn = mysqli_connect("localhost", "user", "password", "dbname");

// check if the form has been submitted
if(isset($_POST['add_stock'])){
    // retrieve the data from the form
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // update the stock in the database
    $query = "UPDATE products SET stock = stock + '$quantity' WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);

    // check if the query was successful
    if($result){
        // redirect the user to the product list page
        header("Location: product_list.php");
    } else {
        // display an error message if the query failed
        echo "Error: " . mysqli_error($conn);
    }
}

// close the database connection
mysqli_close($conn);
?>
<html>
<head>
    <title>Add Stock</title>
</head>
<body>
    <h1>Add Stock</h1>
    <form action="" method="post">
        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">
        <input type="submit" name="add_stock" value="Add Stock">
    </form>
</body>
</html>
Note: The code above assumes that you have a table named "products" in your database with columns for "id", "product_name", and "stock". The form allows the user to enter the quantity of new stock to be added, and the code updates the stock in the database when the form is submitted. The user is then redirected to the product list page.



(red when expired)
<?php
// database connection
$conn = mysqli_connect("localhost", "user", "password", "dbname");

// retrieve the data from the products table
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// check if the query was successful
if($result){
    // create the table header
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Expiration Date</th>";
    echo "</tr>";

    // loop through the result set and create the table rows
    while($row = mysqli_fetch_assoc($result)){
        // compare the current date to the expiration date
        $expiration_date = strtotime($row['expiration_date']);
        $today = strtotime(date('Y-m-d'));
        if($today > $expiration_date){
            // if the product has expired, mark it in red
            echo "<tr style='color:red'>";
        } else {
            // if the product has not expired, leave it black
            echo "<tr>";
        }
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>" . $row['expiration_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // display an error message if the query failed
    echo "Error: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
Note: The code above assumes that you have a table named "products" in your database with columns for "product_name" and "expiration_date"





(notif expired)
<?php
// database connection
$conn = mysqli_connect("localhost", "user", "password", "dbname");

// retrieve the data from the products table
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// check if the query was successful
if($result){
    // loop through the result set
    while($row = mysqli_fetch_assoc($result)){
        // compare the current date to the expiration date
        $expiration_date = strtotime($row['expiration_date']);
        $today = strtotime(date('Y-m-d'));
        if($today > $expiration_date){
            // if the product has expired, send a notification
            $to = "email@example.com";
            $subject = "Expired Medicine: " . $row['product_name'];
            $message = "The product '" . $row['product_name'] . "' has expired on " . $row['expiration_date'] . ".";
            $headers = "From: pharmacy_management_system@example.com";
            mail($to, $subject, $message, $headers);
        }
    }
} else {
    // display an error message if the query failed
    echo "Error: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
Note: The code above assumes that you have a table named "products" in your database with columns for "product_name" and "expiration_date". The mail() function is used to send the notifications, and it assumes that you have a working mail server configured on your server.





(logs)
<?php
// database connection
$conn = mysqli_connect("localhost", "user", "password", "dbname");

// retrieve the data from the form
$staff_id = $_SESSION['staff_id'];
$event = $_POST['event'];

// log the event in the database
$query = "INSERT INTO logs (staff_id, event) VALUES ('$staff_id', '$event')";
$result = mysqli_query($conn, $query);

// check if the query was successful
if($result){
    // redirect the user to the home page
    header("Location: home.php");
} else {
    // display an error message if the query failed
    echo "Error: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>

Note: The code above assumes that you have a table named "logs" in your database with columns for "staff_id", "event", and "timestamp". It also assumes that you have a session variable named "staff_id" that stores the ID of the current staff member. The code logs the event entered by the staff member in the logs table, along with the ID of the staff member and the timestamp of the event. The user is then redirected to the home page




(remove purchase)
<?php
// database connection
$conn = mysqli_connect("localhost", "user", "password", "dbname");

// retrieve the products from the cart
$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);

// check if the query was successful
if($result){
    // loop through the products in the cart
    while($product = mysqli_fetch_assoc($result)){
        // mark the product as checked out
        $update_query = "UPDATE products SET checked_out = 1 WHERE id = '$product[id]'";
        mysqli_query($conn, $update_query);
    }

    // clear the cart
    $clear_query = "DELETE FROM cart";
    mysqli_query($conn, $clear_query);

    // redirect the user to the receipt page
    header("Location: receipt.php");
} else {
    // display an error message if the query failed
    echo "Error: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
Note: The code above assumes that you have a table named "products" in your database with columns for "id", "name", "price", and "checked_out". It also assumes that you have a table named "cart" that stores the products that the customer has added to their cart. The code loops through the products in the cart and marks each product as checked out by updating the "checked_out" column in the "products" table. After all the products have been marked as checked out, the cart is cleared. Finally, the user is redirected to the receipt page.

To remove a checked product, you can simply update the "checked_out" column in the "products" table back to 0. You can add a button on the receipt page that allows the user to cancel the purchase and remove the checked products from the "products" table.