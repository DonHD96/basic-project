<?php

use  \MyProject1\Model\UsersModel;

require_once 'views/view/header.php';
require_once 'views/view/navigation.php';
use \MyProject1\Model\PositionModel;
?>
<div class="ui segment" id="home">
    Home Page
</div>
<?php //if (isset($_SESSION['username'])): ?>
<!--    --><?php //if ($_SESSION['username'] == 'admin'): ?>
        <div class="ui segment" id="home">
            <table class="ui compact celled definition table">
                <thead class="full-width">
                <tr>
                    <th></th>
                    <th>STT</th>
                    <th>UserName</th>
                    <th>PassWord</th>
                    <th>Email</th>
                    <th>Create Date</th>
<!--                    <th></th>-->
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (UsersModel::getAll() as $aUser): ?>
                    <tr>
                        <td class="collapsing">
                            <div class="ui fitted slider checkbox">
                                <input type="checkbox"> <label></label>
                            </div>
                        </td>
                        <td><?= $aUser['ID'] ?></td>
                        <td><?= $aUser['username'] ?></td>
                        <td><?= $aUser['password'] ?></td>
                        <td><?= $aUser['email'] ?></td>
                        <td><?= $aUser['reg_date'] ?></td>
<!--                        <td><a href="updateUser/--><?//= $aUser['ID']; ?><!--">-->
<!--                                <div class="ui right floated center small primary  icon button">-->
<!--                                    <i class="edit icon"></i> Edit-->
<!--                                </div>-->
<!--                            </a></td>-->
                        <td><a onclick=" return confirm('Are you sure you want to delete this entry ?')"
                               href="delete-user/<?= $aUser['ID'] ?>">
                                <div class="ui right floated center small primary  icon button">
                                    <i class="trash alternate icon"></i> Del
                                </div>
                            </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
<!--                <tfoot class="full-width">-->
<!--                <tr>-->
<!--                    <th></th>-->
<!--                    <th colspan="8">-->
<!--                        <a href="addUser">-->
<!--                            <div class="ui right floated small primary labeled icon button">-->
<!--                                <i class="user icon"></i> Add User-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </th>-->
<!--                </tr>-->
<!--                </tfoot>-->
            </table>
        </div>

<!--    --><?php //endif; ?>
<?php //endif; ?>

<?php
require_once 'views/view/footer.php';
?>

