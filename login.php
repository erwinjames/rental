<?php require('header.php'); ?>
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form id="user_login-form">
                            
                            <input type="email" placeholder="Email Address" id="cus_email" name="cus_email" required/>
                            <input type="password" placeholder="Password" id="cus_password" name="cus_password" required/>
                            <span>
                                <input type="checkbox" name="remember" value="on" class="checkbox"> 
                                Keep me signed in
                            </span>
                            <button type="submit" value="Login" id="user_login-button" name="user_login-button" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form id="costumer-form">
                            <input type="text" id="tx-name" name="tx-name" placeholder="Name" />
                            <input type="email" id="tx-email" name="tx-email" placeholder="Email Address"/>
                            <input type="text" id="tx-address" name="tx-address" placeholder="Address" />
                            <input type="text" id="tx-cnum" name="tx-cnum" placeholder="Contact #" />
                            <input type="password" id="tx-pass" name="tx-pass" placeholder="Password"/>
                            <input type="password" id="tx-cpass" name="tx-name" placeholder="Confirm Password"/>
                            <button type="submit" id="tx-constumer-btn" name="tx-constumer-btn" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
    <?php require('footer.php'); ?>