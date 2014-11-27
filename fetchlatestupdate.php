<?php
  require_once 'classes/Post.php';
  require_once 'classes/Comment.php';

  $postList = Post::getAllPosts();
  while($postRow = mysql_fetch_object($postList)){
    ?>
    <div class="post-text clearfix pull-left">
      <span class="pull-left color strong">Topic: <a href="#"><?php echo $postRow->topic;?></a></span>
      <br/>
      <span class="pull-left color strong"><a href="#"><?php echo $postRow->modified_by;?></a></span> &nbsp;
      <?php
        echo $postRow->the_post;
      ?>
      <span class="info"><abbr class="time" title="<?php echo $postRow->modification_date;?>"></abbr></span>
    </div>
    <div class="like clearfix">
      <img src="img/like.png" class="pull-left">
      <div class="pull-left">
        <span id="if_like"></span> <span id="likecontent"><span id="count" class="color">8</span> <span id="people" class="color">people</span> like this</span>
      </div>
    </div>
    <?php
    $commentList = Comment::getAllCommentsOfThisPost($postRow->id);
    //if(mysql_num_rows($commentList)){
    ?>
    <div id="commentscontainer-<?php echo $postRow->id;?>">
    <?php
    //now get all the comments for this particular post...
      while($commentRow = mysql_fetch_object($commentList)){
        ?>
          <div class="comments clearfix">
            <div class="pull-left lh-fix">
              <img src="img/default.gif">
            </div>
            <div class="comment-text pull-left">
              <span class="pull-left color strong"><a href="#"><?php echo $commentRow->modified_by;?></a></span> &nbsp;
              <?php echo $commentRow->the_comment;?>
              <span class="info"><abbr class="time" title="<?php echo $commentRow->modification_date;?>"></abbr></span>
            </div>
          </div>
        <?php
      }//end while loop - comment
    ?>
    </div>
    <!--Now show the comment adding box at the end of the comment queue-->
    <div class="comments clearfix">
      <div class="pull-left lh-fix">
        <img src="img/default.gif">
      </div>

      <div class="comment-text pull-left">
        <textarea class="text-holder" placeholder="Write a comment.." id="post-<?php echo $postRow->id;?>"></textarea>
      </div>
    </div>
    <?php
    //}//end if mysql_num_rows
  }//end while loop - post
?>
<?php require_once 'javascript_imports.php';?>
