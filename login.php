<?php
session_start();
require "config.php";
include "functions.php";


if (isset($_SESSION['session_id'])) {
    header('Location: portfolio-editing.php');
    exit;
}
if (isset($_GET['op']) and $_GET['op']='login') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password';
    } else {
        $query = "
            SELECT id
            , name
            , username
            , password
            FROM students WHERE username='".$username."' AND password=md5('".$password ."');
        ";
        
        $check = $pdo->prepare($query);
        $check->execute();

        $user = $check->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $msg = 'Credenziali utente errate %s';
        } else {
            $_SESSION['session_id'] = $user['id'];
            $_SESSION['session_user'] = $user['username'];

            header('Location: portfolio-editing.php');
            exit;
        }
    }
}
include "theme/header.php";
?>

<div class="container p-5 d-flex justify-content-center align-items-center vh-100">
    <div class="form-container shadow p-5 rounded">
        <h1 class="text-white text-center">LOGIN</h1>
        <form action="login.php?op=login" method="POST">
            <div class="form-floating bg-dark mb-3 mt-5">
                <input type="text" class="form-control form-control-login bg-dark text-white" id="floatingInput" placeholder="Username" name="username">
                <label class="text-secondary" for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control form-control-login bg-dark text-white" id="floatingPassword" placeholder="Password" name="password">
                <label class="text-secondary" for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-outline-warning mt-5 btn-submit" type="submit" name="login">Submit</button>
        </form>
    </div>
</div>

<?php
include "theme/footer.php";
?>