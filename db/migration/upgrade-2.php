<?php
/**
 * User: v.kondratyuk
 * Date: 11/12/13
 * Time: 4:29 PM
 */

$db = Services::getDBConnection();

$sql = array(
    0 => "CREATE TABLE IF NOT EXISTS points_market (
            market_id INTEGER PRIMARY KEY,
            points INTEGER,
            description TEXT,
            type INTEGER,
            active INTEGER
        )",
    1 => "CREATE TABLE IF NOT EXISTS plan (
            plan_id INTEGER PRIMARY KEY,
            date NUMERIC,
            agenda TEXT
        )"
);

foreach ($sql as $query) {
    try {
        $db->exec($query);
    } catch(PDOException $e) {
        echo '<b>' . $e->getMessage() . '</b>';
    }
}