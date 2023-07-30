<?php

try {
    // Establishing a connection to MySQL
    $pdo = new PDO("mysql:host=localhost;dbname=shoppingcart", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. ";
    echo "Connection status: " . $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    // SQL query to create the table 'logine' if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS logine (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        UserName VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL
    )";

    // Executing the query
    $pdo->exec($sql);

    // echo "Table 'logine' created successfully (if it didn't exist).";
} catch (PDOException $a) {
    die("Error: couldn't connect to the database " . $a->getMessage());
}

try {
    $sql = "INSERT INTO logine (UserName, Password)
            VALUES (:UserName , :Password)";

    $stmt = $pdo->prepare($sql);

    // $UserName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $UserName = $_POST['username'];
    $Password = $_POST['password'];
    // $Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $stmt->bindParam(":UserName", $UserName);
    $stmt->bindParam(":Password", $Password);

    $stmt->execute();

    // Style the success message using inline CSS
    echo '<div style="color: black; font-weight: bold; font-size: 18px; text-align: center; margin-top: 250px; padding: 10px; border: 2px solid green; border-radius: 5px;">Your Account Is Login successfully.</div>';

} catch (PDOException $p) {
    die("Error: " . $p->getMessage());
}

?>





