<?php
require "config.php";
include "functions.php";

$sql="SELECT img_profile, name,
surname,
birth_date,
cover_description,
id 
FROM students
";
$students = pdo($pdo, $sql)->fetchAll(); 

include "theme/header.php";
?>
<div id="row-users" class="row justify-content-center position-relative pt-5 mt-4" style="height:100%;">
    <h1 class="text-white text-center">USERS</h1>
    <?php foreach($students as $student){ ?>
    <div class="card users m-5 shadow-lg" style="max-width: 540px;">
        <div class="row h-100">
            <div class="col-4 image-container d-flex">
                <?php
    if (!$student['img_profile'] or empty($student['img_profile'])){
        echo '<img id="img-profile" src="images/user.jpg" class="img-fluid rounded-start w-100 h-100" alt="..." >';
    }
    else {?>
                <img src="<?= $student['img_profile']?>" class="img-fluid rounded-start w-100 h-100" alt="...">
                <?php
         }
                ?>
            </div>
            <div class="col-8 d-flex">
                <div class="card-body d-flex flex-column flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title text-white"><?= $student['name'].' '.$student['surname']; ?></h5>
                        <h6 class="text-warning"><?= $student['birth_date']; ?></h6>
                    </div>
                    <p class="card-text text-secondary"><?= $student['cover_description'] ?></p><br><br>
                    <a class="btn-card-user btn-card nav-link active text-warning mt-auto border border-warning rounded pt-2 ps-3 pe-3 pb-2 mb-2" aria-current="page" href="portfolio.php?id=<?= $student['id']; ?>">View</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php
include "theme/footer.php";
?>