<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>
    <?php if (isset($data['errors']) && is_array($data['errors'])):?>
        <ul class="errors">
            <?php foreach($data['errors'] as $error):?>
                <li> - <?php echo $error;?></li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
      <main>
            <div class="form">
                    <div id="login">
                      <h1>Welcome Back!</h1>

                      <form action="" method="post">

                        <div class="field-wrap">
                        <label>
                          Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="email" required autocomplete="off"/>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Password<span class="req">*</span>
                        </label>
                        <input type="password" name="password" required autocomplete="off"/>
                      </div>

                      <p class="forgot"><a href="#">Forgot Password?</a></p>

                      <input type="submit" class="button button-block" value="Log In" />

                      </form>
                  </div><!-- content -->

            </div> <!-- /form -->
      </main>
<?php

include_once VIEWS.'/includes/footer.php';
