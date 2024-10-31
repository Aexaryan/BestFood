<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <title>Your Website Title</title>

    <style>
    body {
        margin: 0; /* Remove default margin of the body */
        font-family: Arial, sans-serif; /* Add a default font-family */
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        length:15px;
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        display: flex;
    }

    nav {
        display: flex;
        justify-content: flex-start;
        padding: 5px;
        flex-grow: 1;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        margin: 0 10px;
    }

    .login_header {
        display: flex;
        justify-content: flex-end;
        align-items: center; /* Align items vertically in the center */
        background-color: #555;
        padding: 10px;
        flex-grow: 1; /* Allow the user_name to take the available space */
    }

    .user_name {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        margin: 0 10px;
        border-right: 1px solid #fff;
        flex-grow: 1; /* Allow the user_name to take the available space */
    }

    .admin_name {
        margin-right: 20px; /* Adjust the space between admin name and logout */
        padding: 10px;
    }
</style>

</head>
<body>
    <!-- Your header content goes here -->

    <header>
        <nav>
            <a href="#">Home</a>
            <a href="../about.php">About</a>
            <a href="#">Contact</a>
        </nav>
        <?php include 'Aut.php'; ?>
    </header>

    <!-- Your body content goes here -->
</body>
</html>
