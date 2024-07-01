$(function(){
    onChange();
    onClick();
});

function onClick(){
    addLanguage();
    deleteLanguage();
    changeImgProfile();
    changeImgCover();
    addCode();
    deleteCode();
    addSocial();
    deleteSocial();
    addProject();
    deleteProject();
    addExperience();
    deleteExperience();
    changeContentCoverBtn();
    changeDescriptionCover();
    changeNameWork();
    changeTitleCover();
    changeName();
    changeSurname();
    changeCurrentJob();
    logoutBtn();
}

function onChange(){
    changeCity();
    changeResidence();
    changeBirthDate();
    changeEducationalQualification();
    changeTelephoneNumber();
    changeEmail();
    changeFeedback();
}

function changeFeedback(){
    jQuery("#changeFeedback").change(function(){
        var text=jQuery("#changeFeedback").val(); 
        location.href="portfolio-editing.php?op=change_feedback&testo="+text;
    });
}

function changeImgProfile(){
    $("#inputFile").click(async function(){
        const { value: file } = await Swal.fire({
            title: "Select image",
            input: "file",
            confirmButtonColor: "#ffc107",
            inputAttributes: {
                "accept": "image/*",
                "aria-label": "Upload your profile picture"
            }
        });
        if (file) {
            const reader = new FileReader();
            reader.onload = async (e) => {
                const imageUrl = e.target.result;
                $('#img-profile').attr('src', imageUrl);

                const formData = new FormData();
                formData.append('file', file);

                try {
                    const response = await fetch('upload-image.php?type=img_profile', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();
                    if (result.success) {
                        Swal.fire({
                            title: "Your uploaded picture",
                            imageUrl: imageUrl,
                            confirmButtonColor: "#ffc107",

                            imageAlt: "The uploaded picture"
                        });
                    } else {
                        Swal.fire("Error", "Failed to upload image.", "error");
                    }
                } catch (error) {
                    Swal.fire("Error", "An error occurred.", "error");
                }
            };
            reader.readAsDataURL(file);
        }
    });
}

function changeImgCover(){
    $("#changeCover").click(async function(){
        const { value: file } = await Swal.fire({
            title: "Select image",
            input: "file",
            confirmButtonColor: "#ffc107",
            inputAttributes: {
                "accept": "image/*",
                "aria-label": "Upload your profile picture"
            }
        });
        if (file) {
            const reader = new FileReader();
            reader.onload = async (e) => {
                const imageUrl = e.target.result;
                $('#img-cover').attr('src', imageUrl);

                const formData = new FormData();
                formData.append('file', file);

                try {
                    const response = await fetch('upload-image.php?type=cover_image', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();
                    if (result.success) {
                        Swal.fire({
                            title: "Your uploaded picture",
                            imageUrl: imageUrl,
                            confirmButtonColor: "#ffc107",

                            imageAlt: "The uploaded picture"
                        });
                    } else {
                        Swal.fire("Error", "Failed to upload image.", "error");
                    }
                } catch (error) {
                    Swal.fire("Error", "An error occurred.", "error");
                }
            };
            reader.readAsDataURL(file);
        }
    });
}

function changeCurrentJob(){
    jQuery(".saveBtnNameJob").click(function(){
        var text=jQuery("#changeCurrentJob").val(); 
        location.href="portfolio-editing.php?op=change_current_job&testo="+text;
    });
}

function changeSurname(){
    jQuery(".saveBtnNameJob").click(function(){
        var text=jQuery("#changeSurname").val(); 
        location.href="portfolio-editing.php?op=change_surname&testo="+text;
    });
}

function changeName(){
    jQuery(".saveBtnNameJob").click(function(){
        var text=jQuery("#changeName").val(); 
        location.href="portfolio-editing.php?op=change_name&testo="+text;
    });
}

function changeDescriptionCover(){
    jQuery(".saveBtnCover").click(function(){
        var text=jQuery("#changeDescriptionModal_text").val(); 
        location.href="portfolio-editing.php?op=change_description&testo="+text;
    });
}

function changeTitleCover(){
    jQuery(".saveBtnCover").click(function(){
        var text=jQuery("#changeTitleModal_text").val(); 
        location.href="portfolio-editing.php?op=change_title&testo="+text;
    });
}

function changeNameWork(){
    jQuery("#changeNameWork").click(function(){ 
        var name=$("#name").html();
        var surname=$("#surname").html();
        var currentJob=$("#current_job").html();
        jQuery("#changeName").val(name);
        jQuery("#changeSurname").val(surname);
        jQuery("#changeCurrentJob").val(currentJob);
        jQuery("#showModalNameJob").modal("show");    
    });
}

function changeContentCoverBtn(){
    jQuery("#changeContentCoverBtn").click(function(){ 
        var titleCover=$("#cover-title").html();
        var descriptionCover=$("#cover-description").html();
        jQuery("#changeTitleModal_text").val(titleCover);
        jQuery("#changeDescriptionModal_text").val(descriptionCover);
        jQuery("#showModalCover").modal("show");    

    });
}

function changeEducationalQualification(){
    jQuery("#changeEducationalQualification").change(function(){
        var text=jQuery("#changeEducationalQualification").val(); 
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_educational_qualification&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function changeTelephoneNumber(){
    jQuery("#changeTelephoneNumber").change(function(){
        var text=jQuery("#changeTelephoneNumber").val();
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_telephone_number&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function changeEmail(){
    jQuery("#changeEmail").change(function(){
        var text=jQuery("#changeEmail").val(); 
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_email&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function changeBirthDate(){
    jQuery("#changeBirthDate").change(function(){
        var text=jQuery("#changeBirthDate").val();
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_birth_date&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function changeResidence(){
    jQuery("#changeResidence").change(function(){
        var text=jQuery("#changeResidence").val();
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_residence&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function changeCity(){
    jQuery("#changeCity").change(function(){
        var text=jQuery("#changeCity").val(); 
        $.ajax({
            method: "GET",
            url: "portfolio-editing.php?op=change_city&testo="+text,
            success: function(){
                Swal.fire({
                    title: "Change Complete!",
                    confirmButtonColor: "#ffc107",
                });
            },
            error: function(){
                Swal.fire({
                    title: "Something went wrong!",
                    confirmButtonColor: "#ffc107",
                });
            }
        });
    });
}

function addLanguage(){
    jQuery("#addLanguageBtn").click(function(){ 
        jQuery("#addModalLanguages").modal("show");

    });
    jQuery(".saveBtnLanguages").click(function(){
        var lang=jQuery("#addLanguage").val();
        var langLev=jQuery("#addLevel").val();
        location.href="portfolio-editing.php?op=add_lang&lang="+lang+"&add_lev&lang_lev="+langLev;
    });
}

function deleteLanguage(){
    jQuery(".deleteLanguageBtn").click(async function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffc107",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                var id=jQuery(this).attr("data-id");
                location.href="portfolio-editing.php?op=delete_lang&delete_lang="+id;
            }
        });
    });

}

function addCode(){
    jQuery("#addCodeBtn").click(function(){ 
        jQuery("#addModalCodes").modal("show");

    });
    jQuery(".saveBtnCodes").click(function(){
        var code=jQuery("#addCode").val();
        var codeLev=jQuery("#addCodeLevel").val();
        location.href="portfolio-editing.php?op=add_code&code="+code+"&add_code_lev&code_lev="+codeLev;
    });
}

function deleteCode(){
    jQuery(".deleteCodeBtn").click(async function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffc107",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                var id=jQuery(this).attr("data-id");
                location.href="portfolio-editing.php?op=delete_code&delete_code="+id;
            }
        });
    });
}

function addSocial(){
    jQuery("#addSocialBtn").click(function(){ 
        jQuery("#addModalSocials").modal("show");
    });
    jQuery(".saveBtnSocials").click(function(){
        var social=jQuery("#addSocial").val();
        var linkSocial=jQuery("#addLinkSocial").val();
        location.href="portfolio-editing.php?op=add_social&social="+social+"&add_link_social&link_social="+linkSocial;
    });
}

function deleteSocial(){
    jQuery(".deleteSocialBtn").click(async function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffc107",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                var id=jQuery(this).attr("data-id");
                location.href="portfolio-editing.php?op=delete_social&delete_social="+id;
            }
        });
    });
}

function addProject(){
    jQuery("#addProjectBtn").click(function(){ 
        jQuery("#addModalProjects").modal("show");

    });
    jQuery(".saveBtnProjects").click(function(){
        var project=jQuery("#addProject").val();
        var projectDescription=jQuery("#addProjectDescription").val();
        var projectLink=jQuery("#addLinkProject").val();
        location.href="portfolio-editing.php?op=add_project&project="+project+"&add_project_description&description="+projectDescription+"&add_link_project&link_project="+projectLink;
    });
}

function deleteProject(){
    jQuery(".deleteProjectBtn").click(async function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffc107",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                var id=jQuery(this).attr("data-id");
                location.href="portfolio-editing.php?op=delete_project&delete_project="+id;
            }
        });
    });

}

function addExperience(){
    jQuery("#addExperienceBtn").click(function(){ 
        jQuery("#addModalExperiences").modal("show");

    });
    jQuery(".saveBtnExperiences").click(function(){
        var role=jQuery("#addRole").val();
        var agency=jQuery("#addAgency").val();
        var experienceDescription=jQuery("#addExperienceDescription").val();
        var startExperience=jQuery("#addStartExperience").val();
        var endExperience=jQuery("#addEndExperience").val();
        location.href="portfolio-editing.php?op=add_role&role="+role+"&add_experience_description&description="+experienceDescription+"&add_agency&agency="+agency+"&start_experience&start="+startExperience+"&end_experience&end="+endExperience;
    });
}

function deleteExperience(){
    jQuery(".deleteExperienceBtn").click(async function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffc107",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                var id=jQuery(this).attr("data-id");
                location.href="portfolio-editing.php?op=delete_experience&delete_experience="+id;
            }
        });
    });
}

const text = "FINAL PROJECT WORK";
let index = 0;

function typeWriter() {
    if (index < text.length) {
        document.getElementById("text").innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 100);
    } else {
        document.getElementById("image").style.opacity = 1;
    }
}

window.onload = typeWriter;