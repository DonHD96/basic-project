<?php
require_once 'views/view/header.php';
use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;
?>
<div id="login">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <?php if(Session::get('login-error')): ?>
            <div class="ui warning message">
                <div class="header">
                    <?= Session::get('login-error') ;?>
                </div>
            </div>
            <?php endif;?>

            <form class="ui large form" method="post" action="<?= Url::url('login'); ?>">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="username" placeholder="Username" required value="<?= isset($_COOKIE['username'])?$_COOKIE['username']:''; ?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password" required value="<?= isset($_COOKIE['password'])?$_COOKIE['password']:''; ?>">
                        </div>
                    </div>

                    <div style="margin-left:-325px; " class="field">
                        <div class="ui checkbox">
                            <input for="remember" type="checkbox" name="remember" value="1">
                            <label id="remember">Remember</label>
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Login</button>
                </div>
            </form>

            <div class="ui message">
                <p><a href="<?= URL::url('verify-email'); ?>">Forgot your password?</a></p>
                New to us? <a href="<?= URL::url('register'); ?>">Sign Up</a>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'views/view/footer.php';
?>

