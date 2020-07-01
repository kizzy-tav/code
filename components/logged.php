<div id="content_wrapper_top"></div>
<div id="content_wrapper">

    <div id="sidebar">
        <div id="login">
            <h1>Wellcome</h1>
            <hr>
            <div>
                <div class="text-center"><img src="avatars/<?php echo $_SESSION['user']['avatar'] ?>" style="width: 100px;"></div>

                <div class="text-center">
                    <h1 class=" text-primary"><?php echo $_SESSION['user']['username']; ?></h1>
                </div>
                <div>

                    <span class="badge badge-pill badge-primary p-2 font-weight-bold w-100" style="font-size: 15px;">Posts: <?php echo $_SESSION['user']['posts']; ?></span>
                </div>
            </div>

            <hr>
            <form method="post" action="index.php">
                <input type="submit" name="logout" value="logout" class="btn-warning rounded p-2 font-weight-bold" style="float: right;">
            </form>
        </div>

    </div>