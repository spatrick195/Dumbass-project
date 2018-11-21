<?php 
$db = new SQLite3('data/db.sqlite3', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

// more databse queries will go here .....
function output($results) {
    $data = array();
    while ($res = $results->fetchArray(1)) {
        array_push($data, $res);
    }
    echo "{\"data\":" . json_encode($data) . "}";
    return;
}