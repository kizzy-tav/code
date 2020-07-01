<div id="content">
    <h2 class="display-4 pl-3" style="background-color: #7a877d;border-radius:15px;">Change Password</h2>

    <form class="mr-4" id="rfrom" action="index.php" method="post" enctype="multipart/form-data">

        <div class="form-row mb-5">
            <div class="col">
                <input type="password" class="form-control" placeholder="Old Password" name="chPassword" value="">
            </div>
        </div>
        <div class="form-row mb-5">
            <div class="col">
                <input type="password" class="form-control" placeholder="New Password" name="chNPassword" value="">
            </div>
        </div>
        <div class="form-row mb-5">
            <div class="col">
                <input type="password" class="form-control" placeholder="Confirim Password" name="chCPassword" value="">
            </div>
        </div>
        <div class="form-row mb-5">
            <div class="col">
                <input type="submit" name="PassChange" value="Save" class="btn-info w-25 text-light p-2 font-weight-bold rounded">
            </div>
        </div>
    </form>

</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>