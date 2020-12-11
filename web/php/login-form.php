<!-- Form used for login/register -->
<form class="info-box" action="<?php echo ($pagetoload == "account" ? "index.php?page=account" : "index.php?page=frontpage") ?>" method="post">
    <?php
    if($loggedin == false){
        echo "
        <div class=\"form-group" . ((!empty($username_err)) ? ' has-error' : '') . "\">
            <label>Username</label>
            <input type=\"text\" name=\"username\" class=\"form-control\" value=\"" . $username . "\">
            <span class=\"help-block\">" . $username_err . "</span>
        </div> 
        ";
    }
    ?>
      
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <?php
    if ($pagetoload == "account"){
        if($loggedin){
            // If logged in and on account page, add "New password" field for changing password
            echo "<div class=\"form-group" . ((!empty($new_password_err)) ? ' has-error' : '') . "\">
                <label>New Password</label>
                <input type=\"password\" name=\"new_password\" class=\"form-control\" value=\"" . $new_password . "\">
                <span class=\"help-block\">" . $new_password_err . "</span>
            </div>";
        }
        // If on account page, add password confirmation for account creation/password change
        echo "
            <div class=\"form-group" . ((!empty($confirm_password_err)) ? ' has-error' : '') . "\">
                <label>Confirm Password</label>
                <input type=\"password\" name=\"confirm_password\" class=\"form-control\" value=\"" . $confirm_password . "\">
                <span class=\"help-block\">" . $confirm_password_err . "</span>
            </div>
        ";
    }
    ?>
    <div class="form-group">
    <!-- Change text on button based on subpage -->
    <?php
    if($loggedin == true){
        $submitbuttontext = "Change password";
    }else{
        if($pagetoload == 'account'){
            $submitbuttontext = "Create Account";
        } else{ 
            $submitbuttontext = "Log in";
        }
    }
    ?>
        <input type="submit" class="btn btn-primary" value="<?php echo $submitbuttontext; ?>">
        <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <?php
    // Change text based on subpage
    if($loggedin == false){
        if($pagetoload == "account"){
            echo '<p>Already have an account? Click <a href="index.php?page=frontpage">here</a> to login!</p>';
        }else{
            echo '<p>Don\'t have an account? Click <a href="index.php?page=account">here</a> to create one!</p>';
        }
    }
    ?>
    
</form>