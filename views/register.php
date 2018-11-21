<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Register</title>
    <style>
        .w3-card{
            width: 40%;
            margin-top:60px;
        }
        .w3-section{
            padding: 0 10px 5px 10px;
        }

    </style>
</head>
<body>
    <div id="registration_modal" class-"w3-modal">
        <div class="w3-modal-content w3-card w3-animate-zoom form">
            <header class="w3-container w3-teal">
                <h3>Team Admin Registration Form</h3>
            </header>
            <form class="w3-section" id="register_frm" action="/register" method="post">
                <div class="w3-section">
                    <label>
                        <b>Username</b>
                    </label>
                    <input id="username" class="w3-input w3-border w3-margin-bottom" type="text" name="username" onkeyup="checkUserExists(); return false;" required>
                    <label>
                        <b>Team Names</b>
                    </label>
                    <input class="w3-input w3-border w3-margin-bottom" type="tet" name="team" required>
                    <label>
                        <b>Password</b>
                    <label>
                    <input id="password" class="w3-input w3-border w3-margin-bottom" type="password" name="password" required>
                    <label>
                        <b>Confirm Password</b>
                    </label>
                    <input id="password2" class="w3-input w3-border w3-margin-bottom" type="password" name="password2" onkeyup="checkPasswordsMatch(); return false;" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
                    <?php
                    if (isset($_SESSION["message"])) {
                        if ($_SESSION["message"] == "Username exists") {
                            echo "<div class='w3-panel w3-red w3-padding-16'>The username already exsits!!!</div>";
                        }
                    }
                    ?>
                    <button class="w3-button w3-block w3-purple w3-section w3-padding">Register Team Adminstrator</botton>
                </div>
            </form>
        </div>
    </div>





<script>
    document.getElementById('registration_modal').style.display = 'block'
</script>

<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="/assets/js/register.js"></script>
</body>
</html>