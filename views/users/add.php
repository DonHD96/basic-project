<?php
use \MyProject1\Cores\Url;
require_once 'views/view/header.php';
require_once 'views/view/navigation.php';
?>
    <h4 id="home">INSERT USER</h4>
    <br>
    <div  id="home">
        <form class="ui form" method="post" action="<?= Url::url('addUser') ?>" enctype="multipart/form-data">
            <div class="field">
                <div class="six wide field">
                    <label>UserName</label>
                    <input class="col-xs-4" type="text" name="username" placeholder="UserName" required>
                </div>
            </div>
            <div class="field">
                <div class="six wide field">
                    <label>PassWord</label>
                    <input class="ui input" type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="field">
                <div class="six wide field">
                    <label>Email</label>
                    <input class="ui input" type="email" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="field">
                <div class="six wide field">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
            </div>
            <div  id="home">
                <?= isset($_SESSION['error'])?$_SESSION['error']: ''; ?>
            </div>
            <button class="ui button" type="submit">Save</button>
            <a href="<?= Url::url('home'); ?>" class="ui button" type="submit">Back</a>
        </form>
    </div>

<?php
require_once 'views/view/footer.php';
?>