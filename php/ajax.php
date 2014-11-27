<?php
/*
	@! Facebook comments system
	@@ Using PHP, jQuery, and AJAX
*/

session_start();
include('functions.php');
require_once '../classes/Comment.php';

## Server's date and time. Converting it as per local time.
$date = date('Y-m-d H:i:s');
$date = date('c', strtotime($date));

if(isset($_GET['postId']) && isset($_GET['msg'])) {
	$postId = $_GET['postId'];
	$msg = clean_input($_GET['msg']);
		if(!empty($postId) && !empty($msg)) {
			if(true) {				
				$comment = new Comment();
				$comment->setPostId($postId);//next iteration post id is going to be grabbed from the caller.
				$comment->setTheComment($msg);
				$comment->setModifiedBy(2);//this is going to be replaced by the user's logged in id (session ownder)
				$comment->save();

?>
				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/default.gif">
					</div>

					<div class="comment-text pull-left">
						<!--facebook user will have to be replaced by the session value of full name-->
						<span class="color strong"><a href="#">Facebook User</a></span> &nbsp;<?php echo $msg; ?>
						<span class="info"><abbr class="time" title="<?php echo $date; ?>"></abbr></span>
					</div>
				</div>
<?php

			}
		}
}
