<?php
class CartController extends Controller
{
  public function viewAction()
  {
    if (isset($_SESSION["username"])) {
      $userModel = new CustomerModel();
      $user = $userModel->getUser($_SESSION["username"]);
      $userId = $user["customerid"];
      $cartModel = new CartModel();
      $cart = $cartModel->getCartItem($userId);
      if ($cart == false) {
        // view nothing in cart
      } else {
        $cartId = $cart['orderid'];
        $itemModel = new ItemModel();
        $itemList = $itemModel->getCartItem($cartId);
        $_SESSION["orderid"] = $cartId;
        $bookList = $itemList["book"];
        $quantity = $itemList["quantity"];
        // redirect to cart view
        include VIEW_PATH . "home" . DS . "Cart.php";
      }
    } else {
      $this->redirect("?p=home&c=home&a=home", "To home");
    }
  }

  public function addAction()
  {
    if (isset($_SESSION["username"])) {
      $itemId = $_REQUEST["itemid"];
      $orderId = $_SESSION["orderid"];
      $itemModel = new ItemModel();
      $res = $itemModel->addItem($orderId, $itemId);
      echo $res;
    }
  }

  public function deleteAction()
  {
    if (isset($_SESSION["username"])) {
      $itemId = $_REQUEST["itemid"];
      $orderId = $_SESSION["orderid"];
      $itemModel = new ItemModel();
      $res = $itemModel->deleteItem($orderId, $itemId);
    }
  }
}