<?php //prepared statement
//ad-address; coc-completed_course; ci-contact_information; cc-current_course;
//ss-scholarship; sl-specialization; s-student;

////search
$sSearch=$conn->prepare("SELECT * FROM student WHERE student_id=?");
$ciSearch=$conn->prepare("SELECT * FROM contact_information WHERE CI_id=?");
$ssSearch=$conn->prepare("SELECT * FROM scholarship WHERE scholarship_id=?");
$slSearch=$conn->prepare("SELECT * FROM specialization WHERE specialization_id=?");

////insert
$sInsert = $conn->prepare("INSERT INTO student(student_id,student_name,home_country,birth_date,admission_year) VALUES (?, ?, ?,?,?)");
$ciInsert = $conn->prepare("INSERT INTO contact_information(CI_id,email,phone,student_id) VALUES (?, ?, ?,?)");
// $adInsert = $conn->prepare("INSERT INTO address(address_id,street,city,zip_code,CI_id) VALUES (?, ?, ?,?,?)");
$ssInsert = $conn->prepare("INSERT INTO scholarship(scholarship_id,amount,semester,student_id) VALUES (?, ?, ?,?)");
$slInsert = $conn->prepare("INSERT INTO specialization(specialization_id, specialization_name, level, complete_year, student_id) VALUES (?, ?, ?,?,?)");
// $ccInsert = $conn->prepare("INSERT INTO current_course(current_course_id,course_name,semester,attendance,student_id) VALUES (?, ?, ?,?,?)");
// $cocInsert = $conn->prepare("INSERT INTO completed_course(completed_course_id, course_name,semester,final_grade,student_id) VALUES (?, ?, ?,?,?)");

////delete
$sDelete = $conn->prepare("DELETE FROM student where student_id=?");
$ciDelete = $conn->prepare("DELETE FROM contact_information where CI_id=?");
// $adDelete = $conn->prepare("DELETE FROM address where address_id=?");
$ssDelete = $conn->prepare("DELETE FROM scholarship where scholarship_id=?");
$slDelete = $conn->prepare("DELETE FROM specialization where specialization_id=?");
// $ccDelete = $conn->prepare("DELETE FROM current_course where current_course_id=?");
// $cocDelete = $conn->prepare("DELETE FROM completed_course where completed_course_id=?");

////edit/update
$sEdit = $conn->prepare("UPDATE student 
SET student_name= ?, home_country=? ,birth_date=?,admission_year= ? WHERE student_id=?");

$ciEdit = $conn->prepare("UPDATE contact_information 
SET email=?,phone=?,student_id=? WHERE CI_id=?");

// $adEdit = $conn->prepare("UPDATE address 
// SET street=?,city=?,zip_code=?,CI_id=? WHERE address_id=?");

$ssEdit = $conn->prepare("UPDATE scholarship 
SET amount=?,semester=?,student_id=? WHERE scholarship_id=?");

$slEdit = $conn->prepare("UPDATE specialization 
SET specialization_name=?, level=?, complete_year=?, student_id=? WHERE specialization_id=?");

// $ccEdit = $conn->prepare("UPDATE current_course 
// SET course_name=?,semester=?,attendance=?,student_id=? WHERE current_course_id=?");

// $cocEdit = $conn->prepare("UPDATE completed_course 
// SET  course_name=?,semester=?,final_grade=?,student_id=? WHERE completed_course_id=?");

?>