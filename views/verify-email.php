<?php
require_once 'views/view/header.php';
use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;
?>
<div id="login">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <form class="ui large form" method="post" action="<?= Url::url('verify-email'); ?>">
                <div class="ui stacked segment">
                    <h4>Verify Your Email</h4>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="email" name="email" placeholder="Your email address" required>
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Submit</button>
                </div>
                <div class="ui message">
                    Back to login page <a href="<?= URL::url('login'); ?>">Sign In</a>
                </div>
                <div>
                    <?= Session::get('error-email'); ?>
                </div>
            </form>

        </div>
    </div>
</div>
<?php
require_once 'views/view/footer.php';
?>

