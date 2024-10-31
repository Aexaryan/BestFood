<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../Admin/Styles.css">
    <?php include '../Home.php'; ?>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
        <p> User Login <a href="../Buyer/buyer_login_form.php">Here</a>
    </form>

    <?php
    session_start(); // Start or resume a session

    require '../db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform admin login verification (you may use session for authentication)

        // Example: Check if the admin exists in the 'admins' table
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                // Admin login successful
                // Set a session variable for admin authentication
                $_SESSION['admin_username'] = $admin['username'];
                $_SESSION['admin_name'] = $admin['name']; // Assuming there's a 'name' column in your 'admins' table

                // Redirect to the next page
                header("Location: admin_dashboard.php");
                exit(); // Ensure that the script stops here to prevent further execution
            } else {
                echo "Invalid password";
            }
        } else {
            echo "";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
<?php include '../include/global_footer.php'; ?>
</html>
