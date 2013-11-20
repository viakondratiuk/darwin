CREATE TABLE IF NOT EXISTS users (
  user_id INTEGER PRIMARY KEY NOT NULL,
  last_name TEXT NOT NULL
);

INSERT INTO users (user_id, last_name) VALUES (1, 'Галанзовский');
INSERT INTO users (user_id, last_name) VALUES (2, 'Мартынюк');
INSERT INTO users (user_id, last_name) VALUES (3, 'Железницкий');

CREATE TABLE IF NOT EXISTS history (
  history_id INTEGER PRIMARY KEY NOT NULL,
  user_id INTEGER NOT NULL,
  points INTEGER NOT NULL,
  comment TEXT NOT NULL,
  type_id INTEGER CHECK(type_id IN (1,2)) NOT NULL DEFAULT 1,
  created DATE DEFAULT (date('now', 'localtime')),
  FOREIGN KEY(user_id)
    REFERENCES users(user_id)
    ON UPDATE CASCADE
);

INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (1, 1, -1, 'Не настроил удаленный рабочий стол', 1, '2013-11-8');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (2, 1, -1, 'Плохая подача материала', 1, '2013-11-8');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (3, 2, -1, 'Плохая подготовка презентации', 1, '2013-11-8');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (4, 3, 1, 'Настроил удаленный рабочий стол', 1, '2013-11-8');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (5, 1, 1, 'За подсказки', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (6, 1, -1, 'Неправильно предложенный класс', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (7, 1, -1, 'MariaDB, поломал рабочую машину', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (8, 1, -1, 'Подал плохой пример поломкой рабочей машины', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (9, 2, 1, 'За подсказки', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (10, 2, 1, 'Материал по кодировкам', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (11, 2, -1, 'Как посмотреть HEX представление файла', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (12, 2, -1, 'UTF-8 BOM', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (13, 3, 1, 'Наглядное представление стека, очереди', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (14, 3, 1, 'Коммит стека, очереди на гитхаб', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (15, 3, -5, 'За подготовку презентации по стеку, очереди и связанному списку', 1, '2013-11-11');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (16, 1, 1, 'Наглядно представление стека, очереди', 1, '2013-11-13');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (17, 1, 1, 'Предусмотрен вариант выхода за пределы стека', 1, '2013-11-13');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (18, 1, 1, 'Рассказ про InnoDB', 1, '2013-11-13');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (19, 1, -3, 'Стоило сразу разобраться с приоритетом ишью по ClaudiaStrater', 1, '2013-11-13');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (20, 1, 1, 'Материал по timezone, mysqli prepared statements', 1, '2013-11-12');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (21, 1, 1, 'Рассказ про MyISAM', 1, '2013-11-12');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (22, 1, 1, 'Коммит на github', 1, '2013-11-12');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (23, 2, 1, 'Дополнения про MyISAM', 1, '2013-11-12');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (24, 1, 3, 'SQL инъекция', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (25, 1, 1, 'Microtime', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (26, 3, 1, 'MyISAM', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (27, 3, 1, 'Дополнения по SQL инъекции', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (28, 3, 3, 'SQL инъекция', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (29, 2, 30, 'Заработать 100 баллов на stackoverflow до 15.11.2013', 1, '2013-11-14');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (30, 1, 1, 'Стек, очередь, связанный список. Классы, нативное, SPL.', 1, '2013-11-15');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (31, 1, 1, 'Github коммит', 1, '2013-11-15');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (32, 3, 1, 'Стек, очередь, связанный список. Классы, нативное, SPL.', 1, '2013-11-15');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (33, 3, 1, 'GitHub коммит', 1, '2013-11-15');
INSERT INTO history (history_id, user_id, points, comment, type_id, created) VALUES (34, 3, 30, 'Заработать 100 баллов на stackoverflow до 15.11.2013', 1, '2013-11-15');

CREATE TABLE IF NOT EXISTS market (
  market_id INTEGER PRIMARY KEY NOT NULL,
  points INTEGER NOT NULL,
  description TEXT NOT NULL,
  active INTEGER CHECK(active IN (0,1)) NOT NULL DEFAULT 1
);

INSERT INTO market (market_id, points, description, active) VALUES (1, 20, 'Угостить обедом (в пределах 20грн)', 1);

CREATE TABLE IF NOT EXISTS plans (
  plan_id INTEGER PRIMARY KEY NOT NULL,
  agenda TEXT NOT NULL,
  created DATE DEFAULT (datetime('now', 'localtime'))
);

INSERT INTO plans (plan_id, agenda, created) VALUES (1, '<ol>
<li>https://github.com/4man/copernicus/issues/13  18 ноября: +10 Серый, Дима, +30 Артур. Нет -5 Артур, частично - 0</li>
<li>Дима:  таблица с представлением push/pop, shift/unshift, SPL: stack, queue, linked list, Class, измерить время и память, показать на разном кол-ве элеентов +1</li>
<li>МарияДБ. +5</li>
<li>Коммит на гитхаб. +1</li>
<li>Стековерфлоу заработать 100 баллов: через 2 недели +15, после +10</li>
<li>InnoDB как изменяется место +1</li>
<li>Какой механизм для чего: MyISAM, InnoDB (select, insert, update, delete), white paper +1</li>
</ol>
<ul>
<li>Не отвечаете на вопрос: -1</li>
<li>Обманываете: -50</li>
<li>Что-то мне не нравится: -на_месте_разберемся</li>
</ul>
<p>Вы можете придумать как использовать очки, я назначу за это количество баллов.</p>', '2013-11-20 14:53:58');

CREATE TABLE IF NOT EXISTS link_groups (
  group_id INTEGER PRIMARY KEY NOT NULL,
  name TEXT NOT NULL
);

INSERT INTO link_groups (group_id, name) VALUES (1, 'PHP');
INSERT INTO link_groups (group_id, name) VALUES (2, 'Кодировки');
INSERT INTO link_groups (group_id, name) VALUES (3, 'Общее развитие');

CREATE TABLE IF NOT EXISTS links (
  link_id INTEGER PRIMARY KEY NOT NULL,
  group_id INTEGER NOT NULL,
  title TEXT NOT NULL,
  href TEXT NOT NULL,
  created DATE DEFAULT (datetime('now', 'localtime')),
  FOREIGN KEY(group_id)
  REFERENCES link_groups(group_id)
  ON UPDATE CASCADE
);

INSERT INTO links (link_id, group_id, title, href, created) VALUES (1, 1, 'RFC', 'https://wiki.php.net/rfc', '2013-11-20 14:53:58');
INSERT INTO links (link_id, group_id, title, href, created) VALUES (2, 1, 'Mailing Lists', 'http://php.net/mailing-lists.php', '2013-11-20 14:53:58');
INSERT INTO links (link_id, group_id, title, href, created) VALUES (3, 1, 'FIG', 'http://www.php-fig.org/', '2013-11-20 14:53:58');
INSERT INTO links (link_id, group_id, title, href, created) VALUES (4, 2, 'BOM', 'http://www.unicode.org/faq/utf_bom.html', '2013-11-20 14:53:59');
INSERT INTO links (link_id, group_id, title, href, created) VALUES (5, 3, 'Ричард Фейнман: Магниты и вопросы "почему?"', 'http://www.youtube.com/watch?v=IPogLMRBZ4o', '2013-11-20 14:53:59');
INSERT INTO links (link_id, group_id, title, href, created) VALUES (6, 2, 'Handling Unicode Front To Back In A Web App"', 'http://kunststube.net/frontback/', '2013-11-20 14:53:59');