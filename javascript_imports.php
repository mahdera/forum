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

      $(msg).keypress(function(e) {
        if(e.which == 13) {
          var val = $(msg).val();

          $.ajax({
            url: 'php/ajax.php',
            type: 'GET',
            data: 'token=<?php echo $token; ?>&msg='+encodeURIComponent(val),
            success: function(data) {
              $(msg).val('');
              $(msg).css('height','14px');
              $('#commentscontainer').append(data);
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
    });
</script>
