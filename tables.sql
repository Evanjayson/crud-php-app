CREATE TABLE courses(
  
  course_name VARCHAR(250),
  course_description TEXT,
  course_id INT AUTO_INCREMENT,
  PRIMARY KEY(course_id))

CREATE TABLE subjects(
  subject_name VARCHAR(250),
  subject_description TEXT,
  course_id INT,
  subject_id INT AUTO_INCREMENT,
  PRIMARY KEY(subject_id),
  FOREIGN KEY (course_id) REFERENCES courses(course_id))
  
  
CREATE TABLE tutorials(
  tutorial_name VARCHAR(250),
  tutorial_description TEXT,
  subject_id INT, 
  tutorial_id INT AUTO_INCREMENT,
  PRIMARY KEY(tutorial_id),
  FOREIGN KEY (subject_id) REFERENCES subjects(subject_id))

CREATE TABLE quizz(
  quiz_name VARCHAR(250),
  subject_id INT, 
  quiz_id INT AUTO_INCREMENT,
  PRIMARY KEY(quiz_id),
  FOREIGN KEY (subject_id) REFERENCES subjects(subject_id))
  
  
 CREATE TABLE questions(
  question VARCHAR(250),
  quiz_id INT,
  option_one VARCHAR(250),
  option_two VARCHAR(250),
  option_three VARCHAR(250),
  option_four VARCHAR(250),
   question_id INT AUTO_INCREMENT,
   PRIMARY KEY(question_id),
  FOREIGN KEY (quiz_id) REFERENCES quizz(quiz_id))

