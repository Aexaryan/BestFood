<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>

    <style>
   

    .custom-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        display: flex;
        
     
    }

    .custom-nav {
        display: flex;
        justify-content: flex-start;
        padding: 5px;
        flex-grow: 1;
    }

    .custom-nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        margin: 0 10px;
    }

    .custom-nav a:hover {
       
        text-decoration: underline;
    }

    .custom-login {
        display: flex;
        justify-content: flex-end;
        align-items: center; /* Align items vertically in the center */
        padding: 5px;
    }

    .custom-login button {
        text-decoration: none;
        color: #fff;
        background-color: #4caf50;
        border: none;
        padding: 7px 17px;
        margin-top: -4px;
        margin-right: 20px;/* Adjust the margin-right to move the button to the left */
        border-radius: 5px;

        
}

    .custom-login button:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>

    <!-- Your header content goes here -->
    <header class="custom-header">
        <nav class="custom-nav">
        <a href="http://localhost:8080/Ass2v1/index.php">Home</a>
        <a href="http://localhost:8080/Ass2v1/about.php">About</a>
        </nav>

        <!-- Your login button goes here -->
        <div class="custom-login">
            <!-- Login button -->
            <button onclick="location.href='Buyer/buyer_login_form.php'">Login</button>
        </div>
    </header>

</body>
</html>
