<div id="content_wrapper_top"></div>
<div id="content_wrapper">

    <div id="sidebar">
        <div id="login">
            <h3 class="hr_divider">Member Login</h3>
            <form method="post" action="index.php">
                <label for="username" class="badge badge-pill badge-secondary">Username:</label>
                <input name="Lusername" type="text" class="login_field rounded" id="username" maxlength="30" />
                <div class="cleaner_h10"></div>
                <label for="email" class="badge badge-pill badge-secondary">Password:</label>
                <input name="Lpassword" type="password" class="login_field rounded" id="email" maxlength="30" />
                <div class="cleaner_h10"></div>
                <?php
                if (isset($_GET['home']) && ($_GET['home'] === 'loginError')) {
                    echo "<script type='text/javascript'>alert('Username/password Is Wrong');</script>";
                    echo "<p class='bg-warning text-light text-center mx-auto rounded mb-2 text-warning'>username or password Is Wrong</p>";
                } ?>
                <input type="submit" name="Login" value="Login" class="submit_btn rounded" />
                <input type="submit" name="Register" value="Register" class="submit_btn rounded" />
            </form>


        </div>

    </div>