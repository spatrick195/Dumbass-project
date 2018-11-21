<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login</title>
    <style>
        .w3-card{
            width: 30%;
        }
    </style>
</head>
<body>
    <div id="login_modal" class="w3-modal">
        <div class="w3-modal-content w3-card w3-animate-zoom form">
            <header class="w3-container w3-teal">
                <h3>Login Form</h3>
            </header>

            <form class="w3-container" id="login_frm" action="/authenticate_admin" method="post">
                <div class="w3-section">
                    <label>
                        <b>Username</b>
                    </label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" name="username" required>
                    <label>
                        <b>Password</b>
                    </label>
                    <input id="password" class="w3-input w3-border w3-margin-bottom" type="password" name="password" required>
                    <?php
                    if (isset($_SESSION["message"])) {
                        if ($_SESSION["message"] == "unsuccessful") {
                            echo "<div class='w3-panel w3-red w3-padding-16'>Incorrect Username or Password!</div>";
                        }
                    }
                    ?>
                    <button class="w3-button w3-block w3-purple w3-section w3-padding">Login</button>
                </div>
            </form>
        </div>
    </div>

<script>
    document.getElementById('login_modal').style.display = 'block'
</script>

<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="/assets/js/register.js"></script>
</body>
</html>