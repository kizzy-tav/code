<?php
// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $link = "$_SERVER[REQUEST_URI]";
// var_dump($_GET);
// echo $actual_link;
session_start();
#users array
$myDB = array();

if (!isset($_COOKIE['myDB'])) {
    $user1 = array(
        "firstname" => "kizzy",
        "lastname" => "kasias",
        "username" => "kizzil",
        "age" => "22",
        "password" => "123",
        "gender" => "male",
        "avatar" => "barcelona.png",
        "posts" => 1,

    );
    $myDB[$user1['username']] = $user1;

    $user2 = array(
        "firstname" => "Bakr",
        "lastname" => "Al-Ajrawi",
        "username" => "ajrawi",
        "age" => "22",
        "password" => "123",
        "gender" => "male",
        "avatar" => "bayen-munchen.png",
        "posts" => 1,

    );
    $myDB[$user2['username']] = $user2;

    setcookie("myDB", serialize($myDB), time() + (60 * 50), "/");
}


if (isset($_COOKIE['myDB'])) {
    $myDB = unserialize($_COOKIE['myDB']);
}

#Login form
if (isset($_POST['Login'])) {
    if (array_key_exists($_POST['Lusername'], $myDB) and $myDB[$_POST['Lusername']]['password'] == $_POST['Lpassword']) {
        $_SESSION['user'] = $myDB[$_POST['Lusername']];
        header("location: index.php?home=logged");
    } else {
        header("location: index.php?home=loginError");
    }
}
#logout 
if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
	header("Location: index.php?home");
}

#header regiseter form
if (isset($_POST['Register'])) {
    header("Location: index.php?profile");
}

#register form
if (isset($_POST['rg'])) {
    $_SESSION['vars'] = $Xuser = array(
        "firstname" => $_POST['fname'],
        "lastname" => $_POST['lname'],
        "username" => $_POST['username'],
        "age" => $_POST['rage'],
        "password" => $_POST['rpassword'],
        "gender" => $_POST['rgender'],
        "avatar" => $_FILES['rfileupload'],
        "posts" => 0,

    );
    if (array_key_exists($_POST['username'], $myDB)) {
        header("Location: index.php?profile=usernameInvalid");
        
    } else {
        $imgError 	= "";
		$avatar 	= "";
		$uploadOk 	= 1;
        if(!empty($_FILES['rfileupload']['name'])){
			$target_dir = "avatars/";
			$target_file = $target_dir . basename($_FILES["rfileupload"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["rfileupload"]["tmp_name"]);

			if($check !== false) {
				$uploadOk = 1;

				// Check file size
				if ($_FILES["rfileupload"]["size"] > 500000){
					$imgError = "Sorry, your file is too large.<br>";
					$uploadOk = 0;
				}

				$acceptableTypes = ["jpg", "png", "jpeg", "gif", "tiff", "webm"];

				// Allow certain file formats
				if(!in_array($imageFileType, $acceptableTypes)) {
					$imgError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}

				if($uploadOk)
					if (move_uploaded_file($_FILES["rfileupload"]["tmp_name"], $target_file))
						$avatar = basename($_FILES["rfileupload"]["name"]);
					else
						$imgError = "Sorry, there was an error uploading your file.";
				} else {
					$imgError = "File is not an image.";
					$uploadOk = 0;
				}
			}

        $Xuser = array(
            "firstname" => $_POST['fname'],
            "lastname" => $_POST['lname'],
            "username" => $_POST['username'],
            "age" => $_POST['rage'],
            "password" => $_POST['rpassword'],
            "gender" => $_POST['rgender'],
            "avatar" => $avatar,
            "posts" => 0,

        );
        $myDB[$Xuser['username']] = $Xuser;
        setcookie("myDB", serialize($myDB), time() + (60 * 50), "/");
        unset($_SESSION['vars']);
        header("Location: index.php?home=userRegisterd");
    }
}

#edit form
if(isset($_POST['edit'])){
    $avatar = "";
    if(strlen($_POST['efname'])<4){
        header("Location: index.php?profile=errFirstname");
    }elseif(strlen($_POST['elname'])<4){
        header("Location: index.php?profile=errLastname");
    }elseif(strlen($_POST['eusername'])<5){
        header("Location: index.php?profile=errUsername");
    }elseif($_POST['erage'] < 18){
        header("Location: index.php?profile=errAge");
    }elseif(array_key_exists($_POST['eusername'],$myDB)){
        header("Location: index.php?profile=userExist");
    }else{
        if($_FILES['fileToUpload']['size'] == 0){
            $avatar = $_SESSION['user']['avatar'];
        }
        $imgError 	= "";
		
        $uploadOk 	= 1;
        if(!empty($_FILES['fileToUpload']['name'])){
			$target_dir = "avatars/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

			if($check !== false) {
				$uploadOk = 1;

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000){
					$imgError = "Sorry, your file is too large.<br>";
					$uploadOk = 0;
				}

				$acceptableTypes = ["jpg", "png", "jpeg", "gif", "tiff", "webm"];

				// Allow certain file formats
				if(!in_array($imageFileType, $acceptableTypes)) {
					$imgError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}

				if($uploadOk)
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
						$avatar = basename($_FILES["fileToUpload"]["name"]);
					else
						$imgError = "Sorry, there was an error uploading your file.";
				} else {
					$imgError = "File is not an image.";
					$uploadOk = 0;
				}
			}
         $Xuser = array(
            "firstname" => $_POST['efname'],
            "lastname" => $_POST['elname'],
            "username" => $_POST['eusername'],
            "age" => $_POST['erage'],
            "password" => $_SESSION['user']['password'],
            "gender" => $_POST['egender'],
            "avatar" => $avatar,
            "posts" => $_SESSION['user']['posts'],

        );
       
        unset($myDB[$_SESSION['user']['username']]);
        $myDB[$_POST['eusername']] = $Xuser;
        $_SESSION['user'] = $Xuser;
        setcookie("myDB", serialize($myDB), time()+ (60 * 20), "/");
        header("Location: index.php?profile=infoUpdated");
    }
}
#btn header password form 
if(isset($_POST['changepass'])){
    header("Location: index.php?profile=password");
}
#password rest
if(isset($_POST['PassChange'])){
    if($_POST['chPassword'] != $_SESSION['user']['password']){
        echo "<script type='text/javascript'>alert('old password is wrong');</script>";
        echo "<script type='text/javascript'>window.location='index.php?profile=password';</script>";     
    }elseif($_POST['chNPassword'] != $_POST['chCPassword']){
        echo "<script type='text/javascript'>alert('password doesnt not match');</script>";
        echo "<script type='text/javascript'>window.location='index.php?profile=password';</script>";

    }elseif($_POST['chNPassword'] ==''){
        echo "<script type='text/javascript'>alert('password Cant be EMPTY');</script>";
        echo "<script type='text/javascript'>window.location='index.php?profile=password';</script>";
    }elseif(strlen($_POST['chNPassword'])<6){
        echo "<script type='text/javascript'>alert('new password must be 6 chars OR more');</script>";
        echo "<script type='text/javascript'>window.location='index.php?profile=password';</script>";
    }else{
        $Xuser = array(
			"firstname" => $_SESSION['user']['firstname'],
			"lastname" => $_SESSION['user']['lastname'],
			"username" => $_SESSION['user']['username'],
			"age" => $_SESSION['user']['age'],
			"password" => $_POST['chNPassword'] ,
			"gender" => $_SESSION['user']['gender'],
			"avatar" => $_SESSION['user']['avatar'],
			"posts" => $_SESSION['user']['posts'],

        );
        unset($myDB[$_SESSION['user']['username']]);
        $myDB[$_SESSION['user']['username']] = $Xuser;
        unset($_SESSION['user']);
        setcookie("myDB", serialize($myDB), time()+ (60 * 20), "/");
        header("Location: index.php?home=changedpassword");
    }
}




date_default_timezone_set('America/Montreal');
#post db 
$date = date("l Y-m-d h:i:sa");
if (!isset($_COOKIE['postDB'])) {
	$postDB = array();
	$post1 = array(
		"date" => "Thursday 2019-05-16 11:58:02am",
		"author" => $myDB['kizzil']['username'],
		"authorAvatar" => $myDB['kizzil']['avatar'],
		"title" => "MEET WARDEN",
		"body" => "Preparation and improvisation are usually opposite concepts, but Collinn “Warden” McKinley somehow manages to encompass both. With a career of 30 years and counting, he has certainly gained the experience to handle all of it.

		Hailing from the state of Kentucky, McKinley rose through the ranks of the Marines before he found his calling for close-protection detail in the Secret Service. He demonstrated his skills distinctly when he led the Secretary of State to safety, during an attack where hostiles outmaneuvered all prior planning.

		The events of that day gave him the idea for his gadget’s prototype, the Glance Smart Glasses. They reflect the nature of his natural talent, to see what most cannot in order to gain the upper hand in any given situation. He would be just as talented without them, but with them, there’s nothing he can’t tackle."
	);
	$postDB[$post1['author']] = $post1;
	$post2 = array(
		"date" => "Thursday 2019-05-16 11:58:02am",
		"author" => $myDB['ajrawi']['username'],
		"authorAvatar" => $myDB['ajrawi']['avatar'],
		"title" => "MEET NØKK",
		"body" => "Nøkk has been a mystery for quite some time. There is very little that anyone outside Rainbow knows about her. For an accomplished undercover agent whose work remains mostly unrecorded, it is amazing that she has managed to hold onto who she is at her core.

		Focused and driven, she uses her special operations training to infiltrate, gather intel and defeat her opponents. As a member of the Jægerkorpset, she strikes fear into the hearts of anyone who goes up against her.

		On top of that, she harnesses a spirit of loyalty and leads by example to elevate the people she works with. Unlike the general population, her fellow Operators know who she is and welcome her into the fold. The potential scandal her family might face is of little importance to them; she’s one of the best in her field, and they wouldn’t betray her even if it came to that."
	);

	$postDB[$post2['author']] = $post2;
	setcookie("postDB", serialize($postDB), time()+ (60 * 50), "/");

}else{
	$postDB = unserialize($_COOKIE['postDB']);
	if (isset($_POST['shout'])) {
        if(strlen($_POST['title'])<4){
            header("Location: index.php?post=shortTitle");
        }elseif(strlen($_POST['body'])<=6){
            header("Location: index.php?post=shortBody");
        }else{      
		$post = array(
			"date" => $date,
			"author" => $_SESSION['user']['username'],
			"authorAvatar" => $_SESSION['user']['avatar'],
			"title" => $_POST['title'],
			"body" => $_POST['body']
		);
		$numOfPost = $myDB[$_SESSION['user']['username']]['posts'];
        $numOfPost++;
		array_unshift($postDB,$post) ;
		setcookie("postDB", serialize($postDB), time()+ (60 * 50), "/");
		// $postDB = unserialize($_COOKIE['postDB']);
		header('Location: index.php?home');
		

		$myDB[$_SESSION['user']['username']]['posts'] = $numOfPost;
		setcookie("myDB", serialize($myDB), time()+ (60 * 50), "/");
        $_SESSION['user'] = $myDB[$_SESSION['user']['username']];
        
    }

	}
}
unset($postDB['kizzil']);
if(isset($_GET['home']) && $_GET['home']=='changedpassword'){
    echo "<script type='text/javascript'>alert('Password was changed please log in');</script>";
}
if(isset($_GET['home']) && $_GET['home']=='userRegisterd'){
    echo "<script type='text/javascript'>alert('You User Account was registerd');</script>";
}
if(isset($_GET['profile']) && $_GET['profile']=='userExist'){
    echo "<script type='text/javascript'>alert('Username exists already.');</script>";
}
if(isset($_GET['post']) && $_GET['post']=='shortTitle'){
    echo "<script type='text/javascript'>alert('Post title must be 4 letters at least'); $('input[name=title]').css('border-color','red');</script>";
}
if(isset($_GET['post']) && $_GET['post']=='shortBody'){
    echo "<script type='text/javascript'>alert('Post body must be 10 letters at least');</script>";
}
// var_dump($myDB);
// var_dump($_SESSION['user']);
// var_dump($postDB);
?>

<?php include "components/header.php" ?>
<?php if(!isset($_SESSION['user'])){include "components/sidebar.php";}else{include "components/logged.php";} ?>
<?php if (isset($_GET['home'])) {include 'components/home.php';}?>
<?php if (isset($_GET['post'])) {include 'components/post.php';}?>
<?php if (isset($_GET['profile'])) {if(!isset($_SESSION['user'])){include "components/profile.php";}elseif($_GET['profile']==='password'){include "components/password.php";}else{include "components/edit.php";}}?>
<?php if (isset($_GET['users'])) {include 'components/users.php';} ?>
<?php include "components/footer.html" ?>
