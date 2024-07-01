<?php
function pdo(PDO $pdo, string $sql, array $arguments = null)
{
    if (!$arguments) {                   // If no arguments
        return $pdo->query($sql);        // Run SQL and return PDOStatement object
    }
    $statement = $pdo->prepare($sql);    // If arguments prepare statement
    $statement->execute($arguments);     // Execute statement
    return $statement;                   // Return PDOStatement object
}

function get_level_language($level){
    $lunghezza_bar = "";
    if ($level== "C2"){
        $lunghezza_bar = '100';
    }
    else if ($level == "C1"){
        $lunghezza_bar = '83';
    }
    else if ($level == "B2"){
        $lunghezza_bar = '66';
    }
    else if ($level == "B1"){
        $lunghezza_bar = '49';
    }
    else if ($level == "A2"){
        $lunghezza_bar = '32';
    }
    else if ($level== "A1") {
        $lunghezza_bar = '15';
    }
    return $lunghezza_bar;
}

function get_level_program($level){
    $lunghezza_bar = "";
    if ($level == 5){
        $lunghezza_bar = '100';
    }
    else if ($level == 3){
        $lunghezza_bar = '60';
    }
    else if ($level == 2){
        $lunghezza_bar = '40';
    }
    else if ($level == 1){
        $lunghezza_bar = '20';
    }
    else if ($level == 4){
        $lunghezza_bar = '80';
    }
    return $lunghezza_bar;
}

function changeTitle($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET cover_title = :cover_title WHERE id=:id ";
    $testo = pdo($pdo, $sql,['cover_title' => $testo, 'id' => $id]); 
}

function changeDescription($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET cover_description = :cover_description WHERE id=:id ";
    $testo = pdo($pdo, $sql,['cover_description' => $testo, 'id' => $id]); 
}

function changeName($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET name = :name WHERE id=:id ";
    $testo = pdo($pdo, $sql,['name' => $testo, 'id' => $id]); 
}

function changeSurname($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET surname = :surname WHERE id=:id ";
    $testo = pdo($pdo, $sql,['surname' => $testo, 'id' => $id]); 
}

function changeJob($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET current_job = :current_job WHERE id=:id ";
    $testo = pdo($pdo, $sql,['current_job' => $testo, 'id' => $id]); 
}

function changeCity($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET city = :city WHERE id=:id ";
    $testo = pdo($pdo, $sql,['city' => $testo, 'id' => $id]); 
}

function changeFeedback($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET feedback = :feedback WHERE id=:id ";
    $testo = pdo($pdo, $sql,['feedback' => $testo, 'id' => $id]); 
}

function changeResidence($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET residence = :residence WHERE id=:id ";
    $testo = pdo($pdo, $sql,['residence' => $testo, 'id' => $id]); 
}

function changeBirthDate($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET birth_date = :birth_date WHERE id=:id ";
    $testo = pdo($pdo, $sql,['birth_date' => $testo, 'id' => $id]); 
}

function changeEducationalQualification($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET educational_qualification = :educational_qualification WHERE id=:id ";
    $testo = pdo($pdo, $sql,['educational_qualification' => $testo, 'id' => $id]); 
}

function changeTelephoneNumber($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET telephone_number = :telephone_number WHERE id=:id ";
    $testo = pdo($pdo, $sql,['telephone_number' => $testo, 'id' => $id]); 
}

function changeEmail($pdo){
    $testo=$_GET['testo'];
    $id=$_SESSION['session_id'];
    $sql="UPDATE students SET email = :email WHERE id=:id ";
    $testo = pdo($pdo, $sql,['email' => $testo, 'id' => $id]); 
}

function deleteLanguage($pdo){
    $delete_lang=$_GET['delete_lang'];
    $id=$_SESSION['session_id'];
    $sql="DELETE FROM students_languages WHERE id = :delete_lang AND id_student = :id";
    $language=pdo($pdo,$sql,['delete_lang'=>$delete_lang, 'id'=>$id]);

}

function addLanguage($pdo){
    $lang=$_GET['lang'];
    $lang_lev=$_GET['lang_lev'];
    $id=$_SESSION['session_id'];
    $sql="INSERT INTO students_languages (id_language, id_level, id_student) VALUES (:id_language, :id_level, :id_student)";
    $lang = pdo($pdo, $sql,['id_language'=>$lang, 'id_level'=>$lang_lev, 'id_student'=>$id]); 
}

function deleteCode($pdo){
    $delete_code=$_GET['delete_code'];
    $id=$_SESSION['session_id'];
    $sql="DELETE FROM students_programming WHERE id = :delete_code AND id_student = :id";
    $code=pdo($pdo,$sql,['delete_code'=>$delete_code, 'id'=>$id]);

}

function addCode($pdo){
    $code=$_GET['code'];
    $code_lev=$_GET['code_lev'];
    $id=$_SESSION['session_id'];
    $sql="INSERT INTO students_programming (id_programming_language, id_programming_level, id_student) VALUES (:id_programming_language, :id_programming_level, :id_student)";
    $code = pdo($pdo, $sql,['id_programming_language'=>$code, 'id_programming_level'=>$code_lev, 'id_student'=>$id]); 
}

function deleteSocial($pdo){
    $delete_social=$_GET['delete_social'];
    $id=$_SESSION['session_id'];
    $sql="DELETE FROM students_social WHERE id = :delete_social AND id_student = :id";
    $social=pdo($pdo,$sql,['delete_social'=>$delete_social, 'id'=>$id]);

}

function addSocial($pdo){
    $social=$_GET['social'];
    $link_social=$_GET['link_social'];
    $id=$_SESSION['session_id'];
    $sql="INSERT INTO students_social (id_social, link_social, id_student) VALUES (:id_social, :link_social, :id_student)";
    $social = pdo($pdo, $sql,['id_social'=>$social, 'link_social'=>$link_social, 'id_student'=>$id]); 
}

function deleteProject($pdo){
    $delete_project=$_GET['delete_project'];
    $id=$_SESSION['session_id'];
    $sql="DELETE FROM projects WHERE id = :delete_project AND id_student = :id";
    $project=pdo($pdo,$sql,['delete_project'=>$delete_project, 'id'=>$id]);

}

function addProject($pdo){
    $project_name=$_GET['project'];
    $project_description=$_GET['description'];
    $link_project=$_GET['link_project'];
    $id=$_SESSION['session_id'];
    $sql="INSERT INTO projects (title, description, link_project, id_student) VALUES (:title, :description, :link_project, :id_student)";
    $project = pdo($pdo, $sql,['title'=>$project_name, 'description'=>$project_description, 'link_project'=>$link_project, 'id_student'=>$id]); 
}

function deleteExperience($pdo){
    $delete_experience=$_GET['delete_experience'];
    $id=$_SESSION['session_id'];
    $sql="DELETE FROM experiences WHERE id = :delete_experience AND id_student = :id";
    $experience=pdo($pdo,$sql,['delete_experience'=>$delete_experience, 'id'=>$id]);

}

function addExperience($pdo){
    $role=$_GET['role'];
    $agency=$_GET['agency'];
    $experience_description=$_GET['description'];
    $start_experience=$_GET['start'];
    $end_experience=$_GET['end'];
    $id=$_SESSION['session_id'];
    $sql="INSERT INTO experiences (role, agency, description, start, end, id_student) VALUES (:role, :agency, :description, :start, :end, :id_student)";
    $experience = pdo($pdo, $sql,['role'=>$role, 'agency'=>$agency, 'description'=>$experience_description, 'start'=>$start_experience, 'end'=>$end_experience, 'id_student'=>$id]); 
} 
?>