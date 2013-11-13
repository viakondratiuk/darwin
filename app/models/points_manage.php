<?php
/**
 * User: v.kondratyuk
 * Date: 11/13/13
 * Time: 8:51 AM
 */



class PointsManager {

    public function modifyHistoryPoints()
    {
        $db = Services::getDBConnection();
        try {
            $insert = "INSERT INTO points_history (user_id, points, comment, type_id, date)
                VALUES (:user_id, :points, :comment, :type_id, :date)";
            $stmt = $db->prepare($insert);

            $stmt->bindParam(':user_id', $_POST['user_id']);
            $stmt->bindParam(':points', $_POST['points']);
            $stmt->bindParam(':comment', $_POST['comment']);
            $stmt->bindParam(':type_id', $_POST['type_id']);
            $stmt->bindParam(':date', $_POST['date']);
            $stmt->execute();
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }

    public function modifyBalancePoints()
    {
        $db = Services::getDBConnection();
        try {
            $balancePoints = $db->query(
                "SELECT SUM(points) AS balance_points, user_id
                 FROM points_history
                 GROUP BY user_id"
            );
            foreach ($balancePoints as $balancePoint) {
                $db->query(
                    "UPDATE points SET available = {$balancePoint['balance_points']} WHERE user_id = {$balancePoint['user_id']}"
                );
            }
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }

    public function modifyPlusPoints()
    {
        $db = Services::getDBConnection();
        try {
            $plusPoints = $db->query(
                "SELECT SUM(points) AS plus_points, user_id
                 FROM points_history
                 WHERE points > 0 AND type_id = 1
                 GROUP BY user_id"
            );
            foreach ($plusPoints as $plusPoint) {
                $db->query(
                    "UPDATE points SET points = {$plusPoint['plus_points']} WHERE user_id = {$plusPoint['user_id']}"
                );
            }
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }

    public function modifyUsedPoints()
    {
        $db = Services::getDBConnection();
        try {
            $usedPoints = $db->query(
                "SELECT SUM(points) AS used_points, user_id
                 FROM points_history
                 WHERE type_id = 2
                 GROUP BY user_id"
            );
            foreach ($usedPoints as $usedPoint) {
                $db->query(
                    "UPDATE points SET used = {$usedPoint['used_points']} WHERE user_id = {$usedPoint['user_id']}"
                );
            }
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }

    public function getMinusPoints()
    {
        $db = Services::getDBConnection();
        try {
            $usedPoints = $db->query(
                "SELECT SUM(points) AS used_points, user_id
                 FROM points_history
                 WHERE type_id = 2
                 GROUP BY user_id"
            );
            foreach ($usedPoints as $usedPoint) {
                $db->query(
                    "UPDATE points SET used = {$usedPoint['used_points']} WHERE user_id = {$usedPoint['user_id']}"
                );
            }
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }
}

$pointsManager = new PointsManager();
$pointsManager->modifyHistoryPoints();
$pointsManager->modifyBalancePoints();
$pointsManager->modifyPlusPoints();
$pointsManager->modifyUsedPoints();

header('Location: index.php?mode=points_manage&save=1');