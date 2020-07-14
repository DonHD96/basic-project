<?php
require_once 'views/view/header.php';
use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;
$token = explode('/',$_GET['route']);
?>
<div id="login">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <form class="ui large form" method="post" action="<?= Url::url('reset-password').'/'.$token[1] ; ?>">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="new_password" placeholder="New password" required >
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="new_password_c" placeholder="Confirm new password" required >
                        </div>
                    </div>

                    <button onclick=" return confirm('Are you sure want to save the changed password?')" class="ui fluid large teal submit button" type="submit">Reset Password</button>
                </div>
                <div class="ui message">
                    Click here to login: <a href="<?= URL::url('login'); ?>">Sign In</a>
                </div>
                <div>
                    <?= Session::get('error-reset'); ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once 'views/view/footer.php';
?>

