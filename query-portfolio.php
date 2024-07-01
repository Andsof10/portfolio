<?php

$sql = "SELECT  name,  surname, validity, img_profile , cover_image, cover_description,  educational_qualification 
,current_job, residence, city
, birth_date
, telephone_number
, cover_title
, email
, feedback
FROM students 
WHERE id = :id;"; // SQL
$member = pdo($pdo, $sql, [$id])->fetch();                 // Get member data
if (!$member) {                                            // If array is empty
    include "page_not_found.php";                          // Page not found
}

$sql="SELECT    
  sl.id
, sl.id_language
, sl.id_level
, l.title AS language 
, l.flag
, lev.level AS level
FROM students_languages AS sl
JOIN students AS s ON sl.id_student=s.id
JOIN languages AS l ON l.id=sl.id_language
JOIN languages_level AS lev ON sl.id_level=lev.id
WHERE sl.validity=1 AND sl.id_student = :id";  
$results = pdo($pdo, $sql, [$id])->fetchAll();

foreach ($results as $result){}

$sql="SELECT sp.id, pl.title, id_programming_language, id_programming_level,pl.icon, level 
FROM students_programming AS sp
JOIN students AS s ON sp.id_student=s.id
JOIN programming_languages AS pl ON pl.id=sp.id_programming_language
JOIN programming_languages_level  AS plev ON sp.id_programming_level=plev.id
WHERE sp.validity=1 AND sp.id_student = :id;
";
$codes = pdo($pdo, $sql, [$id])->fetchAll();


$sql="SELECT students_social.id, id_student, id_social, students_social.link_social, social.icon
FROM students_social
JOIN social ON students_social.id_social=social.id
WHERE students_social.validity=1 AND social.validity=1 AND students_social.id_student = :id;
";
$socials = pdo($pdo, $sql, [$id])->fetchAll();


$sql="SELECT projects.id, projects.id_student, projects.title, projects.description, projects.link_project
FROM projects
WHERE projects.validity=1 AND projects.id_student = :id;
";
$projects = pdo($pdo, $sql, [$id])->fetchAll();


$sql="SELECT experiences.id, experiences.id_student, experiences.agency, experiences.start, experiences.end, experiences.role, experiences.description
FROM experiences
WHERE experiences.validity=1 AND experiences.id_student = :id;
";
$experiences = pdo($pdo, $sql, [$id])->fetchAll();


$sql="SELECT title, id FROM languages";
$languages_modal = pdo($pdo, $sql)->fetchAll();

$sql="SELECT * FROM languages_level";
$languages_level = pdo($pdo, $sql)->fetchAll();

$sql="SELECT title, id FROM programming_languages";
$programming_languages_modal = pdo($pdo, $sql)->fetchAll();

$sql="SELECT * FROM programming_languages_level";
$programming_languages_level = pdo($pdo, $sql)->fetchAll();

$sql="SELECT title, id FROM social";
$socials_modal = pdo($pdo, $sql)->fetchAll();

?>