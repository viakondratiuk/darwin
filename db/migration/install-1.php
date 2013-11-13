<?php
/**
 * User: v.kondratyuk
 * Date: 11/12/13
 * Time: 12:55 PM
 */

$db = Services::getDBConnection();

$sql = array(
    0 => "CREATE TABLE IF NOT EXISTS points (
            user_id INTEGER PRIMARY KEY,
            last_name TEXT,
            points INTEGER,
            used INTEGER,
            available INTEGER
        )",
    1 => "CREATE TABLE IF NOT EXISTS points_history (
            history_id INTEGER PRIMARY KEY,
            user_id INTEGER,
            points INTEGER,
            comment TEXT,
            type_id INTEGER,
            date date
        )"
);

foreach ($sql as $query) {
    try {
        $db->exec($query);
    } catch(PDOException $e) {
        echo '<b>' . $e->getMessage() . '</b>';
    }
}
