<?php
session_start();
include('php/functions.php');

//$token = get_token(20);
//$_SESSION['token'] = $token;

?>
<!doctype html>
<html lang="en">
<head>
<title>A php plugin for forum (with post and comments for the post - by mahder)</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/fb-buttons.css" media="screen" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>Welcome to Jungto Forum:</h1>
			<textarea class="subject-holder" placeholder="Write subject of your post..." id="textareatopic"></textarea>
			<textarea class="post-holder" placeholder="Write a post for the subject entered..." id="textareapost"></textarea>
			<br/><br/>
			<div class="pull-right">
				<input type="button" value="Post" class="uibutton large confirm" id="btnPost"/>
			</div>
		</div>

		<div class="content">
			<div class="links">
				<a href="javascript:;" id="unlike_post" class="hide">Unlike</a><a href="javascript:;" id="like_post">Like</a> &middot; <a href="javascript:;" id="post_comment">Comment</a>
			</div>

			<div id="reloadSection">
					<?php
							require 'fetchlatestupdate.php';
					?>
			</div><!--end div reloadSection-->
		</div><!--end div-content-->
	</div>
</body>
</html>
