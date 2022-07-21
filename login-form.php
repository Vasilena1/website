<form action="login.php" method="get">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
  
    <div class="container">
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
  
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <?php
      if (isset($_SESSION["loginError"])) {
        echo "<p style='color:red'> Invalid input! </p>";
      }
      unset($_SESSION["loginError"]);
    ?>
  </form>