<?php
/**
 * Created by PhpStorm.
 * User: melo
 * Date: 11/9/13
 * Time: 10:56 AM
 */

// Set default timezone
date_default_timezone_set('UTC');

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
            closedir($handle);
        }

        return $updateFiles;
    }

    protected static function applyUpdates($updateFiles)
    {
        foreach ($updateFiles as $updateFile) {
            $sql = include (self::DB_MIGRATION_DIR . DIRECTORY_SEPARATOR . $updateFile);
            $db = Services::getDBConnection();
            foreach ($sql as $query) {
                try {
                    $db->exec($query);
                } catch(PDOException $e) {
                    echo '<b>' . $e->getMessage() . '</b>';
                }
            }
            file_put_contents(self::DB_MIGRATION_PROGRESS, $updateFile."\n", FILE_APPEND | LOCK_EX);
        }
    }
}

DataMigration::run();

/*try {
    $man = array(
        array(
            'last_name' => 'Galanzovskiy',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
        array(
            'last_name' => 'Martyniuk',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
        array(
            'last_name' => 'Zheleznitskij',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
    );

    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO points (last_name, points, used, available)
                VALUES (:last_name, :points, :used, :available)";
    $stmt = $db->prepare($insert);

    // Bind parameters to statement variables
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':points', $points);
    $stmt->bindParam(':used', $used);
    $stmt->bindParam(':available', $available);

    // Loop thru all messages and execute prepared insert statement
    foreach ($man as $m) {
        // Set values to bound variables
        $last_name = $m['last_name'];
        $points = $m['points'];
        $used = $m['used'];
        $available = $m['available'];

        // Execute statement
        $stmt->execute();
    }

    $result = $db->query('SELECT * FROM points');

    foreach($result as $row) {
        echo "Last Name: " . $row['last_name'] . "<br>";
        echo "Points: " . $row['points'] . "<br>";
        echo "Used: " . $row['used'] . "<br>";
        echo "Available: " . $row['available'] . "<br>";
        echo "<br>";
    }
} catch(PDOException $e) {
    echo '<b>' . $e->getMessage() . '</b>';
}*/
