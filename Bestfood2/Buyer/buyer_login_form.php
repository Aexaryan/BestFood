<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Login</title>
    <?php include '../Home.php'; ?>
    <link rel="stylesheet" href="../Buyer/Styles.css">
</head>

<body class="buyer-login-body">
    <form class="buyer-login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input class="buyer-input" type="text" name="username" required>
        <label for="password">Password:</label>
        <input class="buyer-input" type="password" name="password" required>
        <input class="buyer-submit-btn" type="submit" value="Login">
        <p class="buyer-signup-link">Don't have an account? <a href="buyer_registration.php">Sign up here</a></p>
        <p class="admin-login-link">Login to the Admin Panel <a href="../Admin/admin_login_form.php">click here</a></p>
        <p class="admin-registration-link">Admin registration <a href="../Admin/admin_registration.php">click here</a></p>
    </form>
</body>

<?php include '../include/global_footer.php'; ?>
<?php
    session_start(); // Start or resume a session

    require '../db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform buyer login verification (you may use session for authentication)

        // Example: Check if the buyer exists in the 'buyers' table
        $stmt = $conn->prepare("SELECT * FROM buyers WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $buyer = $result->fetch_assoc();
            if (password_verify($password, $buyer['password'])) {
                // Buyer login successful
                // Set a session variable for buyer authentication
                $_SESSION['buyer_id'] = $buyer['id']; // Assuming 'id' is your primary key
                $_SESSION['buyer_username'] = $buyer['username'];

                // Redirect to the next page
                header("Location: buyer_dashboard.php");
                exit(); // Ensure that the script stops here to prevent further execution
            } else {
                echo "";
            }
        } else {
            echo "";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
    
    <style>


    /* Body styles */
body.buyer-login-body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

/* Form styles */
form.buyer-login-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Input styles */
input.buyer-input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Submit button styles */
input.buyer-submit-btn {
    width: 100%;
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Link styles */
p.buyer-signup-link,
p.admin-login-link,
p.admin-registration-link {
    margin-top: 10px;
    text-align: center;
}

</style>




</html>
