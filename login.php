<?php require('header.php'); ?>
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form>
                            
                            <input type="email" placeholder="Email Address" name="cus_email" />
                            <input type="password" placeholder="Password" name="cus_password" />
                            <span>
                                <input type="checkbox" name="remember" value="on" class="checkbox"> 
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form>
                            <input type="text" placeholder="Name" />
                            <input type="email" placeholder="Email Address"/>
                            <input type="text" placeholder="Address" />
                            <input type="text" placeholder="Contact #" />
                            <input type="password" placeholder="Password"/>
                            <input type="password" placeholder="Confirm Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
    <?php require('footer.php'); ?>