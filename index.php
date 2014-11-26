<?php
/*
	@! Facebook comments system
	@@ Using PHP, jQuery, and AJAX
-----------------------------------------------------------------------------
	# author: @akshitsethi
	# web: http://www.akshitsethi.me
	# email: ping@akshitsethi.me
	# mobile: (91)9871084893
-----------------------------------------------------------------------------
	@@ The biggest failure is failing to try.
*/

session_start();
include('php/functions.php');

$token = get_token(20);
$_SESSION['token'] = $token;

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
			<textarea class="subject-holder" placeholder="Write subject of your post..." id="textareasubject"></textarea>
			<textarea class="post-holder" placeholder="Write a post for the subject entered..." id="textareapost"></textarea>
			<br/>
			<div class="pull-right">
				<input type="button" value="Post" class="uibutton large confirm" id="btnPost"/>
			</div>
		</div>

		<div class="content">
			<div class="links">
				<a href="javascript:;" id="unlike_post" class="hide">Unlike</a><a href="javascript:;" id="like_post">Like</a> &middot; <a href="javascript:;" id="post_comment">Comment</a>
			</div>

			<div class="like clearfix">
				<img src="img/like.png" class="pull-left">
				<div class="pull-left">
					<span id="if_like"></span> <span id="likecontent"><span id="count" class="color">8</span> <span id="people" class="color">people</span> like this</span>
				</div>
			</div>

			<div id="commentscontainer">
				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/default.gif">
					</div>

					<div class="comment-text pull-left">
						<span class="pull-left color strong"><a href="#">Mark Zuckerberg</a></span> &nbsp;This is a great example of how the multiple line comments will look like. It seems to be working well.
						<span class="info"><abbr class="time" title="2013-07-08T21:50:03+02:00"></abbr></span>
					</div>
				</div>

				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/default.gif">
					</div>

					<div class="comment-text pull-left">
						<span class="color strong"><a href="#">Akshit Sethi</a></span> &nbsp;How is this going?
						<span class="info"><abbr class="time" title="2013-07-07T21:50:03+02:00"></abbr></span>
					</div>
				</div>
			</div>

			<div class="comments clearfix">
				<div class="pull-left lh-fix">
					<img src="img/default.gif">
				</div>

				<div class="comment-text pull-left">
					<textarea class="text-holder" placeholder="Write a comment.." id="message"></textarea>
				</div>
			</div>
		</div>


	</div>
	<?php require_once 'javascript_imports.php';?>
</body>
</html>
