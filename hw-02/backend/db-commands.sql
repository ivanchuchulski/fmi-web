
-- insert
INSERT INTO users (firstname, surname, facultynum) VALUES(:firstname, :surname, :facultynum);

-- select by facultynum
SELECT * FROM users WHERE facultynum=:facultynum;