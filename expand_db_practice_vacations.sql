CREATE TABLE expand_db.practice_vacations
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    company_id int(11) NOT NULL,
    apply_deadline timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
    title tinytext NOT NULL,
    contents text NOT NULL,
    CONSTRAINT practice_vacations_ibfk_1 FOREIGN KEY (company_id) REFERENCES users (id) ON DELETE CASCADE
);
CREATE INDEX company_id ON expand_db.practice_vacations (company_id);