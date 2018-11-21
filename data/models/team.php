<?php 
require_once('data/database.php');

if (isset($_SESSION["teams"])) {
    $results = $db->query('SELECT team, colour FROM teams');
    output($results);
}
if (isset($_SESSION["team"])) {
    $stmt = $db->prepare('SELECT * FROM teams WHERE team =:team');
    $stmt->bindValue(':team', $_SESSION['team'], SQLITE3_TEXT);
    $result = $stmt->execute();
    output($result);
}

$db->close();