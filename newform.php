<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="clientform/loginpage.css">
</head>
<body id="body">
  <div class="container">
    <div class="header">
      <h2>Create Account</h2>
    </div>
    <form action="newform/newformsignup.php" method="POST" class="form" id="form">
      <div class="form-control">
        <label>Username</label>
        <input type="text" name="uid" placeholder="username" id="username" class="text-input">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label>E-mail</label>
        <input type="email" name="email" placeholder="e-mail" id="email" class="text-input">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label>Password</label>
        <input type="password" name="pwd" placeholder="password" id="password" class="text-input">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error Message</small>
      </div>
      <div class="form-control">
        <label>Confirm Password</label>
        <input type="password" name="conpwd" placeholder="confirm password" id="password2" class="text-input">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error Message</small>
      </div>
      <button type="submit" name="submit" class="button">Sign Up</button>
  <span id="items">
    <div class="form-over" id="form-over"><button class="terminate" id="terminate" title="Did you wanna go back to the form">X</button>
        We truly apprreciate everyone for his/her<br>
      support in filling this form<br>
      we will try as much as possible to get back to you<br>
      thanks so much !!!<button id="last">Go Back</button> <br>
    </div>
  </span>
  </form>
  </div>
  <script src="clientform/loginpage.js"></script>
</body>
</html>