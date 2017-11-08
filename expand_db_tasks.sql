CREATE TABLE expand_db.tasks
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    author_id int(11) NOT NULL,
    title tinytext NOT NULL,
    contents text NOT NULL,
    cluster_id int(11) NOT NULL,
    created timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    deadline timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT tasks_ibfk_1 FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT tasks_ibfk_2 FOREIGN KEY (cluster_id) REFERENCES clusters (id)
);
CREATE INDEX author_id ON expand_db.tasks (author_id);
CREATE INDEX cluster_id ON expand_db.tasks (cluster_id);