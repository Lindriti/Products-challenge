<?php

    require_once 'config.php';

    $id = $_POST['id'];
    $title =  $_POST['title'];
    $description =  $_POST['description'];
    $quantity =  $_POST['quantity'];
    $price =  $_POST['price'];
    var_dump($_POST);

    $sql = "UPDATE products SET title=:title, description=:description, quantity=:quantity, price=:price WHERE id=:id";

    $prep = $conn->prepare($sql);

    $prep->bindParam(":id", $id);
    $prep->bindParam(":title", $title);
    $prep->bindParam(":description", $description);
    $prep->bindParam(":quantity", $quantity);
    $prep->bindParam(":price", $price);

    $prep->execute();

    header("Location:dashboard.php");
