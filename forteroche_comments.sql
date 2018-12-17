CREATE TABLE forteroche.comments
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_id int(11) NOT NULL,
    author varchar(250) NOT NULL,
    comment text NOT NULL,
    comment_date datetime NOT NULL,
    alert int(1) DEFAULT '0' NOT NULL
);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'Sandy', 'y en a marre', null, 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'rozenn', 't''as vu l''heure ?', '2018-08-01 16:33:46', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'ta conscience', 'grouille toi !!!!', '2018-08-01 16:53:12', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'india', 't''as bientôt fini ?', '2018-08-03 17:34:12', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'solution', 'trouvée ?', '2018-08-03 21:40:56', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'non ', 'pas encore !!', '2018-08-03 21:42:27', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'sinon', 'tu vas enfin fonctionner ', '2018-08-03 21:44:59', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'faut croire', 'que non ....', '2018-08-03 21:47:25', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'et maintenant', 'tu fonctionnes ou bien ??', '2018-08-03 21:58:55', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'tintin', 'et voilà
', '2018-08-04 16:41:09', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'sidonie', 'Hâte de connaître la suite ', '2018-08-04 16:52:40', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'salut', 'vert ou pas ', '2018-08-04 17:04:11', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'test js', 'alors ça fonctionne', '2018-08-10 16:48:06', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'test', 'js encore', '2018-08-10 19:10:52', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (1, 'sylvie', 're test', '2018-09-06 10:30:52', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (3, 'Germaine', 'ça roule ou bien ?', '2018-09-06 11:02:20', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'Annabelle', 'Quelle belle histoire', '2018-09-10 16:04:13', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'Gésabelle', 'Wahoouu c''est vraiment passionnant, j''attends la suite avec impatience', '2018-09-24 15:41:09', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'Séverine', 'Un chapitre magnifique hâte de lire la suite', '2018-09-24 15:45:09', 17);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (5, 'Elsa', 'J''adore et le concept et l''histoire ;) ', '2018-10-03 15:09:07', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (5, 'Hubert', 'lol', '2018-10-04 10:28:45', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (3, 'nathan', 'et ron et ron petit patapon', '2018-11-14 13:47:31', 0);
INSERT INTO forteroche.comments (post_id, author, comment, comment_date, alert) VALUES (2, 'hackeur', '&lt;script&gt;alert(''coucou'');&lt;/script&gt;', '2018-11-22 10:54:46', 0);