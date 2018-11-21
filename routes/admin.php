<?php
require_once 'config/config.php';
switch ($request) {
    case '/admin/dashboard':
        require 'views/admin_dashboard.php';
        die();

    case '/admin/team_dashboard':
        require 'views/team_dashboard.php';
        die();

    case '/admin/has_players?team=' . $team:
        $_SESSION["team"] = $_GET['team'];
        $_SESSION["has_players"] = true;
        require 'data/models/player.php';
        die();

    case '/admin/players?team=' . $team:
        $_SESSION["team"] = $team;
        $_SESSION["players"] = true;
        require 'data/models/player.php';
        die();

    case '/admin/player?id=' . $id:
        $_SESSION["id"] = $id;
        $_SESSION["player"] = true;
        require 'data/models/player.php';
        die();

    case '/admin/add_player':
        $_SESSION['add_player'] = true;
        $_SESSION['post_vars'] = $_POST;
        require 'data/models/player.php';
        die();

    case '/admin/delete_player?id=' . $id:
        $_SESSION['delete_player'] = true;
        $_SESSION['id'] = $id;
        require 'data/models/player.php';
        die();

}