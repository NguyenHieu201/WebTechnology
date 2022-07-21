<?php
class LoginController extends Controller
{
  public function loginAction()
  {
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
      if ($_SESSION["username"] !== "" && $_SESSION["password"] !== "") {
        $this->redirect("?p=Home&c=Home&a=Home", "To home");
      } else
        include CURR_VIEW_PATH . "Login.php";
    } else {
      if (array_key_exists("username", $_POST)) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $CustomerModel = new CustomerModel();
        $user = $CustomerModel->getUser($username);
        if ($user != false) {
          if ($username === $user["username"] && $password === $user["password"]) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            if ($user["level"] == 0) { {
                $_SESSION["user"] = "user";
                unset($_POST["username"]);
                unset($_POST["password"]);
                $this->redirect("?p=Home&c=Home&a=Home", "To home");
              }
            } else {
              $_SESSION["user"] = "admin";
              unset($_POST["username"]);
              unset($_POST["password"]);
              $this->redirect("?p=admin&c=index&a=product", "To home");
            }
          }
        }
      } else include CURR_VIEW_PATH . "Login.php";
    }
  }

  public function logoutAction()
  {
    session_destroy();
    $this->redirect("?p=Home&c=Home&a=Home", "return Home");
  }

  public function registerAction()
  {
    if (array_key_exists("username", $_POST)) {
      # Get data from POST request
      $username = $_POST["username"];
      $name = $_POST["name"];
      $address = $_POST["address"];
      $city = $_POST["city"];
      $country = $_POST["country"];
      $zip = $_POST["zip"];
      $email = $_POST["email"];
      $password = $_POST["psw"];

      # add new user to db
      $userModel = new CustomerModel();
      $userModel->addUser([
        'name' => $name,
        'address' => $address,
        'city' => $city,
        'zip_code' => $zip,
        'country' => $country,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'level' => 0
      ]);

      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
      $_SESSION["user"] = "user";

      $_POST = array();
      $this->redirect("?p=Home&c=Home&a=Home", "return Home");
    } else include VIEW_PATH . "home" . DS . "Register.php";
  }

  public function userExistAction()
  {
    $username = $_REQUEST['username'];
    $userModel = new CustomerModel();
    $user = $userModel->getUser($username);
    echo $user == false ? "false" : "true";
  }

  public function emailExistAction()
  {
    $email = $_REQUEST['email'];
    $userModel = new CustomerModel();
    $user = $userModel->getEmail($email);
    echo $user == false ? "false" : "true";
  }
}