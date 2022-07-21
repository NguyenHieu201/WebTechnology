<?php
class CartModel extends Model
{
  function __construct()
  {
    parent::__construct('orders');
  }
  public function getCartItem($userId)
  {
    $sql = "select * from $this->table where customerid = " . '"' . "$userId" . '"';
    $cart = $this->db->getRow($sql);
    return $cart;
  }
}