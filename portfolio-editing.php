<?php 
// inizio della sessione
session_start();

//conessione al database
require "config.php";

//le relative funzioni
include "functions.php";


if(!isset($_SESSION['session_id'])){
    header('Location: login.php');
    exit;
}

$id=$_SESSION['session_id'];
if(isset($_GET['op'])){
    $op=$_GET['op'];


    switch ($op) {
        case "change_title":
            changeTitle($pdo);
            break;

        case "change_description":
            changeDescription($pdo);
            break;

        case "change_city":
            changeCity($pdo);
            break;

        case "change_residence":
            changeresidence($pdo);
            break;

        case "change_name":
            changeName($pdo);
            break;

        case "change_surname":
            changeSurname($pdo);
            break;

        case "change_current_job":
            changeJob($pdo);
            break;

        case "change_birth_date":
            changeBirthDate($pdo);
            break;

        case "change_educational_qualification":
            changeEducationalQualification($pdo);
            break;

        case "change_telephone_number":
            changeTelephoneNumber($pdo);
            break;

        case "change_email":
            changeEmail($pdo);
            break;

        case "delete_lang":
            deleteLanguage($pdo);
            break;

        case "add_lang":
            addLanguage($pdo);
            header('Location: portfolio-editing.php');
            break; 

        case "delete_code":
            deleteCode($pdo);
            break;

        case "add_code":
            addCode($pdo);
            header('Location: portfolio-editing.php');
            break;

        case "delete_social":
            deleteSocial($pdo);
            break;

        case "add_social":
            addSocial($pdo);
            header('Location: portfolio-editing.php');
            break;

        case "delete_project":
            deleteProject($pdo);
            break;

        case "add_project":
            addProject($pdo);
            header('Location: portfolio-editing.php');
            break;

        case "delete_experience":
            deleteExperience($pdo);
            break;

        case "add_role":
            addExperience($pdo);
            header('Location: portfolio-editing.php');
            break;

        case "change_feedback":
            changeFeedback($pdo);
            break;

        default: ;
    }
}

include "query-portfolio.php";
include "theme/header.php";
?>

<div class="pt-5 container container-portfolio">
    <h1 class="text-white text-center mt-4">PORTFOLIO</h1>
    <div class="row bg-dark mt-5 shadow-lg">
        <div class="col-lg-3 col-sm-12 mb-5">

            <!-- Img, Name and Job -->

            <div class="profile bg-dark border-0 card text-center p-5 pb-3 rounded-0" >
                    <i id="inputFile" title="Change img profile" class="fa-solid fa-camera fa-lg text-white"></i>
                <?php
                if (!$member['img_profile'] or empty($member['img_profile'])){
                    echo '<img id="img-profile" src="images/user.png" class="card-img-top rounded-circle" alt="..." >';
                }
                else {?>
                <img id="img-profile" src="<?= $member['img_profile']; ?>" class="card-img-top rounded-circle" alt="..." >
                <?php
                     }
                ?>

                <i id="changeNameWork" title="Change" class="fa-solid fa-pen-to-square fa-lg text-white"></i>
                <div class="card-body">
                    <h5 class="card-title text-white"><span id="name"><?= $member['name'].' </span><span id="surname"> '.$member['surname']; ?></span></h5>
                    <p id="current_job" class="card-text text-secondary"><?= $member['current_job']; ?></p>
                </div>
            </div>


            <!-- Social -->

            <div class="mb-4 text-center">
                <i id="addSocialBtn" title="Add social" class="fa-solid fa-plus fa-lg text-white"></i>
                <?php
                $social_inserted=[];

                if (!$socials or empty($socials)){

                    echo '<h5 class="text-white">Enter the socials</h5>';
                }

                foreach($socials as $social){?>
                <i data-id="<?=$social['id'];?>" title="Delete social" class="deleteSocialBtn fa-solid fa-trash-can text-white"></i>
                <a href="<?= $social['link_social'] ?>"><img class="icon_social" src="<?= $social['icon']; ?>"></a>

                <?php
                                             array_push($social_inserted, $social['id_social']);
                                            } 
                ?>
            </div>



            <!-- Personal info -->

            <div class="text-white p-3">
                <span>Residence:</span><input type="text" id="changeResidence" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['residence']; ?>"><br><br>

                <span>City:</span><input type="text" id="changeCity" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['city']; ?>"><br><br>

                <span>Birth date:</span><input type="date" id="changeBirthDate" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['birth_date']; ?>"><br><br>

                <span>School:</span><input type="text" id="changeEducationalQualification" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['educational_qualification']; ?>"><br><br>

                <span>Telephone:</span><input type="text" id="changeTelephoneNumber" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['telephone_number']; ?>"><br><br>

                <span>Email:</span><input type="email" id="changeEmail" class="form-control float-end bg-dark text-secondary text-end w-50 h-50 border-bottom" value="<?= $member['email']; ?>"><br>
            </div>
            <hr class="text-secondary">


            <!-- Languages -->

            <div class="pt-2">
                <i id="addLanguageBtn" title="Add language" class=" fa-solid fa-plus fa-lg text-white me-2"></i>
                <?php
                $known_languages=[];
                if (!$results or empty($results)){
                    echo '<h5 class="text-white">Enter the languages you know</h5>';

                }
                foreach ($results as $result){

                    $level_language = get_level_language($result['level']);
                    array_push($known_languages, $result['id_language']);
                ?>

                <div class="pb-3">
                    <span class="language text-white me-2"><?= $result['language']; ?></span><img class="icon_program" src="<?= $result['flag']; ?>"><span class="level float-end text-secondary"><?= $result['level']; ?></span>
                    <i data-id="<?=$result['id'];?>" title="Delete language" class="deleteLanguageBtn fa-solid fa-trash-can fa-lg text-white"></i>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning" style="width:<?= $level_language; ?>%" ></div>
                    </div>
                </div>

                <?php }?>
            </div>
            <hr class="text-secondary">



            <!-- Codes -->

            <div class="pt-2">
                <i id="addCodeBtn" title="Add code" class=" fa-solid fa-plus fa-lg text-white me-2"></i>
                <?php
                $known_programming_languages=[];
                if (!$codes or empty($codes)){
                    echo '<h5 class="text-white">Enter programming languages you know</h5>';
                }

                foreach($codes as $code){ 

                    $level_program = get_level_program($code['id_programming_level']);
                    array_push($known_programming_languages, $code['id_programming_language']);

                ?>
                <div class="pb-3">
                    <span class="text-white me-2"><?= $code['title']; ?></span><img class="icon_program" src="<?= $code['icon']; ?>"><span class="float-end text-secondary"><?= $code['level']; ?></span>
                    <i data-id="<?=$code['id'];?>" title="Delete code" class="deleteCodeBtn fa-solid fa-trash-can fa-lg text-white"></i>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning" style="width:<?= $level_program; ?>%"></div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>


        <!-- Cover -->

        <div class="col-lg-9 col-sm-12 ps-5 mt-5">
            <i id="changeCover" title="Change" class="fa-solid fa-camera fa-lg text-white"></i>
            <i id="changeContentCoverBtn" title="Change" class="fa-solid fa-pen-to-square fa-lg text-white"></i>
            <div class="card text-bg-dark rounded-0 shadow">
                <img id="img-cover" src="<?= $member['cover_image']; ?>" class="card-img opacity-50  rounded-0 " alt="..." style="height: 20rem; ">
                <div class="card-img-overlay p-5">
                    <h1 id="cover-title" class="card-title"><?= $member['cover_title']; ?></h1>
                    <p id="cover-description" class="card-text"><?= $member['cover_description']; ?></p>
                </div>
            </div>


            <!-- Projects -->

            <h3 class="text-white mt-5">My projects</h3>
            <i id="addProjectBtn" title="Add project" class="float-end fa-solid fa-plus fa-lg text-white"></i>
            <div class="row mt-4 position-relative">
                <?php
                if (!$projects or empty($projects)){
                    echo '<h5 class="text-white">Insert your projects</h5>';
                }

                foreach($projects as $project){ ?>
                <div class="col-sm-6 col-lg-4 mb-5">
                    <i data-id="<?=$project['id'];?>" title="Delete project" class="deleteProjectBtn fa-solid fa-trash-can fa-lg text-white"></i>
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
            <i id="addExperienceBtn" title="Add experience" class="float-end fa-solid fa-plus fa-lg text-white"></i>
            <div class="row mb-5 mt-4 position-relative">
                <?php
                if (!$experiences or empty($experiences)){
                    echo '<h5 class="text-white">Insert your experiences</h5>';
                }

                foreach($experiences as $experience){ ?>
                <div class="col-sm-6 col-lg-4 mb-5 ">
                    <i data-id="<?=$experience['id'];?>" title="Delete experience" class="deleteExperienceBtn fa-solid fa-trash-can fa-lg text-white"></i>
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
                <div>
                    <img class="float-end pb-5" id="img-link" src="images/linkode.webp">
                    <h3 class="text-white mt-5">Feedback</h3>
                </div>
                <div class="form-floating mb-5">
                    <textarea class="form-control bg-dark text-secondary" id="changeFeedback"><?= $member['feedback']; ?></textarea>
                    <label class="text-white pt-2 ps-0" for="floatingTextarea">Leave a comment on the course you took</label>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cover-->
<div class="modal fade" id="showModalCover" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Change description</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="changeTitleModal_text">Title</label>
                <input type="text" id="changeTitleModal_text" class="form-control bg-dark text-white mb-3">
                <label class="text-white" for="changeDescriptionModal_text">Text</label>
                <input type="text" id="changeDescriptionModal_text" class="form-control bg-dark text-white">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnCover btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Name and Job-->
<div class="modal fade " id="showModalNameJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Change information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="changeName">Name</label>
                <input type="text" id="changeName" class="form-control bg-dark text-white mb-3">
                <label class="text-white" for="changeSurname">Surname</label>
                <input type="text" id="changeSurname" class="form-control bg-dark text-white mb-3">
                <label class="text-white" for="changeCurrentJob">Job</label>
                <input type="text" id="changeCurrentJob" class="form-control bg-dark text-white">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnNameJob btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Languages-->
<div class="modal fade " id="addModalLanguages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Add language</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="addLanguage">Language</label>
                <select name="languages" id="addLanguage" class="form-control bg-dark text-white mb-3">

                    <?php foreach ($languages_modal as $l){ 
    $disable="";
    if(in_array($l['id'], $known_languages)){
        $disable="disabled";
    }
                    ?>
                    <option <?=$disable;?> value="<?= $l['id']; ?>"><?= $l['title']; ?></option>
                    <?php } ?>
                </select>

                <label class="text-white" for="addLevel">Level</label>
                <select name="level" id="addLevel" class="form-control bg-dark text-white mb-3">
                    <?php foreach ($languages_level as $language_level){ ?>
                    <option  value="<?= $language_level['id']; ?>"><?= $language_level['level']; ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnLanguages btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Codes-->
<div class="modal fade " id="addModalCodes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Add code</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="addCode">Code</label>
                <select name="code" id="addCode" class="form-control bg-dark text-white mb-3">
                    <?php foreach ($programming_languages_modal as $pl){
    $disable="";
    if(in_array($pl['id'], $known_programming_languages)){
        $disable="disabled";
    }
                    ?>
                    <option <?=$disable;?> value="<?= $pl['id']; ?>"><?= $pl['title']; ?></option>
                    <?php } ?>
                </select>

                <label class="text-white" for="addCodeLevel">Level</label>
                <select name="code_level" id="addCodeLevel" class="form-control bg-dark text-white mb-3">
                    <?php foreach ($programming_languages_level as $programming_language_level){ ?>
                    <option value="<?= $programming_language_level['id']; ?>"><?= $programming_language_level['level']; ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnCodes btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Social-->
<div class="modal fade " id="addModalSocials" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Add social</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="addSocial">Social</label>
                <select name="social" id="addSocial" class="form-control bg-dark text-white mb-3">
                    <?php foreach ($socials_modal as $s){
    $disable="";
    if(in_array($s['id'], $social_inserted)){
        $disable="disabled";
    }
                    ?>
                    <option <?=$disable;?> value="<?= $s['id']; ?>"><?= $s['title']; ?></option>
                    <?php } ?>
                </select>

                <label class="text-white" for="addLinkSocial">Link</label>
                <input type="text" name="link_social" id="addLinkSocial" class="form-control bg-dark text-white mb-3">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnSocials btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Projects-->
<div class="modal fade " id="addModalProjects" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Add project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="addProject">Project</label>
                <input type="text" name="project" id="addProject" class="form-control bg-dark text-white mb-3">

                <label class="text-white" for="addProjectDescription">Description</label>
                <textarea name="description_project" id="addProjectDescription" class="form-control bg-dark text-white mb-3"></textarea>

                <label class="text-white" for="addLinkProject">Link</label>
                <input type="text" name="link_project" id="addLinkProject" class="form-control bg-dark text-white mb-3">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnProjects btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Experiences-->
<div class="modal fade " id="addModalExperiences" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Add experiences</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-white" for="addRole">Role</label>
                <input type="text" name="role" id="addRole" class="form-control bg-dark text-white mb-3">

                <label class="text-white" for="addAgency">Agency</label>
                <input type="text" name="agency" id="addAgency" class="form-control bg-dark text-white mb-3">

                <label class="text-white" for="addExperienceDescription">Description</label>
                <textarea name="description_experience" id="addExperienceDescription" class="form-control bg-dark text-white mb-3"></textarea>

                <label class="text-white" for="addStartExperience">Start</label>
                <input type="date" name="start_experience" id="addStartExperience" class="form-control bg-dark text-white mb-3">

                <label class="text-white" for="addEndExperience">End</label>
                <input type="date" name="end_experience" id="addEndExperience" class="form-control bg-dark text-white mb-3">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="saveBtnExperiences btn btn-warning">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
include "theme/footer.php";
?>