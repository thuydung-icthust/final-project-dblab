<div class="body-container large-p-base">
    <div class="shadow-box p-base round-border">
        <form action="/customer/login" method="post">
            <h3 class="text-center">Login form</h3>
            <p class="highlight text-center">Please enter your username and password to continue</p>
            <br>Username: <input text type="text" size="30" maxlength="50" minlength="3" name="username">
            <br>Password: <input text type="password" size="30" maxlength="30" minlength="3" name="password">
            <br />
            <br />
            <input type="submit" value="Login">
            <input type="reset" value="Reset" class="btn btn-secondary">
            <br />
            <br />
            <a href="/customer/register">Don't have an account? Click here to join with us!</a>
            <? if (isset($err)) {
                echo '<br>';
                echo "<p style='color:red;'>$err</p>";
            }?>
        </form>
    </div>
</div>
