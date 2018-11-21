<?php
session_start();
require_once 'config/config.php';
$request = $_SERVER['REQUEST_URI'];

if (strpos($request,  'admin') !== false) {
    require_once __DIR__ . '/routes/admin.php';
}

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.html';
        break;

    case '/api/player?id=' .$id:
        $_SESSION["id"] = $id;
        require __DIR__ . '/data/models/user.php';
        break;    

    case '/api/teams':
        $_SESSION["teams"] = true;
        require __DIR__ . '/data/models/team.php';
        break;
        
    case '/api/players?team=' . $team:
        $_SESSION["team"] = $team;
        $_SESSION["players"] = true;
        require __DIR__ . '/data/models/player.php';
        break;

    case '/api/team?team=' . $team:
        $_SESSION["team"] = $team;
        require __DIR__ . '/data/models/team.php';
        break;
    case '/registration_form':
        require __DIR__ . '/views/register.php';
        break;

    case '/registration_form_message':
        $_SESSION["message"] = "Username exists";
        require __DIR__ . '/views/register.php';
        break;

    case '/login_form':
        require __DIR__ . '/views/login.php';
        break;

    case '/login_form_message':
        $_SESSION["message"] = "unsuccessful";
        require __DIR__ . '/views/login.php';
        break;

    case '/authenticate_admin':
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['validate'] = true;
        require __DIR__ . '/data/models/user.php';
        break;
case '/login_form_message':
        $_SESSION["message"] = "unsuccessful";
        require __DIR__ . '/views/login.php';
        break;
    case '/register':
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["team"])) {
            $_SESSION['register'] = true;
            $_SESSION['username'] = $_POST["username"];
            $_SESSION['password'] = $_POST["password"];
            $_SESSION['team'] = $_POST["team"];
            require __DIR__ . '/data/models/user.php';
        }

        break;

    // case '/admin/dashboard':+
    //     require __DIR__ . '/views/admin_dashboard.php';
    //     break;

    // case '/team/dashboard':
    //     require __DIR__ . '/views/team_dashboard.php';
    //     break;

    case '/logout':
        unset($_SESSION['loggedin']);
        header("Location: /");
        break;

    default: 
        require __DIR__ . '/views/404.html';
        break;
}

