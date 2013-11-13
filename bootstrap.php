<?php
/**
 * Created by PhpStorm.
 * User: melo
 * Date: 11/9/13
 * Time: 10:56 AM
 */

// Set default timezone
date_default_timezone_set('UTC');
define('POINTS_BALANCE', 1);
define('POINTS_SPEND', 2);

class Services {
    protected static $services = array();

    public static function getDBConnection()
    {
        if (!isset(self::$services['dbconnection'])) {
            $db = new PDO('sqlite:db/points-manager.sqlite3');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$services['dbconnection'] = $db;
        }

        return self::$services['dbconnection'];
    }
}

class DataMigration {
    const DB_MIGRATION_DIR = 'db/migration';
    const DB_MIGRATION_PROGRESS = 'db/progress.txt';

    public static function run()
    {
        $excludeFiles = self::getExcludeFiles();
        $updateFiles = self::getUpdateFiles($excludeFiles);
        self::applyUpdates($updateFiles);
    }

    protected static function getExcludeFiles()
    {
        $excludeFiles = explode("\n", file_get_contents(self::DB_MIGRATION_PROGRESS));
        $excludeFiles[] = '.';
        $excludeFiles[] = '..';

        return $excludeFiles;
    }

    protected static function getUpdateFiles($excludeFiles)
    {
        if ($handle = opendir(self::DB_MIGRATION_DIR)) {
            while (false !== ($updateFile = readdir($handle))) {
                if (!in_array($updateFile, $excludeFiles)) {
                    $updateFiles[] = $updateFile;
                }
            }
            sort($updateFiles);
            closedir($handle);
        }

        return $updateFiles;
    }

    protected static function applyUpdates($updateFiles)
    {
        foreach ($updateFiles as $updateFile) {
            include (self::DB_MIGRATION_DIR . DIRECTORY_SEPARATOR . $updateFile);
            file_put_contents(self::DB_MIGRATION_PROGRESS, $updateFile."\n", FILE_APPEND | LOCK_EX);
        }
    }
}

class Factory {
    public function getModel($name)
    {
            
    }
}

DataMigration::run();
