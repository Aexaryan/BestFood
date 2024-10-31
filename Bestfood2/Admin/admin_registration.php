<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../Admin/Styles.css">
    <?php include '../Home.php'; ?>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Register">
        <p> User Login <a href="../Buyer/Buyer_login_form.php">Here</a> </p>
    </form>

    <?php
    require '../db.php'; // Include your database connection file

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Admin registration successful";
            header("Location: admin_login_form.php"); // Redirect to the login form
            exit(); // Ensure that no more code is executed after the redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
<?php include '../include/global_footer.php'; ?>
</html>
