<?php

//try {
    $pdo = new PDO("mysql:host=localhost;dbname=shoppingcart", "root", "");
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "connected";
   // echo $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);

//} catch (PDOException $a) {
    //die("Error: couldn't connect to the database " . $a->getMessage());
//}


try {
    $sql = "INSERT INTO persons (Item_product, Item_Price, item_Quantity)
            VALUES (:Item_product , :Item_Price , :item_Quantity)";

    $stmt = $pdo->prepare($sql);

    $item_product = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
    $item_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $item_quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    $stmt->bindParam(":Item_product", $item_product);
    $stmt->bindParam(":Item_Price", $item_price);
    $stmt->bindParam(":item_Quantity", $item_quantity);

    $stmt->execute();

    // Style the success message using inline CSS
    echo '<div style="color: black; font-weight: bold; font-size: 18px; text-align: center; margin-top: 250px; padding: 10px; border: 2px solid green; border-radius: 5px;">Your information has been uploaded successfully.</div>';

} catch (PDOException $p) {
    die("Error: " . $p->getMessage());
}
/*
try {
  
  //$sql = "UPDATE persons SET Item_product= 'ismail Nait' WHERE id = 23 ";
  $sql = "DELETE FROM persons WHERE Item_product='sam nara' ";
  $pdo->exec($sql);
  //echo "Updated";
  echo "Deleted";

} catch (PDOException $p) {
  die("Error: " . $p->getMessage());
}



try {
    $sql = "SELECT*FROM persons ORDER BY Item_Price DESC ";
    $res=$pdo->query($sql);
          
  if ($res->rowCount()>0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Item_product</th>";
    echo "<th>Item_Price</th>";
    echo "<th>item_Quantity</th>";
    echo "</tr>";
    while ($row = $res->fetch()) {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>";
        echo "<td>".$row["Item_product"]."</td>";
        echo "<td>".$row["Item_Price"]."</td>";
        echo "<td>".$row["item_Quantity"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
  }else {
    echo "not Found";
  }

} catch (PDOException $p) {
    die("Error: " . $p->getMessage());
}

unset($pdo);
*/
?>

