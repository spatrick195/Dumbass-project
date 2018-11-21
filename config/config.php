<?php
unset($_SESSION['teams']);
unset($_SESSION['team']);
unset($_SESSION['players']);
unset($_SESSION['player']);
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['register']);
unset($_SESSION['validate']);
unset($_SESSION['message']);

unset($_SESSION['has_players']);
unset($_SESSION['add_player']);
unset($_SESSION['delete_player']);
unset($_SESSION['update_player']);

$id = null;
$team = null;
$player = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['team'])) {
    $team = $_GET['team'];
}

if (isset($_GET['player'])) {
    $player = $_GET['player'];
}
