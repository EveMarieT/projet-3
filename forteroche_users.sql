CREATE TABLE forteroche.users
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL
);
INSERT INTO forteroche.users (name, password, email) VALUES ('admin', '$2y$10$ZZWoQyGk8uTlCe240exnsu3hQbgW3Re.qO0OmmfKCAvGOf8eP5jCq', 'toto@toto.com');
INSERT INTO forteroche.users (name, password, email) VALUES ('eve', '$2y$10$cHTCJ2Gq', '');