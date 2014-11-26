<?php
  class Post{
      private $id;
      private $subject;
      private $thePost;
      private $modifiedBy;
      private $modificationDate;

      public __construct($subject, $thePost, $modifiedBy, $modificationDate){
          $this->setSubject($subject);
          $this->setThePost();
          $this->setModifiedBy();
          $this->setModificationDate();
      }
  }//end class
?>
