<?php

include_once 'config.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (title, description, quantity, price) VALUES (:title, :description, :quantity, :price)";
    $sqlQuery = $conn->prepare($sql);

    $sqlQuery->bindParam(":title", $title);
    $sqlQuery->bindParam(":description", $description);
    $sqlQuery->bindParam(":quantity", $quantity);
    $sqlQuery->bindParam(":price", $price);
    
    $sqlQuery->execute();

    echo "Data saved successfully! <br>";

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="description" placeholder="Description"><br>
        <input type="number" name="quantity" placeholder="Quantity"><br>
        <input type="number" name="price" placeholder="Price"><br>
        <input type="submit" name="submit"/>
    </form>
</body>
</html>