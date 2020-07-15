<?php
require_once 'views/view/header.php';

use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;

?>
<div id="login">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <?php if (Session::get('register-error')): ?>
                <div class="ui warning message">
                    <div class="header">
                        <?= Session::get('register-error'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <form class="ui large form" method="post" action="<?= Url::url('register') ?>"
                  enctype="multipart/form-data">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="ui fluid large teal submit button">Sign Up</button>
                </div>

            </form>

            <div class="ui message">
                New to us? <a href="<?= URL::url('login') ?>">Sign In</a>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'views/view/footer.php';
?>
