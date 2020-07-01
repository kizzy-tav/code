<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Power Blog</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <meta name="keywords" content="power blog" />
    <meta name="description" content="Power Blog" />

    <link rel="stylesheet" href="css/solar.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>


</head>

<body>

    <div id="wrapper">
        <div id="menu">
            <ul>
                <li><a href="index.php?home" class="<?php echo (isset($_GET['home']) ? 'current' : '') ?>">Home</a></li>
                <li><a href="index.php?post" class="<?php echo (isset($_GET['post']) ? 'current' : '') ?>">Post</a></li>
                <li><a href="index.php?profile" class="<?php echo (isset($_GET['profile']) ? 'current' : '') ?>">Profile</a></li>
                <li><a href="index.php?users" class="<?php echo (isset($_GET['users']) ? 'current' : '') ?>">Users</a></li>
            </ul>
        </div> <!-- end of menu -->

        <div id="header">
            <div id="site_title">
                <a href="#" target="_blank"><span class="logo">POWER <br /> BLOG</span></a>
            </div> <!-- end of site_title -->

            <div id="header_right">
                <h1>Project php forums</h1>
                <p>Email: Kizzytav@gmail.com</p>
                <div class="btn_more image_fr"><a href="blog_post.html">Read more</a></div>
            </div>

            <div class="cleaner"></div>
        </div> <!-- end of header -->