<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="product_catlog";
    $id = $_POST['Id'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT prod_id FROM products";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $flag=0;
        while($row = mysqli_fetch_assoc($result)) {
            if($row["prod_id"]==$id)
                $flag=1;
        }
   }
   if($flag==1)
   {
        mysqli_query($conn,"DELETE FROM products WHERE prod_id = ".$id);
        echo "Product with Product Id: ".$id." was deleted successfully.";
    }
    else
        echo "Product with Product Id: ".$id." not found.";
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