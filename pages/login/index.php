<form action="/handlers/auth.handler.php" method="POST" class="login-form">
  <div class="form-group">
    <label>Username: </label>
    <input type="text" name="username" required>
  </div>

  <div class="form-group">
    <label>Password: </label>
    <input type="password" id="password" name="password" class="form-input" required>
  </div>

  <input type="hidden" name="action" value="login">
  <button type="submit" class="login-btn">Enter The Mines</button>
</form>
