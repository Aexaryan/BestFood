<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Registration</title>
    <link rel="stylesheet" href="Styles.css">
    <?php include '../Home.php'; ?>
</head>
<body>
    <?php
    require '../db.php'; // Include your database connection file

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO buyers (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Buer registration successful";
            header("Location: buyer_login_form.php"); // Redirect to the login form
            exit(); // Ensure that no more code is executed after the redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <form action="buyer_registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Register">
        <p>Login <a href="../Buyer/buyer_login_form.php">Here</a> </p>
    </form>
</body>
<?php include '../include/global_footer.php'; ?>
</html>
