"
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_and_surname VARCHAR(255) NOT NULL,
    avatar_icon VARCHAR(255)
);

CREATE TABLE post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    text TEXT,
    img1 VARCHAR(255),
    likes INT DEFAULT 0,
    publication_time INT,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

" 