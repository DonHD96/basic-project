<?php
require_once 'views/view/header.php';
use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;
?>
<div id="login">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <?php if(Session::get('error-usernameOrEmail')):?>
            <div class="ui warning message">
                <div class="header">
                    <?= Session::get('error-usernameOrEmail'); ?>
                </div>
            </div>
            <?php endif; ?>
            <form class="ui large form" method="post" action="<?= Url::url('verify-email'); ?>">
                <div class="ui stacked segment">
                    <h4>Verify Your Email Or Username</h4>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="text" name="usernameOrEmail" placeholder="Your email address or username" required>
                        </div>
                    </div>
                    <button onclick=" return confirm('Are you sure to enter your correct account?')" class="ui fluid large teal submit button" type="submit">Submit</button>
                </div>
                <div class="ui message">
                    Back to login page <a href="<?= URL::url('login'); ?>">Sign In</a>
                </div>
            </form>

        </div>
    </div>
</div>
<?php
require_once 'views/view/footer.php';
?>

