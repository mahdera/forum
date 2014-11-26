<?php
  require_once 'DBConnection.php';
  class Post{
      private $id;
      private $subject;
      private $thePost;
      private $modifiedBy;

      public __construct(){
          $this->setId(0);
          $this->setSubject(null);
          $this->setThePost(null);
          $this->setModifiedBy(0);
          $this->setModificationDate(null);
      }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * Get the value of Subject
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of Subject
     *
     * @param mixed subject
     *
     * @return self
     */
    public function setSubject($value)
    {
        $this->subject = $value;

        return $this;
    }

    /**
     * Get the value of The Post
     *
     * @return mixed
     */
    public function getThePost()
    {
        return $this->thePost;
    }

    /**
     * Set the value of The Post
     *
     * @param mixed thePost
     *
     * @return self
     */
    public function setThePost($value)
    {
        $this->thePost = $value;

        return $this;
    }

    /**
     * Get the value of Modified By
     *
     * @return mixed
     */
    public function getModifiedBy(){
        return $this->modifiedBy;
    }

    /**
     * Set the value of Modified By
     *
     * @param mixed modifiedBy
     *
     * @return self
     */
    public function setModifiedBy($value)
    {
        $this->modifiedBy = $value;

        return $this;
    }

    public function save(){
      try{
        $query = "insert into tbl_post values(0, '$this->subject', '$this->thePost', '$this->modifiedBy',NOW() )";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function update($post){
      try{
        $query = "update tbl_post set the_post = '$post->getSubject()', '$post->getThePost()', modified_by = $post->getModifiedBy(), modification_date = NOW() where id = $post->getId()";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function delete($id){
      try{
        $query = "delete from tbl_post where id = $id";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function getAllPosts(){
      try{
        $query = "select * from tbl_post order by modification_date desc";
        $result = DBConnection::read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function getPost($id){
      try{
        $query = "select * from tbl_post where id = $id";
        $result = DBConnection::read($query);
        $resultRow = mysql_fetch_object($result);
        return $resultRow;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

}//end class
?>
