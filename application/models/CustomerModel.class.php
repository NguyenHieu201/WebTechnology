<?php
class CustomerModel extends Model
{
  function __construct()
  {
    parent::__construct("customers");
  }
  public function getUsers()
  {
    $sql = "select * from $this->table";
    $user = $this->db->getAll($sql);
    return $user;
  }

  public function getUser($username)
  {
    $sql = "select * from $this->table where username = " . '"' . "$username" . '"';
    $user = $this->db->getRow($sql);
    return $user;
  }

  public function getEmail($email)
  {
    $sql = "select * from $this->table where email = " . '"' . "$email" . '"';
    $user = $this->db->getRow($sql);
    return $user;
  }

  public function addUser($user)
  {
    $this->insert($user);
  }

  public function updatePassword($user)
  {
    $this->update($user);
  }

  public function deleteAccount($userId)
  {
    $this->delete($userId);
  }
}