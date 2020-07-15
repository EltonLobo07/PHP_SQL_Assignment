<?php
    $id=$_POST["product_id"];
    $name=$_POST["product_name"];
    $price=$_POST["product_price"];
    $description=$_POST["product_desc"];
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="product_catlog";
    $conn=mysqli_connect($servername, $username, $password);
    if(!$conn)
        die("Connection failed: " . mysqli_connect_error());
    if(mysqli_select_db($conn,"product_catlog"))
       mysqli_close($conn);
    else{
        $query="CREATE DATABASE product_catlog";
        if (mysqli_query($conn,$query))
            echo "Database created succesfully<br>";
        else 
            echo "Error creating database: " . mysqli_error($conn);
        mysqli_close($conn);
    }
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
        die("Connection failed: " . mysqli_connect_error());
    $query="create table products(
        prod_id VARCHAR(20) NOT NULL,
        prod_name VARCHAR(100) NOT NULL,
        prod_price VARCHAR(50) NOT NULL,
        prod_desc VARCHAR(200)
    )";
    $conn->query($query);
    $query = "insert into products(prod_id,prod_name,prod_price,prod_desc) 
    VALUES('$id','$name','$price','$description')";
    $conn->query($query);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Deletion</title>
</head>
<body style="text-align:center;">
    <h1>Enter Product Id of the product to be deleted</h1>
    <form action="del_product.php" method="post">
        <input type="text" name="Id"><br><br>
        <input type="submit" value="Submit">
        <a href="index.html"><input type="button" value="Back"></a>
    </form> 
</body>
</html>