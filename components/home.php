<div id="content">

    <?php foreach ($postDB as $key => $value) : ?>
        <div class="post_box">



            <h2 class=""><?php echo $value['title']; ?></h2>

            <div class="post_meta"><strong>Date:</strong><?php echo $value['date'] ?><strong> Author:</strong> <?php echo $value['author'] ?> </div>
            <a href="#"><img src="avatars/<?php echo $value['authorAvatar'] ?>" alt="image 2" style="width: 75px" /></a>
            <p><?php echo $value['body']; ?></p>

            <div class="cleaner_h20"></div>

            <div class="cleaner"></div>

        </div>
    <?php endforeach ?>

</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>