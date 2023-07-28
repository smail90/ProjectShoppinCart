<?php
try {
    //// إنشاء اتصال بـ MySQL
    $pdo = new PDO("mysql:host=localhost;dbname=shoppingcart", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. ";
    echo "Connection status: " . $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    // sti3lam SQL ndero jadwal ila kan
    $sql = "CREATE TABLE IF NOT EXISTS signup (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        Username VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL,
        ConfirmPassword VARCHAR(255) NOT NULL
    )";

    // tanfid sti3lam
    $pdo->exec($sql);

    echo "Table 'signup' created successfully (if it didn't exist).";
} catch (PDOException $a) {
    die("Error: couldn't connect to the database " . $a->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Data tvalida w trita
    $UserName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $Email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    if (!$UserName || !$Email || !$Password || !$ConfirmPassword || $Password !== $ConfirmPassword) {
        die("Error: Please provide valid input for all fields.");
    }

    // filter password 9bl mandkhloha database
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    try {
           // 3amaliyat idkhal bayanat f jadwal signup
        $sql = "INSERT INTO signup (UserName, Email, Password, ConfirmPassword)
                VALUES (:UserName , :Email, :Password, :ConfirmPassword)";
        // tajhiz st3lam tanfiid
        $stmt = $pdo->prepare($sql);
         //rabt motaghayer $username ..... bsti3lam
        $stmt->bindParam(":UserName", $UserName);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Password", $hashedPassword);
        $stmt->bindParam(":ConfirmPassword", $hashedPassword);
        //khdam st3lam
        $stmt->execute();

        // tawjih user ila safhat najah min ba3d mni dakhal bayanat dyalo
        header("Location: success.php");
        exit;
    } catch (PDOException $p) {
        die("Error: " . $p->getMessage());
    }
}
?>

