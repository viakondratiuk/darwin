<?php
/**
 * User: v.kondratyuk
 * Date: 11/13/13
 * Time: 8:51 AM
 */

$db = Services::getDBConnection();

try {
    $insert = "INSERT INTO points_history (user_id, points, comment, type_id)
                VALUES (:user_id, :points, :comment, :type_id)";
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':user_id', $_POST['user_id']);
    $stmt->bindParam(':points', $_POST['points']);
    $stmt->bindParam(':comment', $_POST['comment']);
    $stmt->bindParam(':type_id', $_POST['type_id']);
    $stmt->execute();

    $users = $db->query("SELECT SUM(points), user_id, type_id FROM points_history GROUP BY user_id, type_id");
} catch(PDOException $e) {
    echo '<b>' . $e->getMessage() . '</b>';
}

header('Location: index.php?mode=points_manage&save=1');