<div id="content">

    <?php if (isset($_SESSION['user']) and $_SESSION['user']) : ?>
        <h1>shout out</h1>
        <hr>
        <form method="post" action="index.php">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text text-white" id="inputGroup-sizing-sm">Title</span>
                </div>
                <input type="text" name="title" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm">

                <input class="form-control mt-4" type="text" name="body" style="height: 200px;">
            </div>

            <div class="input-group input-group-sm d-block">
                <label for="shout" class="input-group-text text-white text-center"><span class="m-auto">Message</span></label>
                <input type="submit" name="shout" value="Shout-Out" class="btn-info float-right m-2 p-2 rounded text-light font-weight-bolder">

            </div>

        </form>
    <?php endif ?>


    <?php if (!isset($_SESSION['user']) or !$_SESSION['user']) : ?>
        <h1>LOGIN BEFORE POSTING</h1>
        <img src="images/troll.jpg" style="width: 545px;">
    <?php endif ?>



    <div class="cleaner"></div>
</div> <!-- end of content -->

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>
</div> <!-- end of wrapper -->