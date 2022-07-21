<?php
include VIEW_PATH . DS . "layout" . DS . "header.php";
include VIEW_PATH . DS . "layout" . DS . "nav.php";
linkHead(["login.css"]);
?>

<!-- Log in form -->

<div class="center login">
  <h1>Login</h1>
  <form method="post" class="login-form">
    <div class="txt_field">
      <label>Username</label>
      <input type="text" name="username" required>
      <span></span>
    </div>
    <div class="txt_field">
      <label>Password</label>
      <input type="password" name="password" required>
      <span></span>
    </div>
    <div class="pass"><a href="">Forgot Password?</a></div>
    <input type="submit" value="Login">
    <div class="signup_link">
      Not a member? <a href="?p=Home&c=Login&a=register">Signup</a>
    </div>
  </form>
</div>


</html>

<?php
include VIEW_PATH . "layout" . DS . "footer.php";
?>