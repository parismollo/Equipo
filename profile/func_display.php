<?php
    function display_profile($user_info){
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="../design/styles/profile.css">
    </head>
    <body>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"></div>
                                        <h6 class="f-w-600"><?php echo $_SESSION["user"];?></h6>
                                    </div>
                                    <div class="card-block text-center text-white">
                                        <a href="../login/login.php?action=reset">Reset session</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email :</p>
                                                <h6 class="text-muted f-w-400"><?php echo $user_info["email"];?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Username :</p>
                                                <h6 class="text-muted f-w-400"><?php echo $user_info["pseudo"];?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Day of Birth :</p>
                                                <h6 class="text-muted f-w-400"><?php echo $user_info["date"];?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender :</p>
                                                <h6 class="text-muted f-w-400"><?php if($user_info["gender"] == "M")echo "Male" ; else echo "Female";?></h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    }

    function update_profile(){
?>
<?php 
    }
?>
