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
            'positive' => 0,
            'negative' => 0,
            'balance' => 0,
            'spend' => 0
        ),
        array(
            'last_name' => 'Мартынюк',
            'positive' => 0,
            'negative' => 0,
            'balance' => 0,
            'spend' => 0
        ),
        array(
            'last_name' => 'Железницкий',
            'positive' => 0,
            'negative' => 0,
            'balance' => 0,
            'spend' => 0
        ),
    );

    $insert = "INSERT INTO points (last_name, positive, negative, balance, spend)
                VALUES (:last_name, :positive, :negative, :balance, :spend)";
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':positive', $positive);
    $stmt->bindParam(':negative', $negative);
    $stmt->bindParam(':balance', $balance);
    $stmt->bindParam(':spend', $spend);

    foreach ($users as $user) {
        // Set values to bound variables
        $last_name = $user['last_name'];
        $positive  = $user['positive'];
        $negative  = $user['negative'];
        $balance   = $user['balance'];
        $spend     = $user['spend'];

        // Execute statement
        $stmt->execute();
    }
} catch(PDOException $e) {
    echo '<b>' . $e->getMessage() . '</b>';
}