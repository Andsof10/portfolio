<?php
require "config.php";
include "functions.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);  // Validate id
if (!$id) {                                                // If no valid id
    include "page_not_found.php";                          // Page not found
}

include "query-portfolio.php";
include "theme/header.php";

?>

<div class="pt-5 container container-portfolio">
    <h1 class="text-white text-center mt-4">PORTFOLIO</h1>
    <div class="row mt-5 shadow-lg">
        
         <!-- Img, Name and job -->
        
        <div class="col-lg-3 col-sm-12 mb-5">
            <div class="profile bg-dark border-0 card text-center p-5 pb-3 rounded-0" >
                <?php
                if (!$member['img_profile'] or empty($member['img_profile'])){
                    echo '<img id="img-profile" src="images/user.jpg" class="card-img-top rounded-circle" alt="..." >';
                }
                else {?>
                <img id="img-profile" src="<?= $member['img_profile']; ?>" class="card-img-top rounded-circle" alt="..." >
                <?php
                     }
                ?>
                <div class="card-body">
                    <h5 class="card-title text-white"><?= $member['name'].' '.$member['surname']; ?></h5>
                    <p class="card-text text-secondary"><?= $member['current_job']; ?></p>
                </div>
            </div>
            <div class=" mb-4 text-center">
                <?php
                if (!$socials or empty($socials)){
                    echo '<h5 class="text-white">Nessun social inserito</h5>';
                }

                foreach($socials as $social){?>
                <a  href="<?= $social['link_social'] ?>"><img class="icon_social" src=" <?= $social['icon'] ?> "></a>
                <?php } ?>
            </div>
            
            
             <!-- Personal info -->
            
            <div class="text-white p-3">
                <span>Residence:</span><span class="float-end text-secondary"><?= $member['residence']; ?></span><br>
                <span>City:</span><span class="float-end text-secondary"><?= $member['city']; ?></span><br>
                <span>Birth date:</span><span class="float-end text-secondary"><?= $member['birth_date']; ?></span><br>
                <span>School:</span><span class="float-end text-secondary"><?= $member['educational_qualification']; ?></span><br>
                <span>Telephone:</span><span class="float-end text-secondary"><?= $member['telephone_number']; ?></span><br>
                <span>Email:</span><span class="float-end text-secondary"><?= $member['email']; ?></span><br>
            </div>
            <hr class="text-secondary">
            
             <!-- Languages -->
            
            <div class="pt-2">
                <?php
                if (!$results or empty($results)){
                    echo '<h5 class="text-white">Nessuna lingua inserita</h5>';
                }
                foreach ($results as $result){

                    $level_language = get_level_language($result['level']);

                ?>
                <div class="pb-3">
                    <span class="text-white me-2"><?= $result['language']; ?></span><img class="icon_program" src="<?= $result['flag']; ?>"><span class="float-end text-secondary"><?= $result['level']; ?></span>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning" style="width:<?= $level_language; ?>%" ></div>
                    </div>
                </div>

                <?php }?>
            </div>
            <hr class="text-secondary">
            
            
             <!-- Codes -->
            
            <div class="pt-2">
                <?php
                if (!$codes or empty($codes)){
                    echo '<h5 class="text-white">Nessun linguaggio di programmazione inserito</h5>';
                }

                foreach($codes as $code){ 

                    $level_program = get_level_program($code['id_programming_level']);

                ?>
                <div class="pb-3">
                    <span class="text-white me-2"><?= $code['title']; ?></span><img class="icon_program" src="<?= $code['icon']; ?>"><span class="float-end text-secondary"><?= $code['level']; ?></span>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning" style="width:<?= $level_program; ?>%"></div>
                    </div>
                </div>
                <?php }?>
            </div>

             
            
        </div>
        <div class="col-lg-9 col-sm-12 ps-5 mt-5">
            
            <!-- Cover -->
            
            <div class="card text-bg-dark rounded-0 shadow">
                <img src="<?= $member['cover_image']; ?>" class="card-img opacity-50  rounded-0 " alt="..." style="height: 20rem; ">
                <div class="card-img-overlay p-5">
                    <h1 class="card-title"><?= $member['cover_title']; ?></h1>
                    <p class="card-text"><?= $member['cover_description']; ?></p>
                </div>
            </div>
            
            <!-- Projects -->
            
            <h3 class="text-white mt-5">My projects</h3>
            <div class="row mt-4 position-relative">
                <?php
                if (!$projects or empty($projects)){
                    echo '<h5 class="text-white">Nessun progetto inserito</h5>';
                }

                foreach($projects as $project){ ?>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card card-portfolio shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?= $project['title']; ?></h5>
                            <p class="card-text text-secondary"><?= $project['description']; ?></p><br>
                            <a class="btn-card-portfolio btn-card nav-link active text-warning float-end border border-warning rounded pt-2 ps-3 pe-3 pb-2" aria-current="page" href="<?= $project['link_project']; ?>" target="_blank">View</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <hr class="text-secondary">
            
            <!-- Experiences -->
            
            <h3 class="text-white mt-5">My experiences</h3>
            <div class="row mb-5 mt-4 position-relative">
                <?php
                if (!$experiences or empty($experiences)){
                    echo '<h5 class="text-white">Nessuna esperienza inserita</h5>';
                }

                foreach($experiences as $experience){ ?>
                <div class="col-sm-6 col-lg-4 mb-4 ">
                    <div class="card card-portfolio shadow h-100">
                        <div class="card-body">
                            <div>
                                <span class="text-warning float-end"><?= $experience['agency']; ?></span>
                                <h5 class="card-title text-white"><?= $experience['role']; ?></h5>
                            </div>
                            <p class="card-text text-secondary pt-2"><?= $experience['description']; ?></p><br>
                            <p class="date-work float-end card-text text-warning pt-2 "><?= $experience['start']; ?>/<?= $experience['end']; ?></p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <hr class="text-secondary">
            
            <!-- Feedback -->
            
            <div>
                <img class="float-end pb-5" id="img-link" src="images/linkode.webp">
                <h3 class="text-white mt-5">Feedback</h3>
                <p class="text-secondary mt-4"><?= $member['feedback']; ?></p>
            </div>
        </div>
    </div>
</div>

<?php
include "theme/footer.php";
?>