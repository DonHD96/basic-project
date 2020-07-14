<?php
use \MyProject1\Cores\App;
use \MyProject1\Cores\URL;
use \MyProject1\Cores\Request;
?>

<div id="root">
    <div class="ui secondary  menu">
        <?php foreach (App::get('config/app')['navigation'] as $aRoute=>$aItem): ?>
            <a href="<?= URL::url($aRoute) ;?>" class="<?= $aItem['route'] === Request::uri() ?'active item' : 'item' ;?>" >
                <?= $aItem['name'] ?>
            </a>
        <?php endforeach; ?>

        <div class="right menu">
            <div class="item">
                <div class="ui icon input">
                    <input type="text" placeholder="Search...">
                    <i class="search link icon"></i>
                </div>
            </div>
            <a href="" class="ui item">
                Hello: <?= \MyProject1\Cores\Session::getCurrentUserLoggedIn(); ?>
            </a>
            <a href="<?= URL::url('logout') ?>" class="ui item">
                Logout
            </a>
        </div>
    </div>
</div>