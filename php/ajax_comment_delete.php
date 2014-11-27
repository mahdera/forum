<?php
  require_once '../classes/Comment.php';
  $commentId = $_POST['commentId'];
  Comment::delete($commentId);
?>
