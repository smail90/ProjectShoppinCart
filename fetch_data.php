<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart on Data</title>
 
</head>
<body>
  <div class="container">
    <!-- Your existing HTML content here -->

    <form action="cartshopping.php" method="post">
      <label for="product_name">Entre your Product Name:</label>
      <input type="text" name="product_name" id="product_name" required><br>

      <label for="price">Write your Price:</label>
      <input type="number" name="price" id="price" required><br>

      <label for="quantity">Quantity:</label>
      <input type="number" name="quantity" id="quantity" required><br>

      <input type="submit" value="Submit">
    </form>
    </div>


    <style>
        
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


form {
    margin-top: 189px;
    margin-left: 500px;
    width: 331px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 7px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="number"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}


.container {
  margin: 20px;
}





    </style>

    

    <script src="cartshopping.js"></script>
  
</body>
</html>




