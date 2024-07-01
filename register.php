<?php
require "config.php";
include "functions.php";



if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $birth_date = $_POST['birth_date'] ?? '';


    $is_username_valid = filter_var(
        $username,
        FILTER_VALIDATE_REGEXP, [
            "options" => [
                "regexp" => "/^[a-z\d_]{3,20}$/i"
            ]
        ]
    );

    $is_email_valid = filter_var(
        $email,
        FILTER_VALIDATE_EMAIL,
        [
            "options" => [
                "regexp" => "/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,})$/i"
            ]
        ]
    );

    $pwdLenght = mb_strlen($password);
    if (empty($username) || empty($password) || empty($name) || empty($surname) || empty($email) || empty($birth_date)) {
        $msg = '<p class="text-warning text-center mt-3">Compila tutti i campi</p>';
    } elseif (false === $is_username_valid) {
        $msg = '<p class="text-danger text-center mt-3">Lo username non è valido. Sono ammessi solamente caratteri 
                alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                Lunghezza massima 20 caratteri</p>';

    } elseif (false === $is_email_valid) {
        $msg = '<p class="text-danger text-center mt-3">La email non è valida. Utilizzare il formato corretto per la mail (miamail@gmail.com)</p>';
        
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = '<p class="text-danger text-center mt-3">Lunghezza minima password 8 caratteri.
                Lunghezza massima 20 caratteri</p>';
    } else {
        $password_hash = md5($password);

        $query = "
            SELECT id
            FROM students
            WHERE username = :username
        ";
        $check_username = pdo($pdo,$query,['username'=>$username]);


        $query = "
            SELECT id
            FROM students
            WHERE email = :email
        ";
        $check_email = pdo($pdo,$query,['email'=>$email]);

        $user = $check_username->fetchAll(PDO::FETCH_ASSOC);
        $mail = $check_email->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) > 0) {
            $msg = '<p class="text-warning text-center mt-3">Username già in uso</p>';
        }
        else if(count($mail) > 0){
            $msg = '<p class="text-warning text-center mt-3">Email già in uso</p>';
        }
        else {
            $query = "
                INSERT INTO students (username, password, name, surname, email, birth_date)
                VALUES (:username, :password, :name, :surname, :email, :birth_date)
            ";
            $student=pdo($pdo,$query,['username'=>$username, 'password'=>$password_hash, 'name'=>$name, 'surname'=>$surname, 'email'=>$email, 'birth_date'=>$birth_date]);

            if ($student->rowCount() > 0) {
                $msg = '<p class="text-success text-center mt-3">Registrazione eseguita con successo</p>';
            } else {
                $msg = '<p class="text-danger text-center mt-3">Problemi con l\'inserimento dei dati</p>';
            }
        }
    }
}
include "theme/header.php";
?>

<div class="container p-5 d-flex justify-content-center align-items-center vh-100">
    <div class="form-container shadow p-5 rounded">
        <h1 class="text-white text-center">SIGN UP</h1>
        <form action="register.php" method="POST">
            <div class="row">
                <div class="form-floating col-6 mb-3 mt-5">
                    <input type="text" class="form-control form-control-login bg-dark text-white" id="floatingName" placeholder="Name" name="name">
                    <label class="text-secondary ms-2" for="floatingName">Name</label>
                </div>

                <div class="form-floating col-6 mb-3 mt-5">
                    <input type="text" class="form-control form-control-login bg-dark text-white" id="floatingSurname" placeholder="Surname" name="surname">
                    <label class="text-secondary ms-2" for="floatingSurname">Surname</label>
                </div>

                <div class="form-floating col-12 mb-3">
                    <input type="date" class="form-control form-control-login bg-dark text-white" id="floatingDate" placeholder="Birth date" name="birth_date">
                    <label class="text-secondary ms-2" for="floatingDate">Birth date</label>
                </div>

                <div class="form-floating col-12 mb-3">
                    <input type="email" class="form-control form-control-login bg-dark text-white" id="floatingEmail" placeholder="Email" name="email">
                    <label class="text-secondary ms-2" for="floatingEmail">Email</label>
                </div>

                <div class="form-floating col-12 mb-3">
                    <input type="text" class="form-control form-control-login bg-dark text-white" id="floatingUsername" placeholder="Username" name="username">
                    <label class="text-secondary ms-2" for="floatingUsername">Username</label>
                </div>
                <div class="form-floating col-12 mb-3">
                    <input type="password" class="form-control form-control-login bg-dark text-white" id="floatingPassword" placeholder="Password" name="password">
                    <label class="text-secondary ms-2" for="floatingPassword">Password</label>
                </div>
                <?= $msg ?? ''; ?>
                <button class="btn btn-outline-warning mt-4 btn-submit" type="submit" name="register">Submit</button>
            </div>
        </form>
    </div>
</div>


<?php
include "theme/footer.php";
?>