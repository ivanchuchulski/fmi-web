
-- insert
INSERT INTO users (firstname, surname, major, course, studentGroup, motivation, facultynum) VALUES(:firstname, :surname, :major, :course, :studentGroup, motivation, :facultynum);

-- select by facultynum
SELECT * FROM users WHERE facultynum=:facultynum;