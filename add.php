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
<?php include_once 'header.php';?>
<body>
    <?php

    $sql = "SELECT * FROM products";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();

    $users = $getUsers->fetchAll();
    
    ?>

    <div class="d-flex" style="height: 100vh;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="dashboard.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid"></use>
                        </svg>
                        Add products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle"></use>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
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