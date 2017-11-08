CREATE TABLE expand_db.solutions
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    task_id int(11) NOT NULL,
    student_id int(11) NOT NULL,
    contents text NOT NULL,
    status enum('accepted', 'pending', 'rejected') DEFAULT 'pending' NOT NULL,
    created timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT solutions_ibfk_1 FOREIGN KEY (task_id) REFERENCES tasks (id) ON DELETE CASCADE,
    CONSTRAINT solutions_ibfk_2 FOREIGN KEY (student_id) REFERENCES users (id) ON DELETE CASCADE
);
CREATE INDEX student_id ON expand_db.solutions (student_id);
CREATE INDEX task_id ON expand_db.solutions (task_id);