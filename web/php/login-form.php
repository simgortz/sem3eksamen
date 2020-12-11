<form class="info-box" action="<?php echo ($pagetoload == "account" ? "index.php?page=account" : "index.php?page=frontpage") ?>" method="post">
    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
    </div>    
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <?php
        if ($pagetoload == "account"){
            echo "
                <div class=\"form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>\">
                    <label>Confirm Password</label>
                    <input type=\"password\" name=\"confirm_password\" class=\"form-control\" value=\"\">
                    <span class=\"help-block\"><?php echo $confirm_password_err; ?></span>
                </div>
            ";
        }
    ?>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="<?php echo ($pagetoload == 'account') ? "Register" : "Login"; ?>">
        <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <?php
        if($pagetoload == "account"){
            echo '<p>Already have an account? Click <a href="index.php?page=frontpage">here</a> to login!</p>';
        }else{
            echo '<p>Don\'t have an account? Click <a href="index.php?page=account">here</a> to create one!</p>';
        }
    ?>
    
</form>