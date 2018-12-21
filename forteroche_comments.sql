CREATE TABLE forteroche.comments
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_id int(11) NOT NULL,
    author varchar(250) NOT NULL,
    comment text NOT NULL,
    comment_date datetime NOT NULL,
    alert int(1) DEFAULT '0' NOT NULL
);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (5, 'Elsa', 'J''adore et le concept et l''histoire ;) ', '2018-10-03 15:09:07', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (6, 'Gretchen', 'C''est une belle idée et l''histoire est magnifique', '2018-12-19 22:23:18', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'Hubert', 'Début très prometteur,  hâte de lire la suite', '2018-12-21 13:49:10', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'Jeanne', 'J''aime beaucoup le concept et pour l''instant je trouve l''histoire très intéressante hâte de lire la suite', '2018-12-21 13:50:54', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'nathan', 'ouais histoire moyenne, concept moyen tout est moyen quoi !', '2018-12-21 13:54:37', 3);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'Gilles', 'C''est un beau roman, c''est une belle histoire', '2018-12-21 13:55:07', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (3, 'Sandrine', 'J''ai commencé tout à l''heure j''ai hâte de lire la suite', '2018-12-21 13:56:21', 0);