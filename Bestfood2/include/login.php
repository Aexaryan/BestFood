<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>Login Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="bg">
        <!-- Background content goes here if needed -->
    </div>

    <main class="form-signin">
        <h1 class="h3">Login</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <!-- Email Input -->
            <div class="form-floating">
                <input type="text" class="form-control" name="username" required>
                <label for="floatingInput">Username</label>
            </div>

            <!-- Password Input -->
            <div class="form-floating">
                <input type="password" class="form-control" name="password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <!-- Sign In Button -->
            <button class="w-100 btn btn-lg" type="submit">Sign in</button>
        </form>

        <!-- Additional content with updated styles -->
        <p class="accounts">Don't have an account? <a href="../Buyer/buyer_registration_form.html" class="dark-blue-link">Sign up here</a></p>
        <p class="accounts">Login to the Admin Panel <a href="../Admin/admin_login_form.php" class="dark-blue-link">click here</a></p>
        <p class="accounts">Admin registration <a href="../Admin/admin_registration.php" class="dark-blue-link">click here</a></p>

    </main>

</body>

</html>

<?php
session_start(); // Start or resume a session

require 'include/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform buyer login verification (you may use session for authentication)

    // Example: Check if the buyer exists in the 'buyers' table
    $stmt = $conn->prepare("SELECT id, username, password FROM buyers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $buyer = $result->fetch_assoc();
        if (password_verify($password, $buyer['password'])) {
            // Buyer login successful
            // Set a session variable for buyer authentication
            $_SESSION['buyer_id'] = $buyer['id'];
            $_SESSION['buyer_username'] = $buyer['username'];

            // Redirect to the buyer dashboard
            header("Location: ../Buyer/buyer_dashboard.php");
            exit(); // Ensure that the script stops here to prevent further execution
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username";
    }

    $stmt->close();
}

$conn->close();
?>
