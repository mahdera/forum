<?php
  require_once '../classes/Post.php';
  $postId = $_POST['postId'];
  Post::delete($postId);
?>
