<div id="content">
    <h2 class="display-4 pl-3" style="background-color: #7a877d;border-radius:15px;">Edit-profile</h2>
    <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'infoUpdated')) {
        echo "<p class='bg-success text-light font-weight-bold text-center mb-2 rounded p-2'>Information updated succefully</p>";
    } ?>
    <!-- profile signup form -->
    <form class="mr-4" id="rfrom" action="index.php" method="post" enctype="multipart/form-data">
        <!-- firstname and lastname -->
        <div class="form-row mb-5">
            <div class="col">
                <span class="badge badge-pill badge-primary mb-1">FIRSTNAME</span>
                <input type="text" class="form-control" placeholder="First name" name="efname" value="<?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                                            echo $_SESSION['user']['firstname'];
                                                                                                        } ?>">
                <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'errFirstname')) {
                    echo "<small class='text-danger pl-2'>firstname must at least have 4 letters</small>";
                } ?>
            </div>
            <div class="col offset-1"">
            <span class=" badge badge-pill badge-primary mb-1">LASTNAME</span>
                <input type=" text" class="form-control" placeholder="Last name" name="elname" value="<?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                                            echo $_SESSION['user']['lastname'];
                                                                                                        } ?>">
                <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'errLastname')) {
                    echo "<small class='text-danger pl-2'>lastname must at least have 4 letters</small>";
                } ?>
            </div>
        </div>


        <!-- username -->
        <span class="badge badge-pill badge-primary mb-1">USERNAME</span>
        <?php if (($_GET['profile'] === 'usernameInvalid')) {
            echo "<p class='bg-danger w-75 text-center mx-auto rounded mb-1 text-warning'>username exist already</p>";
        } ?>
        <div class="form-row mb-5">
            <div class="col">
                <input type="text" class="form-control" placeholder="Username" name="eusername" value="<?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                                            echo $_SESSION['user']['username'];
                                                                                                        } ?>">
                <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'errUsername')) {
                    echo "<small class='text-danger pl-2'>username must at least have 5 letters</small>";
                } ?>
                <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'userExist')) {
                    echo "<small class='text-danger pl-2 p-2'>username already taken</small>";
                } ?>
            </div>
        </div>


        <!-- gender select -->
        <div class="form-row mb-5">
            <div class="col-8">
                <div style="margin-bottom: 25px">
                    <label class="text-center text-primary p-1 input-group-text mb-2 pl-1">Gender </label>


                    <div class="input-group">


                        <input type="radio" name="egender" value="male" class="text-center text-primary p-1 input-group-text" <?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                                                                    echo ($_SESSION['user']['gender'] == 'male' ? 'checked' : '');
                                                                                                                                } ?>> <span class="badge badge-info  ml-2 mr-2">Male</span> <i class="fa fa-male mr-2" aria-hidden="true"></i>
                        <input type="radio" name="egender" value="female" <?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                echo ($_SESSION['user']['gender'] == 'female' ? 'checked' : '');
                                                                            } ?>> <span class="badge badge-danger ml-2 mr-2">female</span> <i class="fa fa-female" aria-hidden="true"></i>
                    </div>
                </div>
            </div>


            <!-- age -->
            <div class="col-3 d-block">
                <div class="input-group">
                    <label class="text-center text-primary p-1  input-group-text w-100">Age</label>
                    <input type="number" name="erage" placeholder="Age" class="form-control" value="<?php if (isset($_SESSION['user']) and $_SESSION['user']) {
                                                                                                        echo $_SESSION['user']['age'];
                                                                                                    } ?>">
                </div>
                <?php if (isset($_GET['profile']) && ($_GET['profile'] === 'errAge')) {
                    echo "<small class='text-danger d-block pl-2'>must be over 18</small>";
                } ?>
            </div>
        </div>


        <!-- avatar upload -->
        <span class="badge badge-pill badge-primary mb-1">AVATAR</span>
        <div class="form-row mb-5">
            <div class="col">
                <input type="file" class="form-control" name="fileToUpload" value="">
                <p class="text-info">Leave empty to use already existing photo</p>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex p-0 ml-4">
                <input type="submit" name="edit" class="btn-info w-75 text-white p-2 font-weight-bold rounded">
                <input type="submit" name="changepass" value="Change Password" class="btn-success w-25 text-white ml-2 float-right p-2 font-weight-bold rounded">
            </div>

        </div>

    </form>

</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>