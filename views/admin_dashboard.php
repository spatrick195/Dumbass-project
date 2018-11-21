<?php
if (!isset($_SESSION["loggedin"]) && !($_SESSION["loggedin"])) {
    unset($_SESSION['message']);
    header("Location: /login_form");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin Dahboard</title>
</head>
<body>
    <nav class="w3-bar w3-flat-concrete w3-border-bottom w3-margin-bottom">
        <a href="/admin/dashboard" class="w3-bar-item w3-button">
            <strong>Admin Dashboard</strong>
        </a>
        <div class="w3-dropdown-hover w3-right">
            <button class="w3-button">Admin</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="/logout" class="w3-bar-item w3-button">Logout</a>
            </div>
        </div>
    </nav>
    <h1>ADMIN DASHBOARD AREA</h1>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</body>
</html>