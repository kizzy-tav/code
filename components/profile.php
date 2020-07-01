<div id="content">
    <h2 class="display-4 pl-3" style="background-color: #7a877d;border-radius:15px;">Sign-Up</h2>

    <form class="mr-4" id="rfrom" action="index.php" method="post" enctype="multipart/form-data">
        <!-- firstname and lastname -->
        <div class="form-row mb-5">
        
            <div class="col">
            <span class="badge badge-pill badge-primary mb-1">FIRST NAME</span>
                <input type="text" class="form-control" placeholder="First name" name="fname" value="<?php if (isset($_SESSION['vars'])) {
                                                                                                            foreach ($_SESSION['vars'] as $x => $y) {
                                                                                                                if ($x == "firstname") {
                                                                                                                    echo $y;
                                                                                                                }
                                                                                                            }
                                                                                                        } ?>">
                <small class="text-danger pl-2">firstname must at least have 4 letters</small>
            </div>
            
            <div class="col offset-1"">
            <span class="badge badge-pill badge-primary mb-1">LAST NAME</span>
                <input type=" text" class="form-control" placeholder="Last name" name="lname" value="<?php if (isset($_SESSION['vars'])) {
                                                                                                            foreach ($_SESSION['vars'] as $x => $y) {
                                                                                                                if ($x == "lastname") {
                                                                                                                    echo $y;
                                                                                                                }
                                                                                                            }
                                                                                                        } ?>">
                <small class="text-danger pl-2">lastname must at least have 4 letters</small>
            </div>
        </div>


        <!-- username -->
        <?php if (($_GET['profile'] === 'usernameInvalid')) {
            echo "<p class='bg-warning w-75 text-light text-center mx-auto rounded mb-1 text-warning'>username exist already</p>";
        } ?>

        <div class="form-row mb-5">
            <div class="col">
            <span class="badge badge-pill badge-primary mb-1">USERNAME</span>
                <input style=" <?php if (($_GET['profile'] === 'usernameInvalid')) {
                                    echo 'border-color:red;';
                                } ?>" type="text" class="form-control" placeholder="Username" name="username" value="<?php if (isset($_SESSION['vars'])) {
                                                                                                                            foreach ($_SESSION['vars'] as $x => $y) {
                                                                                                                                if ($x == "username") {
                                                                                                                                    echo $y;
                                                                                                                                }
                                                                                                                            }
                                                                                                                        } ?>">
                <small class="text-danger pl-2">username must at least have 5 letters</small>
            </div>
        </div>

        <!-- gender select -->
        <div class="form-row mb-5">
            
            <div class="col-9">
            <span class="badge badge-pill badge-primary mb-1">GENDER</span>
                <select class="form-control" name="rgender" id="rselectgender">
                    <option value="" id="rserr">Select Gender</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div class="col-2 ml-4">
            <span class="badge badge-pill badge-primary mb-1">AGE</span>
                <input type="number" name="rage" placeholder="Age" class="form-control" value="<?php if (isset($_SESSION['vars'])) {
                                                                                                    foreach ($_SESSION['vars'] as $x => $y) {
                                                                                                        if ($x == "age") {
                                                                                                            echo $y;
                                                                                                        }
                                                                                                    }
                                                                                                } ?>">
                <small class="text-danger pl-2">must be over 18</small>
            </div>
        </div>

        <!-- password and confirm pssword -->
        <div class="form-row mb-5">
            <div class="col">
            <span class="badge badge-pill badge-primary mb-1">PASSWORD</span>
                <input type="password" class="form-control" placeholder="Password" name="rpassword">
                <small class="text-danger pl-2">password must at least have 6 charcters</small>
            </div>
            <div class="col offset-1"">
            <span class="badge badge-pill badge-primary mb-1">CONFIRM PASSWORD</span>
                <input type="password" class="form-control" placeholder="Confirm Password" name="conf">
                <small class="text-danger pl-2">password doesnt match</small>
            </div>
        </div>

        <!-- avatar upload -->
        <div class="form-row mb-5">
            <div class="col">
            <span class="badge badge-pill badge-primary mb-1">AVATAR</span>
                <input type="file" class="form-control" name='rfileupload'>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex p-0 ml-4">
                <input type="submit" name="rg" class="btn-info w-75 text-light p-2 font-weight-bold rounded">
                <input type="reset" name="rest" class="btn-info w-25 text-light ml-2 float-right p-2 font-weight-bold rounded">
            </div>

        </div>

    </form>

</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>

<script>
    $(document).ready(function() {
        $('small').hide();
        $('input[name=fname]').keyup(function() {
            lengthValidator($(this), 4);
        });

        $('input[name=lname]').keyup(function() {
            lengthValidator($(this), 4);
        });

        $('input[name=username]').keyup(function() {
            lengthValidator($(this), 5);
        });

        $('input[name=rpassword]').keyup(function() {
            lengthValidator($(this), 6);
        });

        $('input[name=conf]').keyup(function() {
            if (($(this).val()) != ($('input[name=rpassword]').val())) {
                $(this).next().show();
                $(this).css('border-color', 'red')
            } else {
                $(this).next().hide();
                $(this).css('border-color', 'unset')
            }
        });


        $('#rfrom').submit(function() {
            var valid = true;

            var fname = $('input[name=fname]');
            var lname = $('input[name=lname]');
            var username = $('input[name=username]');
            var avatar = $('input[name=rfileupload');
            var gender = $('select[name=rgender');
            var age = $('input[name=rage]');


            if (!lengthValidator(fname, 4)) {
                valid = false;
            }
            if (!lengthValidator(lname, 4)) {
                valid = false;
            }
            if (!lengthValidator(username, 5)) {
                valid = false;
            }
            if (!lengthValidator($('input[name=rpassword]'), 6)) {
                valid = false;
            }
            if (gender.val() == '') {
                $('#rselectgender').css('border', '1px solid red');
                $('#rserr').text('-->Select Gender Please<--');
                valid = false;

            }
            if (parseInt($('input[name=rage]').val()) < 18 || $('input[name=rage]').val() == '') {
                alert('must 18 over');
                $('input[name=rage]').css('border-color', 'red');
                valid = false;
            }
            if ($('input[name=conf]').val() != $('input[name=rpassword]').val()) {
                alert('password dosent match');
                $('input[name=conf]').css('border-color', 'red');
                valid = false;
            }

            var values = "";

            if (valid) {
                values += 'Gender: ' + gender.val() + '\n';
                values += 'Lastname: ' + lname.val() + '\n';
                values += 'Firstname: ' + fname.val() + '\n';
                values += 'Age: ' + age.val() + '\n';
                values += 'Username: ' + username.val() + '\n';
                values += 'avatar: ' + avatar.val() + '\n';
                var c = confirm("Are You Sure This is Valid Information?\n\n" + values);
                if (c == true) {
                    return true;
                }
                if (c == false) {
                    return false;
                }
            }



            return valid;


        });

        $('input[name=rest]').click(function() {
            rest();
        })

    })

    function lengthValidator(value, length) {
        valid = true;
        if (value.val().length < length) {
            value.next().show();
            value.css('border-color', 'red');
            valid = false;
        } else {
            value.next().hide();
            value.css('border-color', 'unset');
            value.addClass('is-valid')
            valid = true;
        }
        return valid;
    }
    //RESET FUNCITON
    function rest() {
        $('small').hide();
        $('input.form-control, select').css('border-color', '#ced4da');
        $('#rserr').text('Select Gender');

    }
</script>