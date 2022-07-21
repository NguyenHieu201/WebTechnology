<?php
class ItemModel extends Model
{
  function __construct()
  {
    parent::__construct('order_items');
  }

  function getCartItem($cartId)
  {
    $sql = "select * from $this->table where orderid = " . '"' . "$cartId" . '"';
    $itemList = $this->db->getAll($sql);
    $itemId = [];
    $itemQuantity = [];
    foreach ($itemList as $item) {
      $id = $item["book_id"];
      $quantity = $item["quantity"];
      $itemId[] = $id;
      $itemQuantity[] = $quantity;
    }
    $bookModel = new BookModel();
    $bookList = $bookModel->getBooksCart($itemId);
    return [
      "book" => $bookList,
      "quantity" => $itemQuantity
    ];
  }

  function deleteItem($cartId, $itemId)
  {
    $this->delete([$cartId, $itemId]);
  }

  function addItem($cartId, $itemId)
  {
    $sql = "select * from $this->table where orderid = " . '"' . $cartId . '"' . 'and book_id = "' . $itemId . '"';
    $item = $this->db->getRow($sql);

    // if item is not is db
    // query will be insert new record
    if ($item == false) {
      $this->insert([
        "orderid" => $cartId,
        "book_id" => $itemId,
        "quantity" => 1
      ]);
      return "New book is add to your cart";
    } else {
      // else update record
      $this->update([
        "orderid" => $cartId,
        "book_id" => $itemId,
        "quantity" => $item["quantity"] + 1
      ]);
      return "Your book quantity is increase";
    }
  }
}