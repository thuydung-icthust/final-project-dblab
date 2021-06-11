<div class="row body-container shadow-box bg-blur round-border" style="padding: 3% 5%;">
    <div>
        <form action="/employees/login" method="post">
            <br>
            <p class="highlight">Please enter your username and password to continue</p>
            <h2 class="highlight">Employee Login</h2>
            <br>Username: <input text type="text" size="50" maxlength="50" name="username">
            <br>
            Password: <input text type="password" size="30" maxlength="30" name="password"><br>
            <br>
            <input type="submit" value="Login">
            <input type="reset" value="Reset" class="btn btn-secondary">
            <br>
            <? if (isset($err)) echo $err; ?>
        </form>
    </div>
</div>