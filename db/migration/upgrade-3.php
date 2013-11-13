<?php
/**
 * User: v.kondratyuk
 * Date: 11/13/13
 * Time: 9:04 AM
 */
$db = Services::getDBConnection();

try {
    $users = array(
        array(
            'last_name' => 'Галанзовский',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
        array(
            'last_name' => 'Мартынюк',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
        array(
            'last_name' => 'Железницкий',
            'points' => 0,
            'used' => 0,
            'available' => 0,
        ),
    );

    $insert = "INSERT INTO points (last_name, points, used, available)
                VALUES (:last_name, :points, :used, :available)";
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':points', $points);
    $stmt->bindParam(':used', $used);
    $stmt->bindParam(':available', $available);

    foreach ($users as $user) {
        // Set values to bound variables
        $last_name = $user['last_name'];
        $points = $user['points'];
        $used = $user['used'];
        $available = $user['available'];

        // Execute statement
        $stmt->execute();
    }
} catch(PDOException $e) {
    echo '<b>' . $e->getMessage() . '</b>';
}