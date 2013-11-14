<?php
/**
 * User: v.kondratyuk
 * Date: 11/13/13
 * Time: 8:51 AM
 */



class PointsManager {

    public function modifyPointsHistory()
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
            $date = !empty($_POST['date']) ? $_POST['date'] : date('Y-m-d');
            $stmt->bindParam(':date', $date);
            $stmt->execute();
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }

    public function modifyPoints()
    {
        $db = Services::getDBConnection();

        try {
            $points = $db->query(
                "SELECT
                  SUM(CASE WHEN (points > 0) AND (type_id = 1) THEN points ELSE 0 END) AS positive,
                  SUM(CASE WHEN (points < 0) AND (type_id = 1) THEN points ELSE 0 END) AS negative,
                  SUM(CASE WHEN (type_id = 1) THEN points ELSE 0 END) AS balance,
                  SUM(CASE WHEN (type_id = 2) THEN points ELSE 0 END) AS spend,
                  user_id
                FROM points_history
                GROUP BY user_id"
            );
            foreach ($points as $line) {
                $db->query(
                    "UPDATE points SET
                        positive = {$line['positive']},
                        negative = {$line['negative']},
                        balance = {$line['balance']},
                        spend = {$line['spend']}
                    WHERE user_id = {$line['user_id']}"
                );
            }
        } catch(PDOException $e) {
            echo '<b>' . $e->getMessage() . '</b>';
        }
    }
}

$pointsManager = new PointsManager();
$pointsManager->modifyPointsHistory();
$pointsManager->modifyPoints();

header('Location: index.php?mode=points_manage&save=1');