<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="Password" required>

           <label for="confirm_password">Confirm Password:</label>
           <input type="password" id="confirm_password" name="ConfirmPassword" required>

            <button type="submit">Sign Up</button>
        </form>
    </div>
     
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.signup-container {
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    padding: 20px;
    width: 300px;
}

h1 {
    text-align: center;
}

label,
input {
    display: block;
    width: 100%;
    margin-bottom: 10px;
}

input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-left: -10px;
}

button {
    background-color: #673AB7;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
    width: 100%;
    margin-left: 5px;
    
}

button:hover {
    background-color: blue;
}

    </style>

</body>
</html>