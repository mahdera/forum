<?php

  require_once 'DBConnection.php';

  class Comment{
    private $id;
    private $postId;
    private $theComment;
    private $modifiedBy;
    private $modificationDate;

    public function __construct(){
      $this->setId(0);
      $this->setPostId(0);
      $this->setTheComment(null);
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
     * Get the value of Post Id
     *
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set the value of Post Id
     *
     * @param mixed postId
     *
     * @return self
     */
    public function setPostId($value)
    {
        $this->postId = $value;

        return $this;
    }

    /**
     * Get the value of The Comment
     *
     * @return mixed
     */
    public function getTheComment()
    {
        return $this->theComment;
    }

    /**
     * Set the value of The Comment
     *
     * @param mixed theComment
     *
     * @return self
     */
    public function setTheComment($value)
    {
        @$this->theComment = mysql_real_escape_string($value);

        return $this;
    }

    /**
     * Get the value of Modified By
     *
     * @return mixed
     */
    public function getModifiedBy()
    {
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

    /**
     * Get the value of Modification Date
     *
     * @return mixed
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set the value of Modification Date
     *
     * @param mixed modificationDate
     *
     * @return self
     */
    public function setModificationDate($value)
    {
        $this->modificationDate = $value;

        return $this;
    }

    public function save(){
      try{
        $query = "insert into tbl_comment values(0, $this->postId, '$this->theComment', $this->modifiedBy, NOW() )";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function update($comment){
      try{
        $query = "update tbl_comment set post_id = $comment->getPostId(), the_comment = '$comment->getTheComment()', modified_by = $comment->getModifiedBy(), modification_date = NOW() where id = $comment->getId() ";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function delete($id){
      try{
        $query = "delete from tbl_comment where id = $id";
        DBConnection::save($query);
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function getAllComments(){
      try{
        $query = "select * from tbl_comment order by modification_date desc";
        $result = DBConnection::read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function getAllCommentsOfThisPost($postId){
      try{
        $query = "select * from tbl_comment where post_id = $postId order by modification_date asc";
        $result = DBConnection::read($query);
        return $result;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

    public static function getComment($id){
      try{
        $query = "select * from tbl_comment where id = $id";
        $result = DBConnection::read($query);
        $resultSet = mysql_fetch_object($result);
        return $resultSet;
      }catch(Exception $ex){
        $ex->getMessage();
      }
    }

}//end class
?>
