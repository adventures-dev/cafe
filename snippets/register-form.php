 
<form action="" method="post" id="register-form">
	<div id="register-error"></div>
    <input id="new_username" type="text" name="username" class="input-block-level" placeholder="Username">
    <input id="firstname" type="text" name="firstname" class="input-block-level" placeholder="First Name">
    <input id="lastname" type="text" name="lastname" class="input-block-level" placeholder="Last Name">
    <input id="email" type="email" name="email" class="input-block-level" placeholder="Email" value="<?php echo $email;?>">
    <input id="pass" type="password" name="password" class="input-block-level" placeholder="Password">
    <input id="pass2" type="password" name="password2" class="input-block-level" placeholder="Confirm Password">
    <input type="submit" value="Register" class="btn">
</form>

