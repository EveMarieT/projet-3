CREATE TABLE forteroche.users
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL
);
INSERT INTO forteroche.users (name, password, email) VALUES ('admin', '$2y$10$ZQgxF0wx58GCW4W5to1zguHJ1WSEJdyF18W7igjlIHr3tfq9QfmBy', 'toto@toto.com');
INSERT INTO forteroche.users (name, password, email) VALUES ('eve', '$2y$10$cHTCJ2GqAUblzax0fsIvOeV68kQFHd6K8gh8yKf6SMZH4hilYv5b2', '');