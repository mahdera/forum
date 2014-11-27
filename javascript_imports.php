<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.timeago.js"></script>
<script type="text/javascript" src="js/jquery.autosize.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      var msg = '#message';

      $('.time').timeago();
      $(msg).autosize();

      $('#post_comment').click(function() {
        $(msg).focus();
      });

      $('.text-holder').keypress(function(e) {
        if(e.which == 13) {//this is the ASCI code for Enter key
          var val = $(this).val();
          var crudId = $(this).attr('id');
          var tokens = crudId.split("-");
          var postId = tokens[1];
          var divId = "commentscontainer-" + postId;

          $.ajax({
            url: 'php/ajax.php',
            type: 'GET',
            data: 'msg='+encodeURIComponent(val)+'&postId='+postId,
            success: function(data) {
              $('.text-holder').val('');
              $('.text-holder').css('height','14px');
              $('#' + divId).append(data);
              $('.time').timeago();
            }
          });
        }
      });

      $('#like_post').click(function() {
        var count = parseFloat($('#count').html()) + 1;
        if(count > 1) {
          $('#if_like').html('You and');
          $('#people').html('others');
        } else {
          $('#if_like').html('You like this.');
          $('#likecontent').hide();
        }

        $('#like_post').hide();
        $('#unlike_post').show();
      });

      $('#unlike_post').click(function() {
        var count = parseFloat($('#count').html()) - 1;
        if(count < 1) {
          $('#likecontent').show();
        }
        $('#unlike_post').hide();
        $('#like_post').show();
        $('#if_like').html('');
        $('#people').html('people');
      });

      $('#btnPost').click(function(){
        var thePost = $('#textareapost').val();
        var topic = $('#textareatopic').val();
        if(thePost != "" && topic != ""){
          $.ajax({
            url: 'php/ajax_post.php',
            type: 'POST',
            data: 'thePost='+encodeURIComponent(thePost)+'&topic='+encodeURIComponent(topic),
            success: function(data) {
              $('#textareapost').val('');
              $('#textareatopic').val('');
              $('#reloadSection').load('fetchlatestupdate.php');
            }
          });
        }else{
          alert('Enter topic and post text!');
        }
      });

      $('.deletePost').click(function(){
        if(window.confirm('Are you sure you want to delete this post and its associated comments?')){
          var crudId = $(this).attr('id');
          var tokens = crudId.split("-");
          var postId = tokens[1];
          $.ajax({
            url: 'php/ajax_post_delete.php',
            type: 'POST',
            data: 'postId='+postId,
            success: function(response){
              $('#reloadSection').load('fetchlatestupdate.php');
            }
          });
        }
      });

      $('.deleteComment').click(function(){
        if(window.confirm('Are you sure you want to delete this comment?')){
          var crudId = $(this).attr('id');
          var tokens = crudId.split("-");
          var commentId = tokens[1];
          $.ajax({
            url: 'php/ajax_comment_delete.php',
            type: 'POST',
            data: 'commentId='+commentId,
            success: function(response){
              $('#reloadSection').load('fetchlatestupdate.php');
            }
          });
        }
      });

    });//end document.ready function
</script>
