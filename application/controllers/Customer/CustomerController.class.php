<?php
class CustomerController extends Controller
{
  public function __construct()
  {
    if (!($this->accessAction())) {
      $this->redirect("?p=home&c=Login&a=login", message: "Access Denied");
      $this->isLogin = false;
    } else {
      $this->isLogin = true;
      $this->redirect("?p=home&c=Login&a=login", message: "User Login");
    }
  }

  public function profileAction()
  {
  }

  private function accessAction()
  {
    if (isset($_SESSION["user"])) {
      echo $_SESSION["user"];
      if ($_SESSION["user"] === "admin")
        return true;
      else return false;
    }
    return false;
  }
}