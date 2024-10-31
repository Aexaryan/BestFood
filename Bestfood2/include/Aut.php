<?php
// Start the session at the beginning of the script
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require '../db.php';

// Check if the user is authenticated
if (isset($_SESSION['admin_username']) && !empty($_SESSION['admin_username'])) {
    $userType = 'admin';
    $username = $_SESSION['admin_username'];
} elseif (isset($_SESSION['buyer_username']) && !empty($_SESSION['buyer_username'])) {
    $userType = 'buyer';
    $username = $_SESSION['buyer_username'];
} else {
    // Redirect to the login page if neither admin nor buyer is authenticated
    header("Location: ../Buyer/buyer_login_form.php");
    exit();
}

// Use prepared statements to prevent SQL injection
if ($userType === 'admin') {
    $sql = "SELECT * FROM admins WHERE username = ?";
} else {
    $sql = "SELECT * FROM buyers WHERE username = ?";
}

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Check if there are rows in the result
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
       
        echo '<div style="display: flex; justify-content: space-between; align-items: center;">';
echo '<p style="font-size: 16px; color: #fff; font-weight: bold; margin-top: 10px; margin-right: 20px;">Welcome ' . $row['username'] . '</p>';
echo '<a href="../include/logout.php" style="text-decoration: none; color: #fff; background-color: #4caf50; padding: 5px 10px; border-radius: 5px; margin-top: -4px; margin-right: 20px;">Logout</a>';
echo '</div>';
        

    }
}
?>
