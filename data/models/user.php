<?php
require_once('data/database.php');

if (isset($_SESSION["id"])) {
    $stmt = $db->prepare('SELECT * FROM players WHERE id =:id');
    $stmt->bindValue(':id', $_SESSION['id'], SQLITE3_TEXT);
    $result = $stmt->execute();
    output($result);
}

if (isset($_SESSION['register'])) {

    checkUserExists($db);
    $salt = uniqid(mt_rand(), true);
    $pepper = "s^fad#$-5&we214$9*";
    $password = $salt . $_SESSION["password"] . $pepper;
    $hash = hash('sha512', $password);

    $insert = "INSERT INTO users (username,passwd,role,team,salt) VALUES (:username,:passwd,:role,:team,:salt)";

    $stmt = $db->prepare($insert);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':passwd', $passwd);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':team', $team);
    $stmt->bindParam(':salt', $salt);

    $username = $_SESSION['username'];
    $passwd = $hash;
    $team = $_SESSION["team"];
    $role = "team admin";
    $salt = $salt;

    $result = $stmt->execute();

    header("Location: /login_form");
}

if (isset($_SESSION['validate'])) {

    $result = getUser($db);
    $pepper = "s^fad#$-5&we214$9*";
    $salt = $result["salt"];
    $passwd = $result["passwd"];
    $role = $result["role"];

    $password = $salt . $_SESSION["password"] . $pepper;
    $hash = hash('sha512', $password);

    $select = "SELECT count(*) as count, team FROM users WHERE username = :username AND passwd =:passwd";
    $stmt = $db->prepare($select);
    $stmt->bindValue(':username', $_SESSION['username'], SQLITE3_TEXT);
    $stmt->bindValue(':passwd', $hash, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    if ($row['count'] > 0) {
        $_SESSION['loggedin'] = true;
        if ($role == "admin") {
            header("Location: /admin/dashboard");
        } elseif ($role == "team admin") {
            $_SESSION["club"] = $row['team'];
            $_SESSION['loggedin'] = true;
            header("Location: /admin/team_dashboard");
        }
    } else {
        $_SESSION['loggedin'] = false;
        $_SESSION["message"] = "unsuccessful";
        header("Location: /login_form_message");
    }
}

function checkUserExists($db)
{
    $select = "SELECT count(*) as count FROM users WHERE username =:username";
    $stmt = $db->prepare($select);
    $stmt->bindValue(':username', $_SESSION['username'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    if ($row['count'] > 0) {
        header("Location: /registration_form_message");
        die();
    }
}

function getUser($db)
{
    $stmt = $db->prepare('SELECT * FROM users WHERE username =:username');
    $stmt->bindValue(':username', $_SESSION['username'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    return ($row);
}

