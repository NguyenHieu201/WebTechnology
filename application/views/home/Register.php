<?php
require_once VIEW_PATH . "layout" . DS . "header.php";
include VIEW_PATH . "layout" . DS . "nav.php";
linkHead(['register.css'])
?>
<div class="register">
  <form action="?p=home&c=Login&a=register" method="POST" name="register-form">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="username"><b>Username *</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required onchange="usernameValid()">

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" id="name">

      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="address" id="address">

      <label for="city"><b>City</b></label>
      <input type="text" placeholder="Enter City" name="city" id="city">

      <label for="country"><b>Country</b></label>
      <input type="text" placeholder="Enter Country" name="country" id="country">

      <label for="zip"><b>Zip code</b></label>
      <input id="zip" name="zip" type="text" pattern="[0-9]{5}" placeholder="Enter zip code">

      <label for="email"><b>Email *</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email"
        pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required onchange="emailValid()">

      <label for="psw"><b>Password *</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw"
        pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required onchange="passValid()">

      <label for="psw-repeat"><b>Repeat Password *</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required
        onchange="passValid()">
      <hr>

      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      <button type="submit" class="registerbtn" id="register-submit">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="?p=Home&c=Login&a=Login">Sign in</a>.</p>
    </div>
  </form>
</div>

<script>
function usernameValid() {
  let isExist;
  const username = document.querySelector('input[name=username]');
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      isExist = this.responseText;
      if (isExist == 'true') {
        username.setCustomValidity('username is already exist');
      } else username.setCustomValidity('');
    }
  };
  xmlhttp.open("GET", "?p=Home&c=Login&a=userExist&username=" + username.value, true);
  xmlhttp.send();
}

function emailValid() {
  let isExist;
  const email = document.querySelector('input[name=email]');
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      isExist = this.responseText;
      if (isExist == 'true') {
        email.setCustomValidity('Email is used');
      } else email.setCustomValidity('');
    }
  };
  xmlhttp.open("GET", "?p=Home&c=Login&a=emailExist&email=" + email.value, true);
  xmlhttp.send();
}

function passValid() {
  const password = document.querySelector('input[name=psw]');
  const confirm = document.querySelector('input[name=psw-repeat]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}
</script>

<?php
include VIEW_PATH . "layout" . DS . "footer.php";
?>