"INSERT INTO user (id, name_and_surname, avatar_icon) VALUES
(1, 'Ваня Денисов', 'avatar_vanya.png'),
(2, 'Лиза Дёмина', 'avatar_liza.png'),
(3, 'Ларин Даниил', 'avatar_daniil.png');

INSERT INTO post (id, user_id, text, img1, likes, publication_time) VALUES
(1, 1, 'Тестовый пост Вани', 'dog.jpeg', 0, UNIX_TIMESTAMP() - 86400),
(2, 2, 'Пост от Лизы', 'liza_photo.jpg', 0, UNIX_TIMESTAMP() - 72000);"