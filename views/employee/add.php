<?php

use \MyProject1\Cores\Url;
use \MyProject1\Cores\Session;

require_once 'views/view/header.php';
require_once 'views/view/navigation.php';
?>
    <h4 id="home">INSERT EMPLOYEE</h4>
    <br>
    <div id="home">
        <form class="ui form" method="post" action="<?= Url::url('add-employee') ?>" enctype="multipart/form-data">
            <div class="field">
                <div class="six wide field">
                    <label>Name</label>
                    <input class="col-xs-4" type="text" name="name" placeholder="Name" required>
                </div>
            </div>
            <div class="field">
                <div class="six wide field">
                    <label>Address</label>
                    <input class="ui input" type="text" name="address" placeholder="Address" required>
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
                    <label>Phone</label>
                    <input class="ui input" type="text" name="phone" placeholder="Phone" required>
                </div>
            </div>
            <div class="field">
                <div class="six wide field">
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
            </div>
            <div id="home">
                <?= \MyProject1\Cores\Session::get('error-employee'); ?>
            </div>
            <button onclick="return confirm('Are you sure you want to save this entry ?')" class="ui button"
                    type="submit">Save
            </button>
            <a href="<?= Url::url('employee'); ?>" class="ui button" type="submit">Back</a>
        </form>
        <br>
        <div>
            <?= Session::get('error-employee') ;?>
        </div>
    </div>

<?php
require_once 'views/view/footer.php';
?>