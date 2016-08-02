DROP DATABASE IF EXISTS fdo_blog;

CREATE DATABASE fdo_blog CHARACTER SET utf8;

USE fdo_blog;

CREATE TABLE users
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password_hash VARCHAR(100),
  full_name VARCHAR(200),
  email VARCHAR (100)
);

CREATE UNIQUE INDEX username_UNIQUE ON users (username);

CREATE TABLE posts
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(300) NOT NULL,
    content TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    user_id INT(11),
    CONSTRAINT fk_users_posts FOREIGN KEY (user_id) REFERENCES users (id),
	views_count INT (11)
);

CREATE INDEX fk_users_posts_idx ON posts (user_id);

CREATE TABLE groups
( 
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	group_name VARCHAR(45) NOT NULL
);

CREATE TABLE u_g_interaction
(
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	group_id INT NOT NULL,
	CONSTRAINT fk_users_groups FOREIGN KEY (user_id) REFERENCES users (id),
	CONSTRAINT fk_groups_users FOREIGN KEY (group_id) REFERENCES groups (id)
);
