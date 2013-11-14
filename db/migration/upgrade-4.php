<?php
/**
 * User: v.kondratyuk
 * Date: 11/14/13
 * Time: 8:55 AM
 */
 
$sql = array(
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (1, 1, -1, 'Не настроил удаленный рабочий стол', 1, '2013-11-8');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (2, 1, -1, 'Плохая подача материала', 1, '2013-11-8');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (3, 2, -1, 'Плохая подготовка презентации', 1, '2013-11-8');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (4, 3, 1, 'Настроил удаленный рабочий стол', 1, '2013-11-8');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (5, 1, 1, 'За подсказки', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (6, 1, -1, 'Неправильно предложенный класс', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (7, 1, -1, 'МарияДб, поломал рабочую машину', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (8, 1, -1, 'Подал плохой пример поломкой рабочей машины', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (9, 2, 1, 'За подсказки', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (10, 2, 1, 'Материал по кодировкам', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (11, 2, -1, 'Как посмотреть HEX представление файла', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (12, 2, -1, 'UTF-8 BOM', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (13, 3, 1, 'Наглядное представление стека, очереди', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (14, 3, 1, 'Коммит стека, очереди на гитхаб', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (15, 3, -5, 'За подготовку презентации по стеку, очереди и связанному списку', 1, '2013-11-11');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (16, 1, 1, 'Наглядно представление стека, очереди', 1, '2013-11-13');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (17, 1, 1, 'Предусмотрен вариант выхода за пределы стека', 1, '2013-11-13');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (18, 1, 1, 'Рассказ про InnoDB', 1, '2013-11-13');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (19, 1, -3, 'Стоило сразу разобраться с приоритетом ишью по ClaudiaStrater', 1, '2013-11-13');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (20, 1, 1, 'Материал по timezone, mysqli prepared statements', 1, '2013-11-12');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (21, 1, 1, 'Рассказ про MyISAM', 1, '2013-11-12');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (22, 1, 1, 'Коммит на github', 1, '2013-11-12');",
    "INSERT INTO points_history (history_id, user_id, points, comment, type_id, date) VALUES (23, 2, 1, 'Дополнения про MyISAM', 1, '2013-11-12');",
);

foreach ($sql as $query) {
    try {
        $db->exec($query);
    } catch(PDOException $e) {
        echo '<b>' . $e->getMessage() . '</b>';
    }
}