<?php
/**
 * Created by PhpStorm.
 * User: melo
 * Date: 11/9/13
 * Time: 10:56 AM
 */

// Set default timezone
date_default_timezone_set('UTC');

define ('DOCUMENT_ROOT', __DIR__);

define('POINTS_BALANCE', 1);
define('POINTS_SPEND', 2);

class Services {
    protected static $services = array();

    public static function getDBConnection()
    {
        if (!isset(self::$services['dbconnection'])) {
            $db = new PDO('sqlite:' . DOCUMENT_ROOT .'/db/darwin.sqlite3');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$services['dbconnection'] = $db;
        }

        return self::$services['dbconnection'];
    }
}
