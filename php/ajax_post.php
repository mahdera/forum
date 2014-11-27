<?php
  session_start();
  require_once '../classes/Post.php';

  $topic = $_POST['topic'];
  $thePost = $_POST['thePost'];

  $post = new Post();
  $post->setTopic($topic);
  $post->setThePost($thePost);
  $post->setModifiedBy(2);//this is going to be replaced by SESSION['LOGGED_USER_ID']
  $post->save();
?>
