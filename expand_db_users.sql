CREATE TABLE expand_db.users
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name tinytext NOT NULL,
    is_company tinyint(1) DEFAULT '0' NOT NULL,
    cluster_id int(11),
    CONSTRAINT users_ibfk_1 FOREIGN KEY (cluster_id) REFERENCES clusters (id)
);
CREATE INDEX cluster_id ON expand_db.users (cluster_id);