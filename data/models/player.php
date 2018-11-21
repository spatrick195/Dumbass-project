<?php 
require_once('data/database.php');

if (isset($_SESSION["players"])) {
    $stmt = $db->prepare('SELECT * FROM players WHERE team =:team');
    $stmt->bindValue(':team', $_SESSION['team'], SQLITE3_TEXT);
    $result = $stmt->execute();
    output($result);
}

if (isset($_SESSION["id"])) {
    $stmt = $db->prepare('SELECT * FROM players WHERE id =:id');
    $stmt->bindValue(':id', $_SESSION['id'], SQLITE3_TEXT);
    $result = $stmt->execute();
    output($result);
}

if (isset($_SESSION["has_players"])) {
    $stmt = $db->prepare('SELECT count(*) as count FROM players WHERE team =:team');
    $stmt->bindValue(':team', $_SESSION['team'], SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    if ($row['count'] > 0) {
        echo("true");
    }
    else{
        echo("false");
    }
}

if (isset($_SESSION['add_player'])) {
    $_POST = $_SESSION["post_vars"];
    $stmt = $db->prepare("INSERT INTO players (name, team, position, image, height, weight, age)
    values (:name,:team,:position,:image,:height,:weight,:age)");
    $stmt->bindValue(':name',$_POST["name"], SQLITE3_TEXT);
    $stmt->bindValue(':team',$_POST["team"], SQLITE3_TEXT);
    $stmt->bindValue(':position',$_POST["position"], SQLITE3_TEXT);
    $stmt->bindValue(':image',$_POST["image"], SQLITE3_TEXT);
    $stmt->bindValue(':height',$_POST["height"], SQLITE3_TEXT);
    $stmt->bindValue(':weight',$_POST["weight"], SQLITE3_TEXT);
    $stmt->bindValue(':age',$_POST["age"], SQLITE3_INTEGER);
    $stmt->execute();
}